<?php
require('connect.php');
$rating=0;
$rating=$_POST['value'];
$sp=0;
$sp=$_POST['sortParameter'];


//echo "Ordered needed is ".$rating;
//echo "<br/>";
//echo "Search Parameters are ".$sp;




$x=0;
if(strlen($rating)==0)
{
	$x=1;
}	
#echo "<br/>";
//$conn=mysqli_connect("localhost","root","","$db") or die("Failed to connect");
/*$queryfetch="SELECT DISTINCT Location_location_id FROM `sublocation` WHERE `Sublocation_type`='$rating' ORDER BY `Sublocation_type` ASC";
#echo $queryfetch;
$runf=mysqli_query($conn,$queryfetch) or die("Failed to execute query 1");
$row2=mysqli_fetch_assoc($runf);
*/
 echo "  <div class='list-group-container' id='list-container'>"; 
 if($x==0)
 {
 //$query="Select * from $db.weather,$db.Location,$db.distance,$db.sublocation where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id and sublocation.Location_location_Id=location.location_id AND sublocation.sublocation_type IN (".$rating.") GROUP BY location.location_id  ";
 
  if($sp == 0)
{
	 $query="Select * from $db.weather,$db.Location,$db.distance,$db.sublocation where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id and sublocation.Location_location_Id=location.location_id AND sublocation.sublocation_type IN (".$rating.") GROUP BY location.location_id ";
 
	}
else if($sp==1)
{
	 $query="Select * from $db.weather,$db.Location,$db.distance,$db.sublocation where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id and sublocation.Location_location_Id=location.location_id AND sublocation.sublocation_type IN (".$rating.") GROUP BY location.location_id ORDER BY distance.Distance_value ASC  ";
 }
else
{
	 $query="Select * from $db.weather,$db.Location,$db.distance,$db.sublocation where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id and sublocation.Location_location_Id=location.location_id AND sublocation.sublocation_type IN (".$rating.") GROUP BY location.location_id ORDER BY distance.Distance_value DESC  ";
 
}
 
 }
 else//for empty array
 {
	 //array is empty,but now want to sort
	 if($sp == 0)
{
	$query="Select * from $db.weather,$db.location,$db.distance where weather.location_location_Id=location.location_id AND location.location_id=distance.location_location_id ;";
}
else if($sp==1)
{
	$query="Select * from $db.weather,$db.Location,$db.distance where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id ORDER BY distance.Distance_value ASC ;";
}
else
{
	$query="Select * from $db.weather,$db.Location,$db.distance where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id ORDER BY distance.Distance_value DESC ;";

}
	 
	 
//$query="Select * from $db.weather,$db.Location,$db.distance where weather.Location_location_Id=location.location_id AND location.location_id=distance.Location_location_id ORDER BY distance.Distance_value ASC ;";
 }	 
 
 $runq=mysqli_query($conn,$query) or die("Failed to execute query 2");

  while($row=mysqli_fetch_assoc($runq))
{
	
echo "<div class='panel'>";
echo "<a data-toggle='collapse' name='0' data-parent='#list-container' href='#".$row['location_destination']."' class='list-group-item' onClick='selectTrip(this)'>"; 
echo "<img src='images/".$row['location_thumbnail']."' class='image'/>";
 echo "<div class='list-item-content'>";
 echo "<h4 class='list-group-item-heading'>".$row['location_destination']."</h4>";
 $badgequery="SELECT count(DISTINCT `Sublocation_type`) as cnt from sublocation where `Location_location_id`=".$row['location_id']."  ";
 $result = mysqli_query($conn, $badgequery);
$badgenum = mysqli_fetch_assoc($result);
 echo "<p class='list-group-item-text'>".$row['location_state']."<span class='badgeCounter'>".$badgenum['cnt']." Activities</span></p>";
echo " <div class='list-item-division'><ul><li>".$row['Distance_value']."</li>";	
echo "<li><img src='sunny.png' width='30' height='30'>".$row['Weather_6']."</li>";
echo " </ul>";
    echo"                        </div>               </div>            <div style='clear:both;'></div>           </a>  ";
	echo "<ul id='".$row['location_destination']."' class='collapse subResults'>";
	
	$query_numact="Select Sublocation_type,count(*) as cnt from $db.sublocation where sublocation.Location_location_id=".$row['location_id']." GROUP BY Sublocation_type;";
	$runq2=mysqli_query($conn,$query_numact) or die("Failed to execute query 2");
	while($row2=mysqli_fetch_assoc($runq2))
	{
		echo " <div class='panel'>";
		$hash0=$row['location_destination'].$row2['Sublocation_type'];
		$hash="#".$row['location_destination'].$row2['Sublocation_type'];
		if($row2['cnt']==1)
		{
				$query_subchild="SELECT * FROM $db.sublocation where Sublocation_type='".$row2['Sublocation_type']."' AND Location_location_id=".$row['location_id'].";";
			$runq3=mysqli_query($conn,$query_subchild) or die("Failed to execute query");
			while($row3=mysqli_fetch_assoc($runq3))
			{
				//echo "<li><img src='images/".$row2['Sublocation_type'].".png' width='50' height='40' style='margin-right: 10px;'>".$row2['Sublocation_type'];
				echo "<li onclick='updateInfo1WithActivity(this);'><img src='images/".$row2['Sublocation_type'].".png' width='50' height='40' style='margin-right: 10px;'>".$row3['Sublocation_name']."</li>";
			}
		}
		else
		{
	echo " <a data-toggle='collapse' href=".$hash."  data-parent='#".$row['location_destination']."' >";
		echo "<li><img src='images/".$row2['Sublocation_type'].".png' width='50' height='40' style='margin-right: 10px;'>".$row2['Sublocation_type'];
		echo "<span class='badgeCounterActivity'>".$row2['cnt']."</span></li>";
			echo "</a>";
			echo " <ul id=".$hash0." class='collapse subResults'>";
			$query_subchild="SELECT * FROM $db.sublocation where Sublocation_type='".$row2['Sublocation_type']."' AND Location_location_id=".$row['location_id'].";";
			$runq3=mysqli_query($conn,$query_subchild) or die("Failed to execute query");
			while($row3=mysqli_fetch_assoc($runq3))
			{
				echo "<li onclick='updateInfo1WithActivity(this);'>".$row3['Sublocation_name']."</li>";
			}
		
			echo "</ul>";
	}
	echo "</div>";
	}
			 
      echo"              </ul>";
	
	echo "</div>";

}
	echo "</div>";
mysqli_close($conn);
?>