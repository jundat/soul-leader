//ULTILS
//ultility functions

function formatJsonString (json) {
	if(json == undefined) return null;

    var input = json;
    var output = "";
    var tabCounter = 0;

    for (var i = 0; i < input.length; i++) {
        var c = input[i];

        switch(c) {
            case '[': //xuống dòng +TAB
            case '{': //xuống dòng +TAB
                tabCounter++;
                output += c;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
            break;

            case ',': //xuống dòng =TAB
                output += c;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
            break;

            case ']': //xuống dòng -TAB
            case '}': //xuống dòng -TAB
                tabCounter--;
                output += '\n';
                for (var j = tabCounter - 1; j >= 0; j--) {
                    output += '\t';
                };
                output += c;
            break;

            default:
                output += c;
            break;
        }
    };

    return output;
}


function log () {
    try {
    	var totalStr = "";
    	for (var i = 0; i < arguments.length; i++) {
    		if(typeof arguments[i] === 'object') {
    			totalStr += formatJsonString( JSON.stringify( arguments[i]));
    		} else {
    			totalStr += arguments[i];
    		}
    	};
    	console.log(totalStr);   
    } catch(err) {
        console.log(arguments);
    }
}



//return
exports.formatJsonString = formatJsonString;
exports.log = log;