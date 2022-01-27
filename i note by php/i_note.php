<?php
include 'dtconn.php';


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" type="text/css" href="style.css"> 
    
  <title>I Notes</title>
  </head>
  <body>
  

    <nav class="navbar navbar-expand-lg navbar-light   nv1">
        <div class="container-fluid">
          <a class="navbar-brand p-2 fs-3" href="#">🗒️i-Notes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>


      <?php

      if (isset($_POST['submit'])) {        //get/post connection

          $title=$_POST['title'];
          $description= $_POST['desc'];


        $sql= "INSERT INTO `inote` ( `title`, `description`) VALUES ( '$title', '$description')";     // insertion
        $result=mysqli_query($conn,$sql);

        if($result){

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Your Note is successfully Added to the list!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        else{

            echo"insert failed ..this is error".mysqli_error($conn);
        }
}

?>

      <?php    
        
        if (isset($_GET['delete'])) {        //get/post connection

          $sl=$_GET['delete'];
         
          $sql= "DELETE FROM  `inote` WHERE sl ='$sl'";     // deletation
          $result=mysqli_query($conn,$sql);
          if ($result) {
            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Your Note is deleted successfully from the list!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        
        }
          
        else{

            echo"Deletation failed ";
        }

        }

    ?>
   





      
      <div class="container p-4">

        <h2 class="text-white">Add a Note..</h2>

        <form action="" method="post">
      
        
            <div class="mb-3">
              <label for="title" class="form-label text-white">Note Title</label>
              <input type="text" class="form-control bg-transparent border border-light border-3 tx1  text-white" id="title" name="title"  aria-describedby="emailHelp">
             </div>
            
             <div class="mb-3">
                 <label for="desc" class="form-label text-white">Note Description</label>
                <textarea class="form-control bg-transparent border border-light border-4  text-white tx2" id="desc"  name="desc" rows="3"></textarea>
            </div>
            
            <button type="submit" name="submit" class="btn btn btn btn-outline-light">Add Note</button>
          </form>
      </div>
     
     
      




      <div class="container my-4 tbbg ">



              <hr>
                
                  <table class="table  table-hover" id="myTable">
                    
                  <thead class=>
                    
                    <tr>
                      <th scope="col">Sl</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  
                  <?php

                    $sql="SELECT * FROM `inote`"; 
                                                          //selecting operation from db
                    $result=mysqli_query($conn,$sql);
                   

                            $no=1;
                            
                            while($row=mysqli_fetch_assoc($result))://mysqli_fetch_assoc($result)=fetch data from db 
                            
                            
                            ?> 
                              
                              
                              
                                <tr>
                                <th scope='row'><?php echo $no;?></th>
                                <td><?php echo $row ['title'];?></td>                <!--real rules of select/update/delete query-->
                                <td><?php echo $row ['description'];?></td>
                                <td>
                                <a href="updateinote.php?edit=<?php echo $row['sl'];?>"
                                class="btn btn-info">EDIT</a> 
                               
                                <a href="i_note.php?delete=<?php echo $row['sl'];?>"
                                class="btn btn-danger">DELETE</a> 
                                
                                </td>
                                </tr>
                                
                              
                             
                             
                            
                              <?php 
                              
                              $no=$no+1;

                              endwhile 
                              ?>
                          
                             
                   
                  
                   
                  </tbody>
                </table>

                <hr>

      </div>

   
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
    <script>

        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

    </script>

<script>




</script>
  </body>
</html>