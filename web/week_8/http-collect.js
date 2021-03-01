//get modules 
const bl = require('bl'); 
const http = require('http');


//setup variables
var url = process.argv[2];

function data(callback){ 
    http.get(url, function (response) {
        response.pipe(bl(function(err, data){ 
            if (err) { 
                return console.error(err); 
            }
            data = data.toString(); 
            callback(data);
        }))
        
        
    })
    

}

function printData(data){ 
    console.log(data.length);
    console.log(data);  
}

data(printData); 


