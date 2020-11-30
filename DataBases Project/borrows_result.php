<!DOCTYPE html>

<html>
 
     <head>
        <?php $db=mysqli_connect("localhost","root","","db_project");
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
        ?>

        <link rel="stylesheet" href="style.css">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
          </div>
          <ul class="nav navbar-nav navbar-default">
              <li class="active"><a href="Home.php">Εθνικό Μετσόβιο Βιβλιοπωλείο</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="members.php">Members</a></li>
            
            <li><a href="employees.php">Employees</a></li>
          </ul>
        </div>
      </nav>
    </head>
    <body>
      <div style=" position: absolute; left:140px; display:inline-block; margin:auto; ">
       
          <a href="books.php" class="btn btn-info"">Back</a>         
    </div>
        <?php




//A Book Is Borrowed
if(isset($_POST['save'])){
      
      $memberID = $_POST['memberID'];
     
      $ISBN = $_POST['ISBN'];
       // $copyNr = $_POST['copyNr'];
       $date_of_borrowing = $_POST['date_of_borrowing'];

$conn=mysqli_connect("localhost","root","","db_project");

$control1 = "SELECT ISBN FROM sumbooks as b WHERE b.ISBN = '{$ISBN}' and b.CopyNum > 0";

$s1 = $conn -> query($control1);


$set1 = mysqli_fetch_assoc($s1);


if ($set1['ISBN'] == $ISBN){

    $sql = "UPDATE sumbooks SET sumbooks.CopyNum = sumbooks.CopyNum - 1 WHERE sumbooks.ISBN = '{$ISBN}'";
    $sql2 = "INSERT INTO borrows (memberID,ISBN, copyNr, date_of_borrowing,date_of_return) VALUES ('{$memberID}','{$ISBN}', 1,'{$date_of_borrowing}',NULL)";
     $sql3 = "UPDATE borrowed SET borrowed.leftovers = borrowed.leftovers - 1 WHERE borroed.ISBM = '{ISBN];'";
     
     $conn->query($sql2);
     $conn->query($sql3);

    if($conn->query($sql) == TRUE ){
      ?>
      <div class="center_attr">
                    <?php echo   "A book has been borrowed successfully"; ?>
                 </div>
            </div> <?php
    }
    else{
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
  ?><div class="fullscreenDiv">
                 <div class="center_attr">
                    <?php echo   "Error: Member Cannot Borrow Book"; ?>
                 </div>
            </div> <?php
}
$conn->close();
}
 ?>

        
        
        
    </body>
    
</html>
   
    