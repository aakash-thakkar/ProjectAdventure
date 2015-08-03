var tripTypeFilter = [["'Camping'", 0],["'Trek'", 0],["'Rafting'", 0],[0]];
	var str = "";
	var sortvar=0;
	var index = 0;
	$.ajax({
  		method: "POST",
  		url: "php/locationSort.php",
		data: { sortParameter: index, value: str }
		})
  .done(function( data ) {
		document.getElementsByClassName("listSide").item(0).innerHTML = data;
  });
  
  function updateInfo1WithLocation(element)
  {
	  var text = element.attributes.href.value.replace('#','');
	  $.ajax({
  		method: "POST",
  		url: "php/getInfo1Location.php",
		data: { locationName: text }
		})
  		.done(function( data ) {
    		document.getElementById("infoLevel1").innerHTML = data;
  		});
  }
  function clearSelectedActivities()
  {
	  var elements = document.getElementsByClassName("subResults");
		for(var j = 0; j<elements.length; j++)
		{
			var elems = elements.item(j).getElementsByTagName("li");
			for(var i = 0; i<elems.length;i++)
			{
				elems.item(i).setAttribute("class", "");
			}
		}
  }
  function updateInfo1WithActivity(element)
	{
		closeInfo2();
		clearSelectedActivities();
		element.setAttribute("class", "selectedActivity");
		var text = element.innerHTML;
		$.ajax({
  		method: "POST",
  		url: "php/getInfo1.php",
		data: { activityName: text }
		})
	  .done(function( data ) {
			document.getElementById("infoLevel1").innerHTML = data;
	  });
	}
	function updateTripProvider(subl,organizer)
	{
		$.ajax({
  		method: "POST",
  		url: "php/getInfo2.php",
		data: { sublocation: subl, organizer: organizer }
		})
  		.done(function( data ) {
    		document.getElementById("info2").innerHTML = data;
			updateScrollNav();
  		});
	}
	$(window).load(function(){
  		var x= document.getElementsByName("0").length;
  		document.getElementById("resultsct").innerHTML=x;
	});
	function checkThis(element,value) 
	{
		str="";
	index=0;
		var checkBox = element.getElementsByClassName("triptype").item(0);
		if(checkBox.checked)
		{
			if(checkBox.value == "camping")
			{
				tripTypeFilter[0][1] = 1;
			}
			else if(checkBox.value == "trek")
			{
				tripTypeFilter[1][1] = 1;
			}
			else
			{
				tripTypeFilter[2][1] = 1;
			}
		}
		else
		{
			if(checkBox.value == "camping")
			{
				tripTypeFilter[0][1] = 0;
			}

			else if(checkBox.value == "trek")
			{
				tripTypeFilter[1][1] = 0;
			}
			else
			{
				tripTypeFilter[2][1] = 0;
			}
		}
	
		var first =0;
		for(var i = 0; i<tripTypeFilter.length; i++)
		{
			if(tripTypeFilter[i][1] == 1)
			{
				if(first == 0)
				{
					str = str + tripTypeFilter[i][0];
					first=1;
				}
				else
				{
					str = str + "," + tripTypeFilter[i][0];
				}
			}
		}
		$.ajax({
  		method: "POST",
  		url: "php/locationSort.php",
		data: {  sortParameter: index,value: str }
		})
  		.done(function( data ) {
    		document.getElementsByClassName("listSide").item(0).innerHTML = data;
  		});
	}
	function sortLocation(element, index)
  {
	  //document.getElementById("sortList").innerHTML = element.innerHTML;
	  sortvar=index;
	  console.log("Logging sort");
	  console.log(sortvar);
	  console.log(str);
	  
	  $.ajax({
  		method: "POST",
  		url: "locationSort.php",
		data: { sortParameter: sortvar,value:str }
		})
  		.done(function( data ) {
			document.getElementsByClassName("listSide").item(0).innerHTML = data;
  		});
  }
	function locationFilter(element)
	{
		$.ajax({
  		method: "POST",
  		url: "php/locationSearch.php",
		data: { locationString: element.value }
		})
  		.done(function( data ) {
    		document.getElementsByClassName("listSide").item(0).innerHTML = data;
  		});
	}
	function resetall()
	{
	
	$.ajax({
  		method: "POST",
  		url: "php/getLocations.php",
		data: { sortParameter: 0}
	})
  .done(function( data ) {
		document.getElementsByClassName("listSide").item(0).innerHTML = data;
  });
  
	}