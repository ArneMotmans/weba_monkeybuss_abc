/**
 * Created by 11501537 on 16/05/2017.
 */
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function (req, res) {
    res.sendFile(__dirname  + '/index.html');
});

io.on('connection', function(socket){
    socket.on('chat message', function(msg){
        io.emit('chat message', msg);
    });
});


http.listen(3000, function () {
    console.log('listening on *:3000');
});

//code source : https://socket.io/get-started/chat/