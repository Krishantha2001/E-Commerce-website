const http = require('http')
const fs = require('fs')
const port = 3000

const server = http.createServer(function(req,res){
    res.writeHead(200, {'Content_Type': 'text/html'})
    fs.readFile('index.php',function(error,data){
        if(error)
        {
            res.writeHead(404)
            res.write('Error: File Not Found')
        }
        else
        {
            res.write(data)
        }
        res.end()
    })
})

server.listen(port,function(error){
if (error)
{
    console.log('Somthing went Wrong',error)
}
else
{
    console.log('Serever is listnening on port '+ port)
}
})