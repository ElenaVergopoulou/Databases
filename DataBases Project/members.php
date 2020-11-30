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
        <form class="form-horizontal" action="members.php" method="POST">
            <div class="form-group">
                    <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                    <div style=" position: absolute; left:140px; display:inline-block; margin:auto; ">
       
                            <button type="submit" class="btn btn-info" name="ascending">Ascending</button>         
                    </div>
                    <div style="display:inline-block; position:absolute; left:20px; margin:auto;">
       
                            <button type="submit" class="btn btn-info" name="descending">Descending</button>         
                    </div>
                    
                    
            </div>
            <div style=" position: absolute; left:250px; top:73px; display:inline-block; margin:auto; ">
                 <a href = "active_members.php"
                           class ="btn btn-info">Active Members</a>
            </div>
            
            
          <?php require_once 'memb_process.php';
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
                        <th>memberID</th>
                        <th>MFirst</th>
                        <th>MLast</th>
                        <th>Street</th>
                        <th>Snumber</th>
                        <th>PostalCode</th>
                        <th>MBrithDate</th>
                        <th colspan="2">Action</th>
                        
                    </tr>
                </thead>
            <?php
            while ($row = $retval->fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $row['memberID']; ?> </td>
                    <td> <?php echo $row['MFirst']; ?> </td>
                    <td> <?php echo $row['MLast']; ?> </td>
                    <td> <?php echo $row['Street']; ?> </td>
                    <td> <?php echo $row['Snumber']; ?> </td>
                    <td> <?php echo $row['PostalCode']; ?> </td>
                    <td> <?php echo $row['MBirthDate']; ?> </td>
                    
                    <td>
                        <a href="members.php?edit=<?php echo $row['memberID']; ?>"
                           class="btn btn-info">Edit</a>
                           <a href = "memb_process.php?delete=<?php
                                echo $row['memberID'];?>"
                           class ="btn btn-danger">Delete</a>
                           
                           <a>                          
                               <form class="form-horizontal" action="not_returned.php" method="POST"
                                     <div class="form-group">
                                         <div class="hidden-sm">
                                            <input type="hidden" name="memberID" value="<?php echo $row['memberID']; ?> "
                                        </div>
                                        <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                                        <div>
                                                <button  style="position:relative; top:5px;" type="submit" class="btn btn-primary" name="ret">Active</button>         
                                        </div>
                                     </div>
                               </form>
                           </a>
                           
                           <a>
                               <form class="form-horizontal" action="borrowed.php" method="POST"
                                     <div class="form-group">
                                         <div class="hidden-sm">
                                            <input type="hidden" name="memberID" value="<?php echo $row['memberID']; ?> "
                                        </div>
                                        <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                                        <div>
                                                <button  style="position:relative; top:10px;" type="submit" class="btn btn-success" name="bor">Borrowed Books</button>         
                                        </div>
                                     </div>
                               </form>
                            </a>
                           
                         
                           
                        
                    </td> 
                </tr>    

            <?php endwhile; ?> 
            </table>
        </div>
        
        
        <div class="container">
            <form class="form-horizontal" action="memb_process.php" method="POST">
                <div class="hidden-sm">
                <input type="hidden" name="memberID" value="<?php echo $memberID?> "
                </div>
                <div class="form-group">
                     <label class="control-label col-sm-2" for="MFirst">First Name:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $MFirst?>" placeholder="Enter First Name" name="MFirst">
                     </div>
                </div>
                
                <div class="form-group">
                     <label class="control-label col-sm-2" for="MLast">Last Name:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $MLast?>" placeholder="Enter Last Name" name="MLast">
                     </div>
                </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="Street">Street:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $Street?>" placeholder="Enter Street" name="Street">
                     </div>
                </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="Snumber">Street Number:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control"  value = "<?php echo $Snumber?>" placeholder="Enter Street Number" name="Snumber">
                     </div>
                </div>
                <div class="form-group">
                     <label class="control-label col-sm-2" for="PostalCode">Postal Code:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $PostalCode?>"  placeholder="Enter Postal Code" name="PostalCode">
                     </div>
                </div>
                
                <div class="form-group">
                     <label class="control-label col-sm-2" for="MBirthDate">MBirthDate:</label>
                     <div class="col-sm-10">
                            <input type="name" class="form-control" value="<?php echo $MBirthDate?>"  placeholder="Enter Member Birth Date" name="MBirthDate">
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
                            <button style="background-color:#5BC0DE; position: absolute; right: 105px; " type="submit" class="btn btn-primary" name="save">Save</button> 
                        <?php endif;?>
                    </div>
                </div>
                

            </form>
        </div>
  
        
        <script>  
            function pre_r( $array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            } 
        </script>
    </body>          
</html>  