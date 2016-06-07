function deleteRecipe(e) {

	httpPOST('recipeDelete.php', function(e) {
		console.log('HELLO');
		console.log(e);
		e.parentElement.parentElement.remove();
	}, "id=" + e.getAttribute('data-value'), e)
};

function httpPOST(url, callback, params, e) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			callback(e);
			console.log(xmlhttp.responseText);
		}
	};
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	xmlhttp.send(params);
};