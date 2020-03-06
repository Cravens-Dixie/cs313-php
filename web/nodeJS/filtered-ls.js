const fs = require('fs');
const dir_name = process.argv[2];
const file_ext = process.argv[3];

// callback function
function callback (err, list) {
    if (err){
        console.error(err);
    } else {
       list.forEach(file=> {
           if (file.includes('.' + process.argv[3])) {
               console.log(file);
           }
            
        });
    }
}
fs.readdir(dir_name, callback);

//their solution:
// 'use strict'
//     const fs = require('fs')
//     const path = require('path')

//     const folder = process.argv[2]
//     const ext = '.' + process.argv[3]

//     fs.readdir(folder, function (err, files) {
//       if (err) return console.error(err)
//       files.forEach(function (file) {
//         if (path.extname(file) === ext) {
//           console.log(file)
//         }
//       })
//     })
