const net = require('net');
var port = Number(process.argv[2]);

function zero(i) {
    if (i < 10) { 
        return '0' + 1;
    } else { 
        return i; 
    }
}


function now() {
    var date = new Date();
    return date.getFullYear() + '-'
        + zero(date.getMonth() + 1) + '-' // starts at 0
        + zero(date.getDate()) + ' '  // returns the day of month
        + zero(date.getHours()) + ':'
        + zero(date.getMinutes());
}

var server = net.createServer(function (socket) 
{
    //socket handling logic
    socket.end(now() + '\n')

})

server.listen(port);

