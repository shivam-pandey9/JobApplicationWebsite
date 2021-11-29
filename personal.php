<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="jobApp";

if(isset($_POST['edu'])){

echo "hello";

}
else if(isset($_POST['submit'])){

    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];


    $curSalary = $_POST['curSalary'];
    $varSalary = $_POST['varSalary'];
    $expSalary = $_POST['expSalary'];
    $notice = $_POST['notice'];
    $cover = $_POST['cover'];

 
if($fname=='' || $lname=='' || $email=='' || $phone=='' || $location=='')
{
    echo "fill empty fields \n".PHP_EOL;
    die();
}

// connection
$conn = new mysqli($servername,$username,$password,$dbname);

if($conn){

// query
$sqlquery = "INSERT INTO personal(fname,lname,email	,phone,location) VALUES('$fname','$lname','$email','$phone','$location')";
// id	fname	lname	email	phone	location	
$run = mysqli_query($conn,$sqlquery);

if($run){
echo "Query 1 Successful";
}
else{
echo "Query 1 Failed";
}

$sqlquery = "INSERT INTO detail(curSalary,bonus,expSalary,notice,cover) VALUES('$curSalary','$varSalary','$expSalary','$notice','$cover')";
// id	fname	lname	email	phone	location	
$run = mysqli_query($conn,$sqlquery);

if($run){
echo "Query 3 Successful";
}
else{
echo "Query 3 Failed";
}



// $conn->close(); isset($_GET['id']) ? $_GET['id'] : '';
mysqli_close($conn);
}
else{
    echo "Database Connection failed \n";
    die("Connection failed: ".$conn->connect_error);
}

}
else
{
    // submit not clicked
    echo " no input detected";
}

?> 