const mymodule = require('./mymodule.js');
const dir_name = process.argv[2];
const file_ext = process.argv[3];

mymodule(dir_name, file_ext, function getMyModule(err, files){
    if (err) {
        return console.log(err)
    }
    files.forEach(file => {console.log(file)});
        
    
});

 