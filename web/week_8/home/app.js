var http = require('http');
var url = require('url');
var fs = require('fs');
var port = 8000;






const requestListener = (request, response) => {
    console.log(`Request received for ${request.url}`);
 

    switch (request.url) {
        case "/":

            response.writeHead(200, { 'Content-Type': 'text/html' });
            response.write("<h1> Welcome to the homepage </h1>");


            break;

        case "/home":
            fs.readFile('../home/template.html', 'utf-8', function (error, data) {
                if (error) {
                    response.writeHead(500, { 'Content-type': 'text/html' });
                    response.write('Error reading that file!');
                    console.error('Error reading that file!', error);

                } else {
                    response.setHeader('Content-type', 'text/html')
                    console.log("Served template.html");
                    response.end(data);
                }

            });
            return;

        case "/getData":
            response.writeHead(200, { 'Content-type': 'application/json' });
            var info = { "name": "Wendy", "class": "cs313" };

            response.write(JSON.stringify(info));

            break;

    
        default:
            response.writeHead(404);
            response.write("<h1> Error 404 Page Not Found </h1>");

            break;




        }
        response.end(); 
    }

    const server = http.createServer(requestListener);


    server.listen(port, () => {
        console.log(`Server listening on port ${port}`);
    }); 