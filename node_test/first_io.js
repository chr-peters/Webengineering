var fs = require('fs')

var parts = fs.readFileSync(process.argv[2]).toString().split('\n')

console.log(parts.length-1)

