//CLIENT CODE



var socket = io.connect('127.0.0.1:5000');

var username;

/*
    {
        username: username,
        password: password,
        gender: gender,
        coin: coin
    }
*/
var user;   //user info from server

/*
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
var match;  //playing match

/*
    {
        position: position0,
        direction: direction0
        angle: angle0
    }
*/
var matchStatus;    //status in playing match


function formatJsonString(json) {
    var input = json;
    var output = "";
    var tabCounter = 0;

    for (var i = 0; i < input.length; i++) {
        var c = input[i];

        switch (c) {
            case '[': //xuống dòng +TAB
            case '{': //xuống dòng +TAB
                tabCounter++;
                output += c;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
                break;

            case ',': //xuống dòng =TAB
                output += c;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
                break;

            case ']': //xuống dòng -TAB
            case '}': //xuống dòng -TAB
                tabCounter--;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
                output += c;
                break;

            default:
                output += c;
                break;
        }
    };

    return output;
}

function show(data) {
    console.log(data);
//     var str = JSON.stringify(data);
//     var fomartedStr = formatJsonString(str);
// 
//     document.getElementById('log').value = fomartedStr;
}


//handle event ------------------------------------------------------------


//hello when start connect
socket.on('ConnectSuccess', function (data) {
    show(data);

    var userbox = 'jundat'; //document.getElementById('username');
    userbox.value = 'user_' + (new Date()).getMilliseconds();
    UserOnline();
});

/*
    {
        username: username,
        password: password,
        gender: gender,
        coin: coin
    }
*/
//UserOnline
socket.on('UserOnline', function (data) {
    show(data);

    user = data;
});

//GetUser
socket.on('GetUser', function (data) {
    show(data);
});

//GetAllUserOnline
socket.on('GetAllUserOnline', function (data) {
    show(data);
});

//GetLeaderBoard
socket.on('GetLeaderBoard', function (data) {
    show(data);
});


/*
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
socket.on('CreateRandomMatch', function (data) {
    show(data);

    match = data;

    if (match.players[0].username == username) {
        matchStatus = match.status[0];
    } else {
        matchStatus = match.status[1];
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
socket.on('ChangeStatus', function (data) {
    show(data);
});


/*
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
socket.on('Fire', function (data) {
    show(data);
});


/*
    {
        matchId: matchId,
        username: new_username
    }
*/
socket.on('ChangeTurn', function (data) {
    show(data);
    if (data.username == username) {
        alert('This is my turn');
    }
});

/*
    {
        matchId: matchId,
        win: win_username
        coinForWin: coinForWin //thưởng cho user win
    }
*/
socket.on('SendMatchResult', function (data) {
    show(data);

    if (data.win == username) { //you win
        alert('You win :D\n' + 'WinCoin: ' + data.winCoin);
    } else { //you lose
        alert('You lose :(');
    }
});


//send event -------------------------------------------------------

function UserOnline() {
    username = 'jundat'; //document.getElementById('username').value;
    socket.emit('UserOnline', {
        username: username
    });
}

function GetUser() {
    username = 'jundat';// document.getElementById('username').value;
    socket.emit('GetUser', {
        username: username
    });
}

function GetAllUserOnline() {
    socket.emit('GetAllUserOnline', {});
}

function GetLeaderBoard() {
    socket.emit('GetLeaderBoard', {});
}

function CreateRandomMatch() {
    username = 'jundat';// document.getElementById('username').value;
    socket.emit('CreateRandomMatch', {
        username: username
    });
}

//need edit
function ChangeStatus() {
    //random position change
    matchStatus.position.x += Math.floor(Math.random() * 5);

    //send
    socket.emit('ChangeStatus', {
        matchId: match.matchId,
        username: username,
        status: matchStatus
    });
}

//need edit
function Fire() {
    var data = {
        matchId: match.matchId,
        username: username,
        angle: matchStatus.angle,
        force: Math.random() * 10 + 1,
        destination: {
            x: Math.random() * 10 + 1,
            y: Math.random() * 10 + 1
        },
        isCollision: true
    }

    socket.emit('Fire', data);
}

function ChangeTurn() {
    var data = {
        matchId: match.matchId,
        username: username //old_username
    };

    socket.emit('ChangeTurn', data);
}

function SendMatchResult() {
    var data = {
        matchId: match.matchId,
        win: username
    };

    socket.emit('SendMatchResult', data);
}




