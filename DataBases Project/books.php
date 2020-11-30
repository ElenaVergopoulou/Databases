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
           
       
     
        
        
        <form class="form-horizontal" action="books.php" method="POST">
            <div class="form-group">
                    <!--<label class ="control-label col-sm-offset-2 col-sm-10" for="Save">Save</label>-->
                    <div style=" position: absolute; left:180px; display:inline-block; margin:auto; ">
       
                            <button type="submit" class="btn btn-info" name="ascending">Ascending Title</button>         
                    </div>
                    <div style="display:inline-block; position:absolute; left:20px; margin:auto;">
       
                            <button type="submit" class="btn btn-info" name="descending">Descending Pages</button>         
                    </div>
                    
                    
            </div>
            <div style=" position: absolute; left:316px; top:73px; display:inline-block; margin:auto; ">
                 <a href = "popularity.php"
                           class ="btn btn-info">Popularity</a>
            </div>
            <div style=" position: absolute; left:420px; top:73px; display:inline-block; margin:auto; ">
                 <a href = "top5_cat.php"
                           class ="btn btn-info">Top 5 With Categories</a>
            </div>
        </form>
        
        <?php require_once 'books_process.php';
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
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Publishing Year</th>
                        <th>Pages</th>
                        <th>Publishing House</th>
                        <th colspan="2">Action</th>
                        
                    </tr>
                </thead>
            <?php
            while ($row = mysqli_fetch_assoc ( $retval )): ?>
                <tr>
                    <td> <?php echo $row['ISBN']; ?> </td>
                    <td> <?php echo $row['Title']; ?> </td>
                    <td> <?php echo $row['pubyear']; ?> </td>
                    <td> <?php echo $row['numpages']; ?> </td>
                    <td> <?php echo $row['pubname']; ?> </td>
                    
                    <td>
                                                      
                           <a href = "books_process.php?delete=<?php
                                echo $row['ISBN'];?>"
                           class ="btn btn-danger">Delete</a>
                           
                           <a href = "new_book.php?borrow=<?php
                                echo $row['ISBN'];?>"
                           class ="btn btn-success">Borrow</a>
                           
                         
                           
                        
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
           
       
        
        
   
        
        
    </body>
    
</html>