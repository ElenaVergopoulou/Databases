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
        <div style=" position: absolute; left:140px; display:inline-block; margin:auto; ">
       
        <a href="books.php" class="btn btn-info"">Back</a>         
    </div>
            
        <?php 
        
       
   
            
           
            $db=mysqli_connect("localhost","root","","db_project");
            $retbor = mysqli_query($db,"SELECT Title, Count(*) as Popularity
                                        FROM borrows AS bo,book as b
                                        WHERE bo.ISBN=b.ISBN
                                        GROUP BY bo.ISBN
                                        ORDER BY Title");
            
            if (mysqli_num_rows($retbor) > 0): ?>
            
            
            
            <div class="container" style="padding:50px;">
            <table class="table">
                <thead> 
                    <tr>
                       
                        <th>Title</th>
                        <th>Times Borrowed</th>
                        
                      
                        
                    </tr>
                </thead>
            <?php
            while ($row2 = mysqli_fetch_assoc($retbor)): ?>
                <tr>
            
                    <td> <?php echo $row2['Title']; ?> </td>
                    <td> <?php echo $row2['Popularity']; ?> </td>
                </tr>
                      
                       

            <?php endwhile;
            else: ?> 
            <div class="fullscreenDiv">
                 <div class="center_attr">
                    <?php echo  "NO ENTRIES"; ?>
                 </div>
            </div>
                 
            <?php endif;?> 
            </table>
        </div>
                
        <?php
           
            if(! $retbor){
                print '<h1>';
                print mysqli_error($db);
                print '</h1>';
            }
            

        
        ?> 
        
        
        
        
    </body>
</html>