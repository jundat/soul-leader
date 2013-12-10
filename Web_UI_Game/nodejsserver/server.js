//SERVER CODE


//--------------------- CONSTANTS -----------------------

	var DEFAULT_PORT = 5000;
	var DEFAULT_IP = '127.0.0.1';
	var DEFAULT_METHOD = 'POST';

	//just for code faster
	var STATE_ONLINE = "online";
	var STATE_OFFLINE = "offline";
	var STATE_WAITING_MATCH = "waiting_match";
	var STATE_PLAYING = "playing";

	var MAP_NUMBER = 5; //0,1,...
	var MAP_WIDTH = 1000;
	var MAP_HEIGHT = 600;

	var WIN_COIN = 10;


//----------------- INIT NODE JS SERVER -----------------


	var http = require('http');
	var socketIO = require('socket.io');
	var request = require('request');

	var TAFFY = require('./lib/taffy').taffy;
	var ultils = require('./lib/ultils');
	var USERDB = TAFFY([]); //{username: 'admin', password: '12345', gender: 'male', coin: 999, state: STATE_ONLINE,  playingMatch: null, socketId: 'socket1234'}
	var MATCHDB = TAFFY([]);

	var port = process.env.PORT || DEFAULT_PORT;
	var ip = process.env.IP || DEFAULT_IP;

	//create server
	var server = http.createServer(function (req, res) {
		res.writeHead(200, {'Content-Type': 'text/plain'});
		res.end('Soul Leader Game - NodeJS Server\n' + ip + ':' + port);
	}).listen(port, ip, function() {
		ultils.log('Socket.IO server started at ', ip, ":", port);
	});


//-------------------- INIT SOCKET.IO --------------------


var io = socketIO.listen(server);

//assuming io is the Socket.IO server object
io.configure(function () {
  	//io.set("transports", ["xhr-polling"]); 
  	//io.set("polling duration", 10); 
	//io.set('match origin protocol', true);
	//io.set('origins', '*:*');
	io.set('log level', 1);
});



//-------------------- INIT SOCKET.IO -------------------
//Socket.IO code


/*
{
	matchId: matchId,
	mapId: mapId,
	turn: turn,
	players: [
		{
			username: username0,
			gender: gender0,
			coin: coin0,
			socketId: socketId0
		},
		{
			username: username1,
			gender: gender1,
			coin: coin1,
			socketId: socketId1
		}
	],
	status: [
		{
			position: position0,
			direction: direction0
			angle: angle0
		},{
			position: position1,
			direction: direction1,
			angle: angle1			
		}
	]
}
*/
function createMatch (user0, user1) {
	var matchId = ('match_' + user0.username + '_' + user1.username);
	var mapId = Math.floor(Math.random() * MAP_NUMBER); //0,1... MAP_NUMBER - 1
	var turn = (user0.coin < user1.coin) ? 0 : 1;
	var position0 = {x: MAP_WIDTH/5, y: MAP_HEIGHT/2};
	var position1 = {x: 4*MAP_WIDTH/5, y: MAP_HEIGHT/2};

	var player0 = {
		username: user0.username,
		gender: user0.gender,
		coin: user0.coin,
		socketId: user0.socketId
	}

	var status0 = {
		position: position0,
		direction: 'right', //stay in left look to right
		angle: 30
	}

	var player1 = {
		username: user1.username,
		gender: user1.gender,
		coin: user1.coin,
		socketId: user1.socketId
	}

	var status1 = {
		position: position1,
		direction: 'left', //stay in left look to right
		angle: 30
	}

	var match = {
		matchId: matchId,
		mapId: mapId,
		turn: turn,
		players: [
			player0,
			player1
		],
		status: [
			status0,
			status1
		]
	}

	return match;
}

/*
Send created match to client
*/
function sendMatch (match, user0, user1) {
	ultils.log('Send match... to ' + user0.username + ', ' + user1.username);

	var socket0 = io.sockets.sockets[user0.socketId];
	var socket1 = io.sockets.sockets[user1.socketId];

	socket0.emit('CreateRandomMatch', match);
	socket1.emit('CreateRandomMatch', match);
}


//run on connect


//-------------------- WAIT CONNECTION -------------------
io.sockets.on('connection', function (socket) {
	// Socket process here!!!
	//SEND

	//save username in this session
	var f_username;
	var f_matchId;

	//connect success
	socket.emit('ConnectSuccess', { success: true });


	//DISCONNECT
	socket.on('disconnect', function () {
		ultils.log('\n\nDISCONNECTED');

		//check if playing
		var loseUser = USERDB({socketId: socket.id}).first();
		if(loseUser.state == STATE_PLAYING) { //playing
			//find in matchDB
			var match = MATCHDB({matchId: loseUser.playingMatch}).first();
			var winUser;
			
			if(match.players[0].username == loseUser.username) {
				winUser = match.players[1];
			} else {
				winUser = match.players[0];
			}

			//find socket
			var winSocket = io.sockets.sockets[winUser.socketId];
			
			//add coin in USERDB
			var oldCoin = USERDB({username: winUser.username}).first().coin;
			USERDB({username: winUser.username}).update({coin: oldCoin + WIN_COIN});

			var data = {
				matchId: match.matchId,
				win: winUser.username,
				winCoin: WIN_COIN //thưởng cho user win
			};

			//send
			winSocket.emit('SendMatchResult', data);
			ultils.log('RETURN', ' to: ' + winUser.username);

			//delete in MATCHDB
			MATCHDB({matchId: data.matchId}).remove();

			//change status & playingMatch in USERDB
			USERDB({username: winUser.username}).update({state: STATE_ONLINE, playingMatch: null});
		} else { //online | waiting | offline 
			//do nothing
		}
		
		//deleve this user
		USERDB({socketId: socket.id}).remove();
	});


	//REQUEST FROM CLIENT

	/*
		Data:
		{
			username: username
		}

		Return:
		{
			username: username,
			password: password,
			gender: gender,
			coin: coin,
			state: 'online',
			playingMatch: null,
			socketId: 'socket75983'
		}
	*/
	//UserOnline
	socket.on('UserOnline', function(data){
		ultils.log('\n\nUserOnline', data);

		f_username = data.username;

		var ret = {
			username: f_username,
			password: "12345",
			gender: "male",
			coin: 0,
			state: STATE_ONLINE,
			playingMatch: null,
			socketId: socket.id
		};

		ultils.log('RETURN', ret);
		socket.emit('UserOnline', ret);

		//add to DB
		USERDB.insert(ret);
	});


	/*
		Data: 
		{
			username: username
		}

		Return:
		{
			username: username,
			password: password,
			gender: gender,
			coin: coin,
			state: 'offline',
			playingMatch: null,
			socketId: 'socket85859'
		}
	*/
	//GetUser
	//From TEMP data or remote MongoDB
	socket.on('GetUser', function(data){
		ultils.log('\n\nGetUser', data);

		//check in TEMP data
		var user = USERDB({username: data.username}).first();
		if(user) {
			ultils.log('RETURN', user);
			socket.emit('GetUser', user);
		} else { //get from remote MongoDB data

			var ret = {
				username: username,
				password: password,
				gender: gender,
				coin: coin,
				state: STATE_ONLINE,
				playingMatch: null,
				socketId: socket.id
			};

			ultils.log('RETURN', ret);
			socket.emit('GetUser', ret);
		}
	});


	socket.on('GetAllUserOnline', function (data) {
		ultils.log('\n\nGetAllUserOnline');

		//check in TEMP data
		var users = USERDB().get();
		ultils.log(users);
		socket.emit('GetAllUserOnline', users);
	});


	//GetLeaderBoard
	socket.on('GetLeaderBoard', function(data) {
		ultils.log('\n\nGetLeaderBoard', data);

		var ret = {};
		socket.emit('GetLeaderBoard', ret);
	});


	/*
		Data: 
		{
			username: username
		}

		Return:
		{
			matchId: matchId,
			mapId: mapId,
			turn: turn,
			players: [
				{
					username: username0,
					gender: gender0,
					coin: coin0
				},
				{
					username: username1,
					gender: gender1,
					coin: coin1
				}
			],
			status: [
				{
					position: position0,
					direction: direction0
					angle: angle0
				},{
					position: position1,
					direction: direction1,
					angle: angle1			
				}
			]
		}
	*/
	//CreateRandomMatch
	socket.on('CreateRandomMatch', function(data) {
		ultils.log('\n\nCreateRandomMatch', data);

		//set state = 'waiting_match'
		USERDB({username: data.username}).update({state: STATE_WAITING_MATCH});

		//foreach all user -> get waiting_user
		var waiting_user = USERDB({state: STATE_WAITING_MATCH});
		var count = waiting_user.count();

		// = 0

		ultils.log("waiting_user = " + count);
		
		if(count == 1) { //1st user
			//return and waiting another user
			ultils.log('1 user->return');
			
			return;
		} else if(count >= 2) {
			ultils.log('>=2 user -> create match');

			var user0;
			var user1;

			waiting_user.each(function (record, recordNumber) { //recordNumber = 0,1...
				
				//select user -> create match
				if(recordNumber % 2 == 0) { //1st user -> left
					user0 = record;
				} else { //2nd user -> right
					user1 = record;

					//create match
					var newMatch = createMatch(user0, user1);
					
					//send match
					sendMatch(newMatch, user0, user1);

					//save match & user info
					MATCHDB.insert(newMatch);
					
					//set new state
					USERDB(user0).update({state: STATE_PLAYING});
					USERDB(user1).update({state: STATE_PLAYING});
					USERDB(user0).update({playingMatch: newMatch.matchId});
					USERDB(user1).update({playingMatch: newMatch.matchId});

					//save local match data
					//f_match
					if(user0.username == f_username || user1.username == f_username) {
						f_matchId = newMatch.matchId;
					}
				}
			});
		}
	});


	/*
		{
			matchId: matchId,
			username: username,
			status: {
				position: new_position,
				direction: new_direction,
				angle: new_angle
			}
		}
	*/
	//Change player status
	socket.on('ChangeStatus', function (data) {
		ultils.log('\n\nChangeStatus', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var username = data.username;
		
		var otherUser;

		if(match.players[0].username == username) {
			otherUser = match.players[1];
		} else {
			otherUser = match.players[0];
		}

		//find socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		otherSocket.emit('ChangeStatus', data);

		ultils.log('RETURN', ' to: ' + otherUser.username);
	});


	/*
		Data:
		{
			matchId: matchId,
			username: username,
			angle: angle,
			force: force,
			destination: {
				x: x,
				y: y
			},
			isCollision: true/false
		}
	*/
	//A client Fire
	socket.on('Fire', function (data) {
		ultils.log('\n\Fire', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var username = data.username;
		
		var otherUser;

		if(match.players[0].username == username) {
			otherUser = match.players[1];
			MATCHDB({matchId: data.matchId}).update({turn: 1});
		} else {
			otherUser = match.players[0];
			MATCHDB({matchId: data.matchId}).update({turn: 0});
		}

		//find socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		otherSocket.emit('Fire', data);

		ultils.log('RETURN', ' to: ' + otherUser.username);
	});


	/*
		{
			matchId: matchId,
			username: username
		}
	*/
	socket.on('ChangeTurn', function (data) {
		ultils.log('\n\ChangeTurn', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var username = data.username;
		
		var otherUser;

		if(match.players[0].username == username) {
			otherUser = match.players[1];
			MATCHDB({matchId: data.matchId}).update({turn: 1});
		} else {
			otherUser = match.players[0];
			MATCHDB({matchId: data.matchId}).update({turn: 0});
		}

		//find socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		data.username = otherUser.username;
		otherSocket.emit('ChangeTurn', data);

		ultils.log('RETURN', ' to: ' + otherUser.username);
	});

	/*
	    {
	        matchId: matchId,
	        win: win_username
	    }
	*/
	socket.on('SendMatchResult', function (data) {
	    ultils.log('\n\SendMatchResult', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var winUsername = data.win;
		
		var winUser;
		var otherUser;
		
		if(match.players[0].username == winUsername) {
			winUser = match.players[0];
			otherUser = match.players[1];
		} else {
			winUser = match.players[1];
			otherUser = match.players[0];
		}

		//find socket
		var winSocket = socket; //this socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		
		//add coin in USERDB
		var oldCoin = USERDB({username: winUser.username}).first().coin;
		USERDB({username: winUser.username}).update({coin: oldCoin + WIN_COIN});

		data.winCoin = WIN_COIN;

		//send
		winSocket.emit('SendMatchResult', data);
		otherSocket.emit('SendMatchResult', data);
		ultils.log('RETURN', ' to: ' + otherUser.username);

		//delete in MATCHDB
		MATCHDB({matchId: data.matchId}).remove();
		f_matchId = null;

		//change status & playingMatch in USERDB
		USERDB({username: winUser.username}).update({state: STATE_ONLINE, playingMatch: null});
		USERDB({username: otherUser.username}).update({state: STATE_ONLINE, playingMatch: null});
	});


	/*
		{
			matchId: matchId,
			username: username,
			ballType: ballType
		}
	*/
	socket.on('ChangeBallType', function (data){
		ultils.log('\n\ChangeBallType', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var username = data.username;
		
		var otherUser;

		if(match.players[0].username == username) {
			otherUser = match.players[1];
			MATCHDB({matchId: data.matchId}).update({turn: 1});
		} else {
			otherUser = match.players[0];
			MATCHDB({matchId: data.matchId}).update({turn: 0});
		}

		//find socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		data.username = otherUser.username;
		otherSocket.emit('ChangeBallType', data);

		ultils.log('RETURN', ' to: ' + otherUser.username);
	});


	/*
		{
			matchId: matchId,
			username: username,
			deltaX: deltaX,
			deltaY: deltaY,
		}
	*/
	socket.on('ChangePosition', function (data){
		ultils.log('\n\ChangePosition', data);

		//find in MatchDB
		var match = MATCHDB({matchId: data.matchId}).first();
		var username = data.username;
		
		var otherUser;

		if(match.players[0].username == username) {
			otherUser = match.players[1];
			MATCHDB({matchId: data.matchId}).update({turn: 1});
		} else {
			otherUser = match.players[0];
			MATCHDB({matchId: data.matchId}).update({turn: 0});
		}

		//find socket
		var otherSocket = io.sockets.sockets[otherUser.socketId];
		data.username = otherUser.username;
		otherSocket.emit('ChangePosition', data);

		ultils.log('RETURN', ' to: ' + otherUser.username);
	});




	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	//TEST ---------------
	socket.on('SendData', function (data) {
		console.log('Receive Data:', data);
		socket.broadcast.emit('SendData', data);
	});
});



//--------------------------------------------------------