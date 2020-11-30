<!DOCTYPE html>
<html lang="en">
    
<html>
    
   
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
        
        <form class="form-horizontal" action="employees.php" method="POST">
            <div class="form-group">
                    <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                    <div style=" position: absolute; left:140px; display:inline-block; margin:auto; ">
       
                            <button type="submit" class="btn btn-info" name="ascending">Ascending</button>         
                    </div>
                    <div style="display:inline-block; position:absolute; left:20px; margin:auto;">
       
                            <button type="submit" class="btn btn-info" name="descending">Descending</button>         
                    </div>
                    
                    
            </div>
        
        
        <?php require_once 'emp_process.php';
        ?>
        
        <?php
         
            if(isset($_SESSION['message'])): 
               
        ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                    
                    <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
            </div>
        <?php endif; ?>
        
        
            
        <div class="container" style="padding:50px;">
            <table class="table">
                <thead> 
                    <tr>
                        <th>First</th>
                        <th>Last</th>
                        <th>Salary</th>
                        <th colspan="2">Action</th>
                        
                    </tr>
                </thead>
            <?php
            while ($row = $retval->fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $row['EFirst']; ?> </td>
                    <td> <?php echo $row['ELast']; ?> </td>
                    <td> <?php echo $row['salary']; ?> </td>
                    <td>
                        <a href="employees.php?edit=<?php echo $row['empID']; ?>"
                           class="btn btn-info">Edit</a>
                        <a href = "emp_process.php?delete=<?php
                                echo $row['empID'];
                                //echo $row['EFirst'];
                                //echo $row['ELast']; ?>"
                           class ="btn btn-danger">Delete</a>
                           
                        
                    </td> 
                </tr>    

            <?php endwhile; ?> 
            </table>
        </div>
  
        
        <script>  
            function pre_r( $array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            } 
        </script>
           
       
        
        <div class="container">
            <form class="form-horizontal" action="emp_process.php" method="POST">
                <div class="hidden-sm">
                <input type="hidden" name="empID" value="<?php echo $empID?> "
                </div>
                <div class="form-group">
                     <label class="control-label col-sm-2" for="EFirst">First Name:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $first?>" placeholder="Enter First Name" name="EFirst">
                     </div>
                </div>
                
                <div class="form-group">
                     <label class="control-label col-sm-2" for="ELast">Last Name:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $last?>" placeholder="Enter Last Name" name="ELast">
                     </div>
                </div>
                <div class="form-group">
                     <label class="control-label col-sm-2" for="salary">Salary:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $salary?>"  placeholder="Enter Salary" name="salary">
                     </div>
                </div>
                
                <div class="form-group">
                    <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                    <div class="pull-right">
                        <?php
                            if ($update == true):
                        ?>
                            <button type="submit" class="btn btn-info" name="update">Update</button> 
                        
                        <?php else: ?>
                            <button style="background-color:#5BC0DE; position: absolute; right: 105px; display:none; " type="submit" class="btn btn-primary" name="save">Save</button> 
                        <?php endif;?>
                    </div>
                </div>
                

            </form>
        </div>
   
        
        
    </body>
     
</html>

