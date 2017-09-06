$(document).ready(function()
{
	
	setLogginSize();

	$(window).resize(function()
	{
		setLogginSize();
	});
	
});

function setLogginSize()
{
	
	var width = $(".drop-login").width();
	$("#drop-logged").css('width', width+20);
}