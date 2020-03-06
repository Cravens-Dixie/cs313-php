const fs = require('fs');

let path = process.argv[2];
let file = fs.readFileSync(path);
let str = file.toString();
let str_arr = str.split('\n');
let file_length = str_arr.length-1;

console.log(file_length);