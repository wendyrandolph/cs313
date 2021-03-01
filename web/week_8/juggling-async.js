const bl = require('bl');
const http = require('http');


//setup variables
var results = [];
var count = 0;

for (var index = 0; index < 3; index++) {
    httpget(index);
}

function httpget(index) {
    http.get(process.argv[2 + index], function response(response) {
        response.pipe(bl(function err(err, data) {
            if (err) {
                return console.error(err);
            }
            results[index] = data.toString();
            count++;

            if (count === 3) {
                printData();
            }

        }))
    })
}

function printData() {
    for (i = 0; i < 3; i++)
        console.log(results[i]);
}
