//HASHTABLE

function Hash() {
	this.HASH = new Object(),

	this.add = function (key, value) {
		this.HASH[key] = value;
	},

	this.remove = function (key) {
		this.HASH[key] = null;
		this.HASH[key] = undefined;
	},

	this.containKey = function (key) {
		if(this.HASH[key] !== undefined)
			return true;
		else
			return false;
	},

	this.containValue = function (value) {
		for (key in this.HASH) {
	  		if(this.HASH[key] == value) {
	  			return true;
	  		}
	  	}

	  	return false;
	},

	this.getByKey = function (key) {
		return this.HASH[key];
	},

	this.getByValue = function (value) {
		for (key in this.HASH) {
	  		if(this.HASH[key] == value) {
	  			return this.HASH[key];
	  		}
	  	}
	},

	this.getAllKey = function () {
		var list = [];
		for (key in this.HASH) {
	  		list.push(key);
	  	}

	  	return list;
	},

	this.getAllValue = function () {
		var list = [];
		for (key in this.HASH) {
	  		list.push(this.HASH[key]);
	  	}

	  	return list;
	},

	//override method JSON.stringify(hash)...
	this.toJSON = function () {
		return this.HASH;
	}
};


module.exports = Hash;

//usage:
//var HASH = require('./lib/hashtable');
//var hash1 = new HASH();
//hash1.add(...)
//var hash2 = new HASH();
//hash2.add(...)