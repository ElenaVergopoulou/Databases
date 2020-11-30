<!DOCTYPE html>
<html lang="en">
    
<html>
    
   
    <head>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
       
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">

    </head>
    
    <body>
        <?php require_once 'process.php';
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
        <?php
            
            $mysqli = new mysqli("localhost", 'root','', 'db_project' ) or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM permanent_view") or die($mysqli->error);
            //pre_r($result);
            
        ?> 
        
        <div class="dropdown">
             <button onclick="myFunction()" class="dropbtn">Dropdown</button>
              <div id="myDropdown" class="dropdown-content">
                  <a href="Members_Asc.php">Ascending Last Name</a>
                  <a href="Temporary_Permanent.php">Permanent Employee Num</a>
                <a href="#">Link 3</a>
               </div>
        </div> 
        
        <div class="container">
            <table class="table">
                <thead> 
                    <tr>
                        <th>First</th>
                        <th>Last</th>
                        <th>HiringDate</th>
                        <th colspan="2">Action</th>
                        
                    </tr>
                </thead>
            <?php
            while ($row = $result->fetch_assoc()):; ?>
                <tr>
                    <td> <?php echo $row['EFirst']; ?> </td>
                    <td> <?php echo $row['ELast']; ?> </td>
                    <td> <?php echo $row['HiringDate']; ?> </td>
                    <td>'
                        <a href="index.php?edit=<?php echo $row['empID']; ?>"
                           class="btn btn-info">Edit</a>
                        <a href = "process.php?delete=<?php
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
           
        <div class="button"><button type="submit" class="btn btn-primary" name="save">Save</button></div>
        
        <div class="container">
            <form class="form-horizontal" action="process.php" method="POST">
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
                     <label class="control-label col-sm-2" for="HiringDate">Hiring Date:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $hiring_d?>"  placeholder="Enter Hiring Date" name="HiringDate">
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
                            <button type="submit" class="btn btn-primary" name="save">Save</button> 
                        <?php endif;?>
                    </div>
                </div>
                

            </form>
        </div>
   
        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>
        
    </body>
     
</html>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

