var keyword=document.getElementById('keyword');
var tobolcari=document.getElementById('tombolcari');
var container=document.getElementById('mytable');

keyword.addEventListener('keyup',function () {
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange=function()
	{
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			container.innerHTML=xhr.responseText;
			console.log(keyword);
		}
	}
	
	xhr.open('GET','ajax/coba.php?keyword='+keyword.value,true);
	xhr.send();

});