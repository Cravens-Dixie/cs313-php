const fs = require('fs');
const path = require('path');

module.exports =  function (dir_name, file_ext, getMyModule) {

    fs.readdir(dir_name, filterFiles);

    function filterFiles(err, files) {
        if (err) {
            return getMyModule(err);
        } 
        files = files.filter(file=> {
            return path.extname(file) === "." + file_ext;
        })
           getMyModule(null, files); 
        
    } 

}










