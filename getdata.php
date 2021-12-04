<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="jobApp";
// session start in case of login
// $folder = "JobApplication";

if(isset($_POST['getbtn'])){

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn){

$sqlquery = "SELECT * from personal";

$run = mysqli_query($conn,$sqlquery);

$sqlquery2 = "SELECT * from upload";

$run2 = mysqli_query($conn,$sqlquery2);


if($run && $run2){

echo "Got the data";
echo "<br>";
echo "<br>";
if(mysqli_num_rows($run) )
{

echo "<table>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Resume</th>";
echo "</tr>";
$loc = "/JobApplication/upload/";
while($row = mysqli_fetch_array($run))
{
    //  as both tables have equal size

echo "<tr>";
echo "<td>".$row['fname']." ".$row['lname']."</td>";
echo "<td>".$row['email']."</td>";
$row2 = mysqli_fetch_array($run2);
$temp = $loc.$row2['name'];
echo "<td><a href=' ".$temp."'>".$row2['name']."</a></td>";
echo "</tr>";

}


echo "</table>";

mysqli_free_result($run);
mysqli_free_result($run2);
}
else{
echo "data empty";
}

// mysqli_free_result($run);
}
else{
echo "Retrieval Failed";
}



mysqli_close($conn);
}
else{
    echo "Database not connected";
}



}
else{
    echo "button input not received";
}
?>

