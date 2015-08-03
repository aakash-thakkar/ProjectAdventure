<?php
$conn = mysqli_connect("localhost", "root", "root", "wildr") or die("Failed to connect");
$locationName = $_POST['locationName'];
$query = "SELECT * FROM wildr.location where location_destination='$locationName'";
$runq = mysqli_query($conn, $query) or die("Failed to execute query");
while ($row = mysqli_fetch_assoc($runq))
	{
	echo "<div id='myImageCarousel' class='carousel slide' data-ride='carousel'>";
	$imagearr = $row['location_image'];
	$img_arr = explode(',', $imagearr);
	$len = sizeof($img_arr);
	echo "<ol class='carousel-indicators'>";
	$x = 0;
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
	echo "           </ul>";
	echo "<div class='carousel-inner carousel-absolute' role='listbox' >";
	echo " <div class='item itemHeight active'>";
	echo "<div class='detailDiv' >";
	echo "<h4>Summary</h4>";
	echo "<p>" . $row['location_description'] . "</p>";
	echo "<a href='#'>Read More -></a> ";
	echo "<div style='clear: both'></div><div class='detailTabs'>";
	echo "<div class='detailTab'><div class='heading'>Elevation:</div><div class='value'>" . $row['location_elevation'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Best Time to Visit:</div><div class='value'>" . $row['location_whentovisit'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Wildlife Index:</div><div class='value'>" . $row['location_wi'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Local Language:</div><div class='value'>" . $row['location_language'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Nearest City/Town:</div><div class='value'>" . $row['location_ntown'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Distance:</div><div class='value'>" . $row['location_ntowndist'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Nearest Hostpital:</div><div class='value'>" . $row['location_nhospital'] . "</div></div>";
	echo "<div class='detailTab'><div class='heading'>Distance:</div><div class='value'>" . $row['location_nhdist'] . "</div></div>";
	echo "</div></div>";
	echo " </div>";
	echo " </div>";
	echo " </div>";
	}

mysqli_close($conn);
?>