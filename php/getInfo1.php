<?php
$conn = mysqli_connect("localhost", "root", "root", "wildr") or die("Failed to connect");
$activityName = $_POST['activityName'];
$query = "SELECT * FROM `sublocation` WHERE `Sublocation_name`='$activityName'";
$runq = mysqli_query($conn, $query) or die("Failed to execute query");

while ($row = mysqli_fetch_assoc($runq))
	{
	$imagearr = $row['sublocation_image'];
	$x = 0;
	$img_arr = explode(',', $imagearr);
	$len = sizeof($img_arr);
	echo "<div id='myImageCarousel' class='carousel slide' data-ride='carousel'>";
	echo "<ol class='carousel-indicators'>";
	while ($x != $len)
		{
		if ($x == 0) echo "              <li data-target='#myImageCarousel' data-slide-to='" . $x . "' class='active'></li>";
		  else
			{
			echo "             <li data-target='#myImageCarousel' data-slide-to='" . $x . "' ></li>";
			}

		$x++;
		}

	$x = 0;
	echo "      </ol>";
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
	echo "<a class='left carousel-control' href='#myImageCarousel' role='button' data-slide='prev'>";
	echo "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
	echo "<a class='right carousel-control' href='#myImageCarousel' role='button' data-slide='next'>";
	echo "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a>";
	echo "</div>";
	echo "<div id = 'myContentCarousel' class='carousel slide' >";
	echo "<ul class='indicators'>";
	echo "               <li data-target='#myContentCarousel' onClick='changeIndicator(this)' data-slide-to='0' class='active'>Details</li>";
	echo "             <li data-target='#myContentCarousel' onClick='changeIndicator(this)' data-slide-to='1'>Location Reviews</li>";
	echo "            <li data-target='#myContentCarousel' onClick='changeIndicator(this)' data-slide-to='2'>Trip Providers</li>";
	echo "           </ul>";
	echo "<div class='carousel-inner carousel-absolute' role='listbox' >";
	echo " <div class='item itemHeight active'>";
	echo "<div class='detailDiv' >";
	echo "<h4>Summary</h4>";
	echo "Trek name is </br>";
	echo $row['Sublocation_name'];
	echo "</br>";
	echo $row['Sublocation_details'];
	echo "</br>";
	echo "</div></div>";
	echo "<div class='item itemHeight' style='overflow: auto;'>
                        <div class='locReviews'>
                            <a href='#' data-toggle='modal' data-target='#reviewModal'>
                                <p id='writeAReview'>Write A Review</p>
                            </a>
                            <table class='reviewTable'>
                                <tr>
                                    <td>
                                        <img class='reviewImg' src='10252105_10153231997807526_5101547361870569217_n.jpg' width='40' height='40'>
                                        <div class='reviewNameData'>
                                            <p class='reviewName'>Aakash Thakkar</p>
                                            <p class='reviewSubText'>11 Reviews, Mumbai.</p>
                                        </div>
                                        <div class='reviewRating'>
                                            <p>3.5</p>
                                        </div>
                                        <div style='clear:both'></div>
                                        <p>Great trek for starters! Close to mumbai and perfect for a rainy or cool sunday, medium difficulty, and food aroud is good. Great trek for starters! Close to mumbai and perfect for a rainy or cool sunday, medium difficulty, and food aroud is good.</p>
                                        <ul class='reviewUl'>
                                        <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone1.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone2.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone3.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone4.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone5.jpg' width='40' height='40'></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class='reviewImg' src='10252105_10153231997807526_5101547361870569217_n.jpg' width='50' height='50'>
                                        <div class='reviewNameData'>
                                            <p class='reviewName'>Aakash Thakkar</p>
                                            <p class='reviewSubText'>11 Reviews, Mumbai.</p>
                                        </div>
                                        <div class='reviewRating'>
                                            <p>3.5</p>
                                        </div>
                                        <div style='clear:both'></div>
                                        <p>Great trek for starters! Close to mumbai and perfect for a rainy or cool sunday, medium difficulty, and food aroud is good. Great trek for starters! Close to mumbai and perfect for a rainy or cool sunday, medium difficulty, and food aroud is good.</p>
                                        <ul class='reviewUl'>
                                        	<li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone1.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone2.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone3.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone4.jpg' width='40' height='40'></li>
                                            <li><img src='http://www.hamptapass.co.in/Hamtapass-Trek-images/DetailsItinerary/day%201/dayone5.jpg' width='40' height='40'></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>";
$query_numact = "SELECT * FROM wildr.trip,wildr.organizer where trip.Organizer_Organizer_id=Organizer.Organizer_id AND Sublocation_Sublocation_name='" . $row['Sublocation_name'] . "';";
	$runq2 = mysqli_query($conn, $query_numact) or die(mysqli_error($conn));
	echo "<div class='item itemHeight'>";
	echo "<div class='item itemHeight'>
                        <div class='list-group-container list-group-container2'>";
	while ($row2 = mysqli_fetch_assoc($runq2))
		{
		echo "<a class='list-group-item' onClick='selectTripProvider(this)'>
                                    <img style='border-radius: 8px;' src='images/trekdp.png' class='imageTwo'>
                                    <div class='list-item-content' style='width: 300px;'>
                                        <h4 class='list-group-item-heading' style='margin-top: -3px; margin-bottom: 0px;'>" . $row2['Organizer_name'] . "</h4>";
		echo "<p style='display:none'>" . $row2['Organizer_id'] . "</p>";
		echo "<p style='display:none'>" . $row2['Sublocation_Sublocation_name'] . "</p>";
		echo "  <p class='list-group-item-text'>" . $row2['Organizer_experience'] . " years of Experience<span class='badgeCounter2' style='background-color:red;'><img src='rating3.png' width='20' height='20'>" . $row2['Trip_rating'] . "</span></p>";
		echo " <div class='list-item-division' style='margin-top: 0px;'>
                                            <ul>									
                                                <li>" . $row2['Trip_date'] . "</li>
                                                <li>" . $row2['Trip_cost'] . " INR</li>";
										echo "   </ul>
                                        </div>
                                    </div>
                                    <div style='clear:both;'></div>
                            	</a>";
		}

	echo " </div>
                    </div>";
	echo " </div>";
	echo " </div>";
	echo " </div>";
	} 
?>