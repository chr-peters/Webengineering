var fs = require('fs')

fs.readFile(process.argv[2], function callback(err, data){
    if (!err) {
	parts = data.toString().split('\n')
	console.log(parts.length-1)
    }
})

