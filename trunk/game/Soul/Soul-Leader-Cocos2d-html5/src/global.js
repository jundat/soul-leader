//global 

var SCREEN_WIDTH = window.innerWidth;
var SCREEN_HEIGHT = window.innerHeight;

var PLAYER_LEFT = { x: 200, y: 100 };
var PLAYER_RIGHT = { x: SCREEN_WIDTH - 200, y: 100 };
var GisFirst = false;



//glbal functions


//format a JSON to format form
function FormatJsonString(json) {
    var input = json;
    var output = "";
    var tabCounter = 0;

    for (var i = 0; i < input.length; i++) {
        var c = input[i];

        switch (c) {
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


function Log(data)
{
    var str = JSON.stringify(data);
    var fomartedStr = FormatJsonString(str);
    console.log(fomartedStr);
}