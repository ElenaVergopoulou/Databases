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
       
        <a href="members.php" class="btn btn-info">Back</a>         
    </div>
            
        <?php 
        
       
   
            
           
            $db=mysqli_connect("localhost","root","","db_project");
            $retbor = mysqli_query($db,"Select member.MFirst,member.MLast, borrows.date_of_borrowing, borrows.ISBN
                                        FROM member
                                        join borrows on member.memberID = borrows.memberID
                                        ");
            
            if (mysqli_num_rows($retbor) > 0): ?>
            
            
            
            <div class="container" style="padding:50px;">
            <table class="table">
                <thead> 
                    <tr>
                       
                        <th>First</th>
                        <th>Last</th>
                        <th>Date of Borrowing</th>
                        <th>ISBN</th>
                        
                      
                        
                    </tr>
                </thead>
            <?php
            while ($row2 = mysqli_fetch_assoc($retbor)): ?>
                <tr>
            
                    <td> <?php echo $row2['MFirst']; ?> </td>
                    <td> <?php echo $row2['MLast']; ?> </td>
                    <td> <?php echo $row2['date_of_borrowing']; ?> </td>
                    <td> <?php echo $row2['ISBN']; ?> </td>
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