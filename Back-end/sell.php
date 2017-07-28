<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="code.js"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <br /><br />
    Car :
      <?php
      $servername = "handson-mysql";
      $username = "guestinterns";
      $password = "interns2017";
      $dbname = "intern2017_group1";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT carID, carMake, carModel FROM car_table  ";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        $select= '<select id="selectList">';
        while($rs = $result->fetch_assoc()){
          $select .='<option value="'.$rs['carID'].'">'.$rs['carMake']." ".$rs['carModel'].'</option>';
        }
        $select .= '</select>';
        echo $select;
      }
      ?><br /><br />
    Car's Color : <input type="text" id="colorInput" /><br /><br />
    Sell Price : <input type="text" id="sellPriceInput" /><br /><br />
    Car's Image : <input type="text" id="imageURL" /><br /><br />
    Today's Date : <span id="tday"><?php echo date('m/d/Y h:i:s a', time()); ?></span><br /><br />

    <button type="button" id="sbtButton">Submit</button>

  </body>
</html>