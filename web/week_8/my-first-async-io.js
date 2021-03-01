
const fs = require('fs');
var myNumber = undefined; 

function countLength(callback){ 
    fs.readFile(process.argv[1], function doneReading(err, fileContents){ 
        if(err) { 
            return console.error(err);
        }
        
        myNumber = fileContents.toString().split('\n'); 
        callback(); 
    })
}


function logMyNumber() { 
    console.log(myNumber.length - 1)
}

countLength(logMyNumber); 

