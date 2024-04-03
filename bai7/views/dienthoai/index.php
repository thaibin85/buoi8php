<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php
        require_once("../../connect.php");

        $mysqli = new Connect();

        $results = $mysqli->query("Select * from tblphone");
        
        while($row = $results->fetch_assoc()){
            echo '<div class="card" style="width: 18rem;">
            <img class="card-img-top" src="'.$row["Image"].'" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">'.$row["Name"].'</h5>
              <p class="card-text">'.$row["price"].'</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>';
        }
    ?>
</body>
</html>