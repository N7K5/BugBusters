var random_length=12;

var ip_field=document.getElementById("ip_new");

function make_rand()
{
	var text = "BB@GCELT/";
 	var possible = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz123456789@$&";

 	for (var i = 0; i < random_length; i++)
 		text += possible.charAt(Math.floor(Math.random() * possible.length));

 	return text;
}

document.getElementById('random').addEventListener('click', function(e){
	e.preventDefault();
	ip_field.value=make_rand();
}, false);

window.addEventListener("load", function(){
	window.scrollTo(0,document.body.scrollHeight);
}, false);