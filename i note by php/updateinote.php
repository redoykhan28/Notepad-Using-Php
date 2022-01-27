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
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Hello, world!</title>
  </head>
  <body>
  
  <?php


if (isset($_GET['edit']) ) {        //get/post connection

  
    $sl=$_GET['edit'];


  $sql= "SELECT * FROM `inote` WHERE sl='$sl'";  //select query
  $result=mysqli_query($conn,$sql);

 
  
 
    while($row=mysqli_fetch_assoc($result)) //mysqli_fetch_assoc($result)=fetch data from db
    {

        $title= $row['title'];
        $description= $row['description'];
        $sl=$row['sl'];


    }
  
}

?>


<?php

if(isset($_POST['update'])){

  extract($_GET);   //get er value nie asa
  $title= $_POST['title'];
  $description= $_POST['desc'];
 

  $sql="UPDATE `inote` SET title = '$title', description = '$description' WHERE `inote`.sl = '$sl'"; //Update query
  $result=mysqli_query($conn,$sql);

 
if($result){

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
Your Note is successfully updated to the list!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

  else{

    echo "Failed";
  }


}


?>



<div class="container p-4">

<h2 class="text-white">Edit Your Note....</h2>

<form method="post">
    
    <div class="mb-3">
      <label for="title" class="form-label text-white">Note Title</label>
      <input type="text" value="<?php echo $title;?>" class="form-control bg-transparent border border-light border-3 tx1  text-white" id="title" name="title" aria-describedby="emailHelp">
     </div>
     
    
     <div class="mb-3">
         <label for="desc" class="form-label text-white">Note Description</label>
        <textarea class="form-control bg-transparent border border-light border-4  text-white tx2"  id="desc" name="desc" rows="3"><?php echo $description;?></textarea>
    </div>
    
    <button type="submit" name="update" class="btn btn btn-outline-light">Update</button>
    <a href="i_note.php"class="btn btn btn btn-outline-light">View Table</a> 
  </form>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>