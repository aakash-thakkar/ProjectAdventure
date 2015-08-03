<?php
$conn = mysqli_connect("localhost", "root", "root", "wildr") or die("Failed to connect");
$rating = 0;
$sublocation = $_POST['sublocation'];
$organizer = $_POST['organizer'];

// echo $sublocation;
// echo $organizer;
// SELECT * FROM `trip` WHERE `Organizer_Organizer_id`=1 AND `Sublocation_Sublocation_name`="Hampta Pass Trek"

$query = "SELECT * FROM `trip` WHERE `Organizer_Organizer_id`=$organizer AND `Sublocation_Sublocation_name`='$sublocation'";
$runq = mysqli_query($conn, $query) or die("Failed to execute query");

while ($row = mysqli_fetch_assoc($runq))
	{
	echo " <nav class='navbar' style='min-height: 0px; border: none;'>
                <ul class='contentHeaders nav' style='top:350px;'>
                    <li><a href='#sectionSummary'>Summary</a></li>
                    <li><a href='#sectionDescription'>Detail Itinerary</a></li>
                    <li><a href='#sectionContactUS'>Contact Us</a></li>
                    <li><a href='' data-toggle='modal' data-target='#bookModal' onClick='updateBookModalContents()'>Book</a></li>
                </ul>
            </nav>";
	echo " <div class='contentContainer'>
                <div class='contentData' data-spy='scroll' data-target='.navbar' data-offset='12'>

                    <div id='myImageCarousel2' class='carousel slide' data-ride='carousel'>";
	$imagearr = $row['Trip_image'];
	$img_arr = explode(',', $imagearr);
	$len = sizeof($img_arr);
	$x = 0;
	echo "<ol class='carousel-indicators'>";
	while ($x != $len)
		{
		if ($x == 0) echo "<li data-target='#myImageCarousel2' data-slide-to='" . $x . "' class='active'></li>";
		  else
			{
			echo "<li data-target='#myImageCarousel2' data-slide-to='" . $x . "' ></li>";
			}

		$x++;
		}

	$x = 0;
	echo "</ol>";
	echo "<div class='carousel-inner' role='listbox' >";
	while ($x != $len)
		{
		if ($x == 0) echo "<div class='item active '>";
		  else echo "<div class='item  '>";
		echo "<img src='images/" . $img_arr[$x] . "' alt='Chania' width='460' height='220'>";
		echo " </div>";
		$x++;
		}

	$x = 0;
	echo "</div>";
	echo "<a class='left carousel-control' href='#myImageCarousel2' role='button' data-slide='prev'>";
	echo "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
	echo "<a class='right carousel-control' href='#myImageCarousel2' role='button' data-slide='next'>";
	echo "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a>";
	echo "        </div>";
	echo " <div id='myContentCarousel2'>
                        <!-- Location Details -->
                        <div class='item one-edge-shadow' id='sectionSummary' style='text-align:center'>
                        <img src='http://www.acelloria.com/wp-content/themes/twentytwelve/images/partner/report.png' width='40' height='40'>
                        <p style='font-family: tisa; font-size: 14px; text-align: left;'>
                        <br />";
	echo $row['Trip_summary'];
	echo " </div>
                        <div class='item one-edge-shadow' id='sectionDescription' style='text-align:center'>
							<img src='http://simpleicon.com/wp-content/uploads/note-2.png' width='40' height='40'>
                            <p style='font-family: tisa; font-size: 18px;'>                            
                                <p class='dayHeader'>Day 01: Manali to Chika Details</p>
								<p class='dayDetail' style='text-align:left; padding: 0px 5px 0px 5px;'>" . $row['Trip_itinerary'] . "</p>
                                <ul class='reviewUl'>
                                        	<li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone1.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone2.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone3.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone4.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone5.jpg' width='40' height='40'></li>
                                        </ul>

                            </p>
                            <br />
                        </div>

                        <!-- Location Reviews -->
                        <div class='item one-edge-shadow' id='sectionContactUS'>
                        	<div class='left'>
                                <img src='images/call.png' width='40' height='40'>
                                <p>
                                Phone No:-<br>
                                00-91-9917724737<br>
                                00-91-7351523841<br>
                            	</p>
                            </div>
                            <div class='right'>
                            	<img src='images/email.png' width='40' height='40'>
                                <p>
                                For Agents B to B :- sales@trekthehimalayas.com<br>
                                E-mail:- info@trekthehimalayas.com<br>
                                E-mail:- rakesh@trekthehimalayas.com<br>
                                Skype Name :- trekthehimalayas 
                                </p>
                            </div>
                            <div style='clear: both;'></div>
                        </div>";
}

?>