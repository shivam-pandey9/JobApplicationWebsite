<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="jobApp";

if(isset($_POST['submit'])){

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


$university= $_POST['university'];
$field= $_POST['field'];
$degree=$_POST['degree'];
$passout=$_POST['passout']; //int
$organisation=$_POST['organisation'];
$designation=$_POST['designation'];
$summary=$_POST['summary'];
$endPass=$_POST['endPass'];
$year=$_POST['year-exp'];
$experience=$_POST['experience'];
$summ=$_POST['summ'];	

$sqlquery = "INSERT INTO profile(university,field,degree,passout,organisation,designation,summary,endPass,yearExp,experience,summ) 
VALUES('$university','$field','$degree','$passout',	'$organisation','$designation',	'$summary',	'$endPass',	'$year','$experience','$summ') ";

$run = mysqli_query($conn,$sqlquery);

if($run){
echo "Query 2 Successful";
}
else{
echo "Query 2 Failed";
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


// form upload code - can create a separate file



// $conn->close(); isset($_GET['id']) ? $_GET['id'] : '';
mysqli_close($conn);
}
else{
    echo "Database Connection failed \n";
    die("Connection failed: ".$conn->connect_error);
}

}
else if(isset($_POST['sbt'])){

    $conn = new mysqli($servername,$username,$password,$dbname);
    

    if($conn){
        
        $pname= $_FILES['fl']['name'];   // rand(1000,10000)."-"
        $pname = rand(1000,10000).$pname;
        $ptype = $_FILES['fl']['type'];
        $psize = $_FILES['fl']['size'];
        $upload_dir = 'upload/'.$pname;

        $tname = $_FILES['fl']['tmp_name'];  // temp name

       

        echo $pname;
        echo $ptype;
        echo $psize;

        if(move_uploaded_file($tname,$upload_dir)){  

            $sqlquery="INSERT into upload(name,type,size) VALUES('$pname','$ptype','$psize')";
            // sudo chmod 777 -R /opt/lampp/htdocs/JobApplication/upload
            $run = mysqli_query($conn,$sqlquery);
        
            if($run){
            echo "Upload query - Successful";
            }
            else{ 
            echo "Upload query - Failed";
            }
        } 
        else{
            echo "Upload failed";
        }


        mysqli_close($conn);
    }
    else{
        echo "Database not Connected";
    }
 
    
}
else
{
    // submit not clicked
    echo " no input detected";
}

?> 