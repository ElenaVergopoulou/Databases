

<?php

session_start();

$memberID=0;
$MFirst="";
$MLast="";
$Street="";
$Snumber=0;    
$PostalCode="";
$MBirthDate=date("");
$update=false;


$db=mysqli_connect("localhost","root","","db_project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  
if(isset($_GET['delete'])){
   
    
    $memberID =  $_GET['delete'];
    //$first = $_GET['delete'];
    //$last = $_GET['delete'];
    $retval = mysqli_query($db,"DELETE FROM member WHERE memberID = '{$memberID}'");
    if(! $retval )
    {
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
     
    $_SESSION['message'] = "Record deleted";
    $_SESSION['msg_type'] = "danger";
    
     header("location: members.php");
}

if(isset($_GET['edit'])){
    $memberID = $_GET['edit'];
    $retval = mysqli_query($db,"SELECT * FROM member WHERE memberID = $memberID");
    $update = true;
    if($retval){
        $row = $retval->fetch_array();
       
        $MFirst = $row['MFirst'];
        $MLast = $row['MLast'];
        $Street = $row['Street'];
        $Snumber = $row['Snumber'];
        $PostalCode= $row['PostalCode'];
        $MBirthDate= $row['MBirthDate'];
        
    }
    if(! $retval){
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
    
}

if(isset($_GET['borrow'])){
    $ISBN = $_GET['borrow'];
    $retval = mysqli_query($db,"SELECT * FROM book WHERE ISBN = $ISBN");
    $borrow_update = true;
    if($retval){
        $row = $retval->fetch_array();
        $ISBN = $row['ISBN'];
        $Title = $row['Title'];
        $pubyear = $row['pubyear'];
        
    }
    if(! $retval){
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
    
    header("location: new_book.php");
    
}


if(isset($_POST['save'])){
   $MFirst = $_POST['MFirst'];
        $MLast = $_POST['MLast'];
        $Street = $_POST['Street'];
        $Snumber = $_POST['Snumber'];
        $PostalCode= $_POST['PostalCode'];
        $MBirthDate= $_POST['MBirthDate'];
   
    
    
    mysqli_query($db,"INSERT INTO member (MFirst, MLast, Street,Snumber,PostalCode,MBirthDate) VALUES('$MFirst','$MLast','$Street','$Snumber','$PostalCode','$MBirthDate')");
 
    echo " $first $last $salary";
    
    $_SESSION['message'] = "Record saved";
    $_SESSION['msg_type'] = "success";
    
    header("location: members.php");
    //mysqli_close($db);
}   

if(isset($_POST['update'])){
    $memberID = $_POST['memberID'];
   
    
    $MFirst = $_POST['MFirst'];
        $MLast = $_POST['MLast'];
        $Street = $_POST['Street'];
        $Snumber = $_POST['Snumber'];
        $PostalCode= $_POST['PostalCode'];
        $MBirthDate= $_POST['MBirthDate'];
   
    
    $retval = mysqli_query($db,"UPDATE member SET MFirst='{$MFirst}', MLast='{$MLast}'
             , Street='{$Street}', Snumber = '{$Snumber}', PostalCode= '{$PostalCode}', MBirthDate = '{$MBirthDate}'  WHERE memberID = '{$memberID}'");
    if(! $retval )
    {
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
    
        $_SESSION['message'] = "Record updated!";
        $_SESSION['msg_type'] = "warning";
        
        header("location: members.php");

}
if(isset($_POST['ascending'])){
     $retval = mysqli_query($db,"SELECT *
                                FROM member
                                ORDER BY MFirst ASC
                                ");

    
}
else if(isset($_POST['descending'])){
     $retval = mysqli_query($db,"SELECT *
                                FROM member
                                ORDER BY MFirst DESC
                                ");
    
}

else {
        
    $retval = mysqli_query($db,"SELECT * FROM member");
    
}
    mysqli_close($db);
  
  ?>
