const getFiles = require('./mymodule'); 

var extension = process.argv[3]; 
var folder = process.argv[2]; 
getFiles(folder, extension,  function(err, files){ 
    if(err) { 
        return console.error(err);
    }

    files.forEach(function(file){ 
        console.log(file); 
    })
}) 