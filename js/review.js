// JavaScript Document
var ratingText = "";
	function changeRatingText(element)
	{
		$(document.getElementsByClassName("ratingText").item(0)).fadeOut(500, function()
		{
			$(this).text(element.getAttribute("title")).fadeIn(500);
		});
		document.getElementsByClassName("ratingText").item(0).style = "color: #000;";
	}
	function revertRatingText()
	{
		if(ratingText == "")
		{
			document.getElementsByClassName("ratingText").item(0).style = "color: #CCC;";
			
			$(document.getElementsByClassName("ratingText").item(0)).fadeOut(500, function()
			{
				$(this).text("Please Select A Rating Emoticon").fadeIn(500);
			});
		}
		else
		{
			$(document.getElementsByClassName("ratingText").item(0)).fadeOut(500, function()
			{
				$(this).text(ratingText).fadeIn(500);
			});
		}
	}
	function setRating(element)
	{
		ratingText = element.getAttribute("title");
	}
	function changeCharCount(element)
	{
		document.getElementById("reviewCharCount").innerHTML = 250 - $(element).val().length;
	}
	function writeReview() {
            alert("Hello World");
        }