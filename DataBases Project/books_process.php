

<?php

session_start();

$ISBN="";
$Title="";
$pubyear=0;
$numpages=0;    
$pubname="";
$update=false;


$db=mysqli_connect("localhost","root","","db_project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  
if(isset($_GET['delete'])){
   
    
    $ISBN =  $_GET['delete'];
    //$first = $_GET['delete'];
    //$last = $_GET['delete'];
    $retval = mysqli_query($db,"DELETE FROM book WHERE ISBN = '{$ISBN}'");
    if(! $retval )
    {
        print '<h1>';
        print mysqli_error($db);
        print '</h1>';
    }
     
    $_SESSION['message'] = "Record deleted";
    $_SESSION['msg_type'] = "danger";
    
     header("location: books.php");
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


if(isset($_POST['ascending'])){
     $retval = mysqli_query($db,"SELECT ISBN,Title,pubyear,numpages, pubname
                    FROM book
                    ORDER BY Title ASC
                    ");
    
}
else if(isset($_POST['descending'])){
                        $retval = mysqli_query($db,"SELECT ISBN,Title,pubyear,numpages, pubname
                    FROM book
                    ORDER BY numpages DESC
                    ");
    
}

else {
        
    $retval = mysqli_query($db,"SELECT * FROM book");
    
}
    mysqli_close($db);
  
  ?>
