const http = require('http');
var url = process.argv[2];

function data(callback) {
    http.get(url, function (response) {
        response.setEncoding('utf-8');
        response.on('data', function (data) {
           
            callback(data);

        })
    })
}

function printData(data) {
    console.log(data);
}

data(printData); 