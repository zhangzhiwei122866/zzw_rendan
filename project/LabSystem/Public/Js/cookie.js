/**
 * @author dxk
 * @deprecated cookie操作
 */
var cookie = {

	/**
	 * 新建cookie
	 * 
	 * @param {string}
	 *            name
	 * @param {string}
	 *            value
	 * @param {number}
	 *            days
	 */
	"setCookie" : function(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		} else {
			var expires = "";
		}
		var values = encodeURIComponent(value);
		document.cookie = name + "=" + values + expires + "; path=/;";
	},

	/**
	 * 获取cookie
	 * 
	 * @param {string}
	 *            name
	 */
	"getCookie" : function(name) {
		var nameEQ = name + "=";
		var cookieArr = document.cookie.split(';');
		for ( var i = 0; i < cookieArr.length; i++) {
			var curr = cookieArr[i];
			// 去除name前边的空格
			while (curr.charAt(0) == ' ')
				curr = curr.substring(1, curr.length);
			if (curr.indexOf(nameEQ) == 0)
				return curr.substring(nameEQ.length, curr.length);
		}
		return null;
	},

	/**
	 * 删除cookie
	 * 
	 * @param {string}
	 *            name
	 */
	"deleteCookie" : function(name) {
		if (name) {
			this.setCookie(name, "", "-1");
		}
	}

};
