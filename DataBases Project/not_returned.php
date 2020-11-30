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
                   
                    
                    
    </div>
    
    <?php 
        
        $db=mysqli_connect("localhost","root","","db_project");
      
       
   
            if(isset($_POST['ret'])):
       
   
            $memberID = $_POST['memberID'];
           
            
            
            
            
            $retbor = mysqli_query($db,"SELECT Title 
                                        FROM book
                                        WHERE book.ISBN IN 
                                              (SELECT ISBN
                                              FROM borrows
                                              WHERE memberID='{$memberID}' AND date_of_return IS NULL
                                              );
                                        ");
            if (mysqli_num_rows($retbor) > 0): ?>
            
            
            
            <div class="container" style="padding:50px;">
            <table class="table">
                <thead> 
                    <tr>
                      
                        <th>Title</th>
                 
                        
                      
                        
                    </tr>
                </thead>
            <?php
            while ($row2 = mysqli_fetch_assoc($retbor)): ?>
                <tr>
            
                    <td> <?php echo $row2['Title']; ?> </td>
           
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
            endif;
            if(! $retbor){
                print '<h1>';
                print mysqli_error($db);
                print '</h1>';
            }
            

        
        ?> 
    </body>
    
</html>