	 	var infoOpen;
        var info2Open = false;

        function openInfo() {
            document.getElementById("infoLevel1").setAttribute("style", styleOrg + "transform: translate("+ w +");");
            //document.getElementById("info2").setAttribute("style", styleOrg + " transform: translate(400px);");
			infoOpen = true;
        }

        function closeInfo() {
            if (infoOpen == true) {
                document.getElementById("infoLevel1").setAttribute("style", styleOrg + "transform: translate(0px);");
                //document.getElementById("info2").setAttribute("style", styleOrg + " transform: translate(0px);");
				document.getElementsByClassName("mapSide")[0].style.left="360px";
            }
            infoOpen = false;
        }
        function selectTrip(element) {
			updateInfo1WithLocation(element);
			clearSelectedActivities();
            var parentPanel = element.parentNode;
            var openElement = document.getElementsByClassName("in");
            if (openElement.item(0) != null) {
                var openActivities = openElement.item(0).getElementsByClassName("in");
                if (openActivities.item(0) != null) {
                    openActivities.item(0).setAttribute("class", "collapse subResults");
                }
            }
            if (element.getAttribute("class").search("active") > 0) {
                element.setAttribute("class", "list-group-item");
                closeInfo();
            } else {
                closeInfo();
                var x = document.getElementsByClassName("list-group-item");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute("class", element.getAttribute("class"));
                }
                element.setAttribute("class", element.getAttribute("class") + " active");
				openInfo();
            }
        }

        function selectActivity(element) {
            //alert(element.getAttribute("value"));
        }

        function changeIndicator(element) {
            var x = element.parentNode.getElementsByTagName("li");
            var i;
            for (i = 0; i < x.length; i++) {
                x[i].setAttribute("class", "");
            }
            element.setAttribute("class", "active");
        }
		var width;
        var w;
        var styleOrg;
		var l;

        function alertWidth() {
            width = $(window).width() - 360;
            w = width + "px";
            l = width - 360;
            styleOrg = "width: " + w + "; " + " left: -" + l.toString() + "px;";
            document.getElementById("infoLevel1").style = styleOrg;
        }
		function closeInfo2()
		{
			if(info2Open == true)
			{
				document.getElementById("info2").setAttribute("style", styleOrg + " transform: translate(400px);");
				info2Open = false;
			}
		}
        function selectTripProvider(element) {
			prov = element;
			subl=prov.childNodes[3].childNodes[3].innerHTML;
			organizer=prov.childNodes[3].childNodes[2].innerHTML;
			updateTripProvider(subl,organizer);
            if (info2Open == true && element.getAttribute("class").search("selectOrganizer") > 0) {
                document.getElementById("info2").setAttribute("style", styleOrg + " transform: translate(400px);");
                element.setAttribute("class", "list-group-item");
                info2Open = false;
            } else {
				var a = width+400;
				a = a + "px";
                document.getElementById("info2").setAttribute("style", styleOrg + " transform: translate(" + a +");");
                var x = document.getElementsByClassName("list-group-container2").item(0).getElementsByClassName("list-group-item");
                var i;
                for (i = 0; i < x.length; i++) {
                    x.item(i).setAttribute("class", "list-group-item");
                }
                element.setAttribute("class", element.getAttribute("class") + " selectOrganizer");
                info2Open = true;
            }
        }
		function updateScrollNav()
		{
			$(".contentData").scroll(function() {
                if ($(".contentData").scrollTop() > 350) {
                    document.getElementsByClassName("contentHeaders").item(0).setAttribute("style", "top: 0px;");
                }
                //if($(".contentHeaders").position().top == 0)
                else {
                    var temp = 350 - $(".contentData").scrollTop();
                    document.getElementsByClassName("contentHeaders").item(0).setAttribute("style", "top: " + temp.toString() + "px;");
                }
            });
		}