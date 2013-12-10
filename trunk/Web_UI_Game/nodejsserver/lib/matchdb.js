//MATCHDB


var list_match = [];

function insert (match) {
	if(list_match.indexOf(match) == -1) {
		list_match.push(match);
	}
}

function getById (matchId) {
	for (var i = list_match.length - 1; i >= 0; i--) {
		if(list_match[i].matchId == matchId) {
			return list_match[i];
		}
	};
}

exports.insert = insert;
exports.getById = getById;