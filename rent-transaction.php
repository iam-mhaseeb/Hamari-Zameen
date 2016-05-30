<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$p_name = $_POST['p_name'];
$s_days = $_POST['start_days'];
$e_days = $_POST['end_days'];
$sql = "Select propertyNo from property where title = '$p_name';";

$p_id = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($p_id);
$id = $result['propertyNo'];

$sql2 = "Select Price from property WHERE title = '$p_name';";
$amount_res = mysqli_query($conn, $sql2);
$result2 = mysqli_fetch_array($amount_res);
$price = $result2['Price'];

$user = $_SESSION['user'];
$sql3 = "INSERT INTO transactions(property_num, client_id, owner_id, start_date, end_date, amount) VALUES('$id', 1, 1,'$s_days','$e_days', '$price');";
if (!$sql3) {
    die('Invalid query: ' . mysql_error());
}
$sql4 = "UPDATE property SET property_status = 'on rent' WHERE propertyNo = '$id';";
mysqli_query($conn, $sql3);

mysqli_query($conn, $sql4);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Receipt</title>
    <link rel="stylesheet" href="css\receipt-style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
      </div>
      <h1>Hamari Zameen Reciept</h1>
      <div id="company" class="clearfix">
        <div>Hamari Zameen Rental</div>
        <div>592 Khayaban-e-Jinnah, Lahore,<br /> LHR 54000, PK</div>
        <div>(+92) 331-4481202</div>
        <div><a href="contact@hamarizameen.com">contact@hamarizameen.com</a></div>
      </div>
   
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">TYPE</th>
            <th class="desc">DESCRIPTION</th>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Rent</td>
            <td class="desc"><?php echo $p_name ?></td>
            <td class="qty"><?php echo $s_days ?></td>
            <td class="qty"><?php echo $e_days ?></td>
            <td class="unit">Rs.<?php echo $price ?> </td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A 13% GST is applicable to all/any service provided by the company.</div>
      </div>
    </main>
	<br><br>
	<center>
	<a href = "index.php"><input type = "button" value = "GO HOME"></a>
	<a href = "logout.php"><input type = "button" value = "LOGOUT"></a>
	</center>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>