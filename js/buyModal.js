// JavaScript Document
var time, date, month;
// CHANGE HERE
function updateBookModalContents()
{
	var prov = document.getElementsByClassName("selectOrganizer").item(0);
	subl=prov.childNodes[3].childNodes[3].innerHTML;
	var organizer= prov.getElementsByClassName("list-group-item-heading").item(0).innerHTML;
	//document.getElementById("modalHeader").innerHTML = subl;
	//document.getElementById("modadSubHeader").innerHTML = organizer;
}
function selectMonth(element)
{
	var parentElement = element.parentNode.parentNode;
	var elems = parentElement.getElementsByTagName("li");
	for(var i = 0; i<elems.length; i++)
	{
		var elem = elems[i].childNodes.item(0);;
		elem.setAttribute("class", "");
	}
	element.setAttribute("class", "selectedMonth");
}
function selectTime(element)
{
	var parentElement = element.parentNode.parentNode.parentNode;
	var elemButtons = parentElement.getElementsByClassName("dateTimeButton");
	for(var i = 0; i<elemButtons.length; i++)
	{
		elemButtons[i].setAttribute("class", "dateTimeButton grayButton");
	}
	var parent = element.parentNode.parentNode;
	parent.getElementsByClassName("dateTimeButton").item(0).setAttribute("class", "dateTimeButton");
	
	var elems = document.getElementsByClassName("timeOptions");
	for(var i = 0; i<elems.length; i++)
	{
		elems[i].setAttribute("class", "timeOptions");
	}
	element.setAttribute("class", "timeOptions selectedTime");
}
function goToDetails(element)
{
	var parentElement = element.parentNode;
	var container = parentElement.getElementsByClassName("timeOptionContainer").item(0);
	var selectedTime = container.getElementsByClassName("selectedTime").item(0);
	if(selectedTime == null)
	{
		alert("Please Select The Time First");
	}
	else 
	{
		time = selectedTime.innerHTML;
		var temp = parentElement.getElementsByClassName("dateOption").item(0).innerHTML;
		temp = temp.split("|");
		temp = temp[1];
		date = temp;
		month = document.getElementsByClassName("selectedMonth").item(0).innerHTML;
		document.getElementById("buyDetailA").setAttribute("class", "buyListItem");
		$("#buySelect").collapse('toggle');
		$("#buyDetails").collapse('show');
	}
}
var name;
var phNo; 
var email; 
function contactCheck( contact ) {
    if (contact.length > 7 && contact.length <= 10) {
        var numbers = /^[0-9]*$/;
        if (contact.match(numbers)) {
            return true;
        } else {
            return false;
        }
    }
	return false;
}
function emailCheck( email ) {
    var email = document.getElementById('email').value;
    if (email.indexOf("@") > 0 && email.indexOf("@") != email.length - 1 && email.indexOf(".") > 0 && email.indexOf(".") != email.length - 1) 
	{
		return true;
    } else 
	{
		return false;
    }
}
function goToSummary()
{
	var name = document.getElementById("name").value;
	var phNo = document.getElementById("phNo").value;
	var email = document.getElementById("eId").value;
	if(contactCheck(phNo) == true && emailCheck(email) == true && name != "")
	{
		document.getElementById("buySummaryA").setAttribute("data-toggle", "collapse");
		document.getElementById("buySummaryA").setAttribute("class", "buyListItem");
		$("#buyDetails").collapse('hide');
		$("#buySummary").collapse('show');
	}
	else
	{
		alert("Please Check Data Entered");
	}
}
function confirmOrder()
{
}
$(document).ready(function(){
			  $("#buySelect").on("hide.bs.collapse", function(){
				$("#buySelectA").html('<span class="buyIndicator">+</span>' + "Step 1: Select Date & Time");
			  });
			  $("#buySelect").on("show.bs.collapse", function(){
				$("#buySelectA").html('<span class="buyIndicator">-</span>' + "Step 1: Select Date & Time");
			  });
			  $("#buyDetails").on("hide.bs.collapse", function(){
				$("#buyDetailA").html('<span class="buyIndicator">+</span>' + "Step 2: Your Details");
			  });
			  $("#buyDetails").on("show.bs.collapse", function(){
				$("#buyDetailA").html('<span class="buyIndicator">-</span>' + "Step 2: Your Details");
			  });
			  $("#buySummary").on("hide.bs.collapse", function(){
				$("#buySummaryA").html('<span class="buyIndicator">+</span>' + "Step 3: Order Summary");
			  });
			  $("#buySummary").on("show.bs.collapse", function(){
				$("#buySummaryA").html('<span class="buyIndicator">-</span>' + "Step 3: Order Summary");
			  });
			  $("#buyPayment").on("hide.bs.collapse", function(){
				$("#buyPaymentA").html('<span class="buyIndicator">+</span>' + "Step 4: Payment");
			  });
			  $("#buyPayment").on("show.bs.collapse", function(){
				$("#buyPaymentA").html('<span class="buyIndicator">-</span>' + "Step 4: Payment");
			  });
});
