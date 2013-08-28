//CLIENT CODE
//var io = require('socket.io');

var socket = io.connect('127.0.0.1:5000');
var username;
var DEBUG = false;

function debug(msg) {
    if(DEBUG) {
        alert(msg);
    }
}

//handle event ------------------------------------------------------------

//hello when start connect
socket.on('greeting', function(data) {
	debug(data);
})

//new user join
socket.on('new-user', function(data) {
    debug('new-user');
	document.getElementById('log').value += '\n' + data + ' joined group!';
})

//receive a message
socket.on('msg', function(data) {
    debug('msg');
    document.getElementById('log').value += '\n' + data.username + ': ' + data.msg;
})


//public functions -------------------------------------------------------

function join() {
    debug('join');
    username = document.getElementById('username').value;
    socket.emit('user-join', username);
}

function send() {
    debug('send');
    var msg = document.getElementById('chatbox').value;
    socket.emit('msg', {username: username, msg: msg});
}


