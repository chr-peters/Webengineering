var fs = require('fs')

var directory = process.argv[2]
var extension = process.argv[3]

fs.readdir(directory, function callback(err, list){
    if (!err) {
	for (var i = 0; i < list.length; i++) {
	    var curFile = list[i]
	    var parts = curFile.split('.')
	    if (parts.length > 1 && parts[parts.length-1] == extension) {
		console.log(curFile)
	    }
	}
    }
})
