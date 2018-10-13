var index = 0;

window.onload = function(){
	console.log(document.cookie);
	getCookie();
}

function getCookie() {
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = ca.length - 1; i >= 0; i--) {
		if (ca[i] && ca[i].indexOf('=') != -1){
			var c = ca[i].split('=');
			new_elem(c[0], c[1]);
			index = Number(c[0]) + 1;
		}
	}
}

function new_elem(value, str){
	var list = document.getElementById("ft_list");
	var newitem = document.createElement("div");
	var textnode = document.createTextNode(str);

	newitem.setAttribute("class", "new_elem");
	newitem.setAttribute("onclick", "delete_elem(this)");
	newitem.setAttribute("index", value);
	newitem.appendChild(textnode);
	list.insertBefore(newitem, list.childNodes[0]);
}

function add_new(elem){
	var todo;

	todo = prompt("Enter a new task : ");
	if (todo)
	{
		new_elem(index, todo);
		setCookie(index, todo, 20);
		index++;
	}
	console.log(document.cookie);
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires;
}

function delete_elem(obj){
	if (confirm("Are you sure you want to delete this task?") == true)
	{
		var i = obj.getAttribute("index");
		obj.parentNode.removeChild(obj);
    document.cookie = i + "=" +
  		";expires=Thu, 01 Jan 1970 00:00:01 GMT";
  	console.log(document.cookie);
	}
}
