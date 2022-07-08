
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
              
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="filter"  class="form-control" placeholder="Search data" onkeyup="searchFun()">
                                       
                                    </div>
                                </form>

                          
                        </div>
                    </div>
                </div>
            </div>

            
                            <div class="col-md-12">
               
                    <div class="card-body">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>category</th>
                                    <th>comment</th>
                                    <th>created_at</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                           
<?php 

session_start();
$conn = mysqli_connect("localhost","root","","discussion_forum");
$query = "SELECT * FROM comments";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0)
{
    
    foreach($query_run as $row)
    {
        
        ?>
       
    <tr>
    <td><?= $row['id']; ?></td>
  <td><?= $row['name']; ?></td>
      <td><?= $row['category']; ?></td>
            <td><?= $row['comment']; ?></td>
        <td><?= $row['created_at']; ?></td>
           
          
        </tr>
        <?php
    }
}

else
{
    ?>
        <tr>
            <td colspan="4">No Record Found</td>
        </tr>
    <?php
}
?>
    <script>

function searchFun() {
      // Declare variables 
      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('myTable').rows[0].cells.length;
      input = document.getElementById("filter");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) { // except first(heading) row
        count_td = 0;
        for(j = 1; j < column_length-1; j++){ // except first column
            td = tr[i].getElementsByTagName("td")[j];
            /* ADD columns here that you want you to filter to be used on */
            if (td) {
              if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {            
                count_td++;
              }
            }
        }
        if(count_td > 0){
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
      }
      
    }



        </script>
</body>
</html>