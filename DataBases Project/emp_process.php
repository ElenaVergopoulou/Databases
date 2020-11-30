

<?php

session_start();

$first="";
$last="";
$salary="";
$update=false;
$empID=0;

$db=mysqli_connect("localhost","root","","db_project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  
  
  
  
if(isset($_GET['delete'])){
   
    
    $empID =  $_GET['delete'];
    //$first = $_GET['delete'];
    //$last = $_GET['delete'];
    $retval = mysqli_query($db,"DELETE FROM employee WHERE empID = $empID");
    if(! $retval )
    {
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
     
    $_SESSION['message'] = "Record deleted";
    $_SESSION['msg_type'] = "danger";
    
     header("location: employees.php");
}

if(isset($_GET['edit'])){
    $empID = $_GET['edit'];
    $retval = mysqli_query($db,"SELECT * FROM employee WHERE empID = $empID");
    $update = true;
    if($retval){
        $row = $retval->fetch_array();
        $first = $row['EFirst'];
        $last = $row['ELast'];
        $salary = $row['salary'];
        
    }
    if(! $retval){
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
    
}


if(isset($_POST['save'])){
    $first = $_POST['EFirst'];
    $last = $_POST['ELast'];
    $salary = $_POST['salary'];
    
    
    mysqli_query($db,"INSERT INTO employee (EFirst, ELast, salary) VALUES('$first','$last','$salary')");
 
    echo " $first $last $salary";
    
    $_SESSION['message'] = "Record saved";
    $_SESSION['msg_type'] = "success";
    
    header("location: employees.php");
    //mysqli_close($db);
}   

if(isset($_POST['update'])){
    $empID = $_POST['empID'];
    $first = $_POST['EFirst'];
    $last = $_POST['ELast'];
    $salary = $_POST['salary'];
   
    
    $retval = mysqli_query($db,"UPDATE employee SET EFirst='$first', ELast='$last'
             , salary=$salary WHERE empID = $empID");
    if(! $retval )
    {
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
    
        $_SESSION['message'] = "Record updated!";
        $_SESSION['msg_type'] = "warning";
        
        header("location: employees.php");

}
if(isset($_POST['ascending'])){
     $retval = mysqli_query($db,"SELECT *
                            FROM employee
                            ORDER BY EFirst ASC
                            ");
    
}
else if(isset($_POST['descending'])){
     $retval = mysqli_query($db,"SELECT *
                            FROM employee
                            ORDER BY ELast DESC
                            ");

}

else {
        
    $retval = mysqli_query($db,"SELECT * FROM employee");
}
    mysqli_close($db);
  
  ?>
