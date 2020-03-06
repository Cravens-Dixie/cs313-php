const fs = require('fs');


fs.readFile(process.argv[2], function(err, data){
    if (err){
        var result = console.log(err);
        return result;
    }
let file = data.toString();
let str_arr = file.split('\n');
let file_length = str_arr.length-1;
console.log(file_length);
}
);



