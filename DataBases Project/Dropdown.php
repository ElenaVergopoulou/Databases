   <div class="dropdown">
             <button onclick="myFunction()" class="dropbtn">Dropdown</button>
              <div id="myDropdown" class="dropdown-content">
                <a href="Members_Asc.php">Ascending Last Name</a>
                <a href="Temporary_Permanent.php">Permanent Employee Num</a>
                <a href="#">Link 2</a>
               </div>
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

        
        
   <div class="container" style="padding:10px; position: static;">
                                    <form action="books.php" method="POST">
                                 
                                       <button type="submit" class="btn btn-success" name="borrow">Borrow</button>         
                                  
                                    </form>
                               </div>

        
<td> <?php  $db=mysqli_connect("localhost","root","","db_project"); 
                                $ISBN = $row['ISBN']; 
                                $copies_result= mysqli_query($db,"SELECT * FROM copies WHERE ISBN = '{$ISBN}'"); 
                                $row_c = mysqli_fetch_array($copies_result);   
                                echo $row_c['copyNr'];
                                echo " ";
                                echo $row_c['shelf'];
                                //$row_c = $copies_result->fetch_assoc();
                                //echo $row_c['copyNr'];
                                
                                                               
                                ?>
                     </td>