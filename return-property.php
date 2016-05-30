<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$p_name = $_POST['p_name'];
$sql = "UPDATE property SET property_status = 'available' WHERE title = '$p_name';";

$sql2 = "Select property_status from property WHERE title = '$p_name';";
$amount_res = mysqli_query($conn, $sql2);
$result2 = mysqli_fetch_array($amount_res);
$status = $result2['property_status'];

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
            <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Return</td>
            <td class="desc"><?php echo $p_name ?> </td>
            <td class="desc"><?php echo $status ?></td>
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