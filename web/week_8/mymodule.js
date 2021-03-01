const fs = require('fs');
const path = require('path');

module.exports = (folder, extension, callback) => {
    fs.readdir(folder, function doneReading(err, files) {
        if (err) {
            return callback(err);
        }


        files = files.filter(function (file) {
            return path.extname(file) === '.' + extension; 
           
        })
        callback(null, files);
    }) 
}