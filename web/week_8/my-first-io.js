
const fs = require('fs');


var file = fs.readFileSync(process.argv[2]);
const str = file.toString().split('\n')


console.log(str.length - 1); 