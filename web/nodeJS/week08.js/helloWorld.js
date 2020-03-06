var http = require('http');
var url = require('url');
var fs = require('fs');

var server = http.createServer(onRequest);
server.listen(8888);

function onRequest(req, res) {
    var request = req.url;
    
    console.log("Received a request for:" + req.url);

    if (request =="/home") {
        res.writeHead(200, {"Content_Type":"text/html"});
        res.write("<h1>Welcome to the Home Page</h1>");
    } else if (request =="/getData") {
        res.writeHead(200, {"Content_Type":"application/json"});
        var comment = JSON.stringify({"name":"D. Cravens","class":"cs313"});
        res.write(comment);
    } else if (request =="/getGame") {
        fs.readFile('test.html', function (err, data){
            if (err) {
                return console.log(err)
            }
            res.writeHead(200, {"Content_Type":"text/html", 'Content-Length':data.length});
            res.write(data);
        });
    } else {
        res.writeHead(404, {"Content_Type":"text/html"});
        res.write("<h1>Page Not Found</h1>");
    }

    res.end();
}
console.log("The server is now listening on port 8888");