
const fs = require('fs');
const path = require('path');
var file = " "; 



function getFiles(callback) {
    fs.readdir(process.argv[2], function doneReading(err, files) {
        if (err) {
            return console.error(err);
        }

        files.forEach(function (file) {
            if (path.extname(file) === '.' + process.argv[3]) {
                callback(file);
            }
        })
    })
}



function printFiles(file) {
    console.log(file);
}

getFiles(printFiles); 