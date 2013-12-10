//USERDB


var HASH = require('./hashtable');


//variant


var list_user = new HASH();
var list_socket = new HASH();
var socketIdCounter = 0;


function add (user, socket) {
	if(list_user.containKey(user.username) == false) {
		list_user.add(user.username, user);
		list_socket.add(user.username, socket);
	}
}

function remove (user) {
	list_user.remove(user.username);
	list_socke.remove(user.username);
}

function getUserByUsername (username) {
	return list_user.getByKey(username);
}

function getSocketByUsername (username) {
	return list_socket.getByKey(username);
}


exports.add = add;
exports.getUserByUsername = getUserByUsername;
exports.getSocketByUsername = getSocketByUsername;