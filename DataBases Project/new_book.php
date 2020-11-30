<!DOCTYPE html>

<html>
    <head>
     <head>
       
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
        <?php 
            
            if(isset($_GET['borrow'])) {
                
                $ISBN = $_GET['borrow'];
                
            } 
            else {$ISBN="";}
            
            
           
            $memberID="";
            $date_of_borrowing="";
        ?>
        <div class="container">
            <form class="form-horizontal" action="borrows_result.php" method="POST">
               <div class="form-group">
                     
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $memberID?>" placeholder="Enter Member ID" name="memberID">
                     </div>
               </div>
                <div class="form-group">
                     
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $date_of_borrowing?>" placeholder="Enter Date" name="date_of_borrowing">                        
                     </div>
               </div>
                
                <div class="form-group">
                     
                     <div class="col-sm-10">
                           <input type="name" class="form-control"  value = "<?php echo $ISBN?>" placeholder="Enter ISBN" name="ISBN">
                     </div>
               </div>
                   <div class="form-group">
                   
                    <div class="pull-right">
                        
                            <button style="background-color:#5BC0DE; position: absolute; right: 310px; " type="submit" class="btn btn-success" name="save">Save</button> 
                    
                    </div>
               </div>
                </div>
                
                
                
                

            </form>
        </div>
        
    </body>
    
    
</html>