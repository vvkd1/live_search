<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "live_search";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
    echo "";
} else {
    echo "failed";
}

$query = "select * from search_table";
$query_run = mysqli_query($conn, $query);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row mt-4">

            <div class="col-md-6">



                <table class="table table-striped">

                    <thead class="bg-primary text-white">

                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>class</th>
                            <th>mobile_no</th>
                            <input type="text" placeholder="search" class="form-control" id="search" name="search" />

                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach($query_run as $row) {
                         ?>  

                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['class'] ?></td>
                            <td><?php echo $row['mobile_no'] ?></td>

                        </tr>
                   <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 mt-4">

               
            </div>
        </div>
    </div>
    
    
                
  <script>
  $(document).ready(function(){

  $("#search").on("keyup",function(){
  
   var search_data = $("#search").val()


  $.ajax({
       url: "search.php",
       type: "POST",
       data: {searchdata: search_data},
       success : function(data){
        $("#tbody").html(data);

       }



  })

  })

  })

</script>


</body>

</html>