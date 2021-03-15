<?php
require_once("Include/DB.php");
?>
<!DOCTYPE>
<html>
	<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
		<title>Transaction History</title>
		<link rel="stylesheet" href="new.css">
		<style media="screen">
		fieldset{
				background-image: url("Include/images/ems1.jpg");
				background-repeat: repeat-x;
		}
		body{
				background-image: url("Include/images/2.jpg");
				background-repeat: repeat;
		}
		</style>
	</head>
	<body>

    <nav class="navbar navbar-expand-md navbar-light fixed-top pb-5 mb-5" id="main-nav">
    <div class="container">
      <a href="index.html" class="navbar-brand">
        <img src="logo.jpg" width="50" height="50" alt="">
        <h3 class="d-inline align-middle">NSY Bank</h3>
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="transact.php" class="nav-link">Transact</a>
          </li>
          <li class="nav-item">
            <a href="history.php" class="nav-link">View Transactions</a>
          </li>
          <li class="nav-item">
            <a href="view.php" class="nav-link">View Customers</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
	
	
	
	<div class="mt-5 pt-5" >
		<table  width="700" border="5" align="center" style="left:20px">
			<caption>Transaction History</caption>
			<tr>
                <th>From Customer</th>
				<th>To Customer</th>
				<th>Amount</th>
			</tr>


<?php
 global $ConnectingDB;
 $sql ="SELECT * FROM  history";
 $stmt = $ConnectingDB->query($sql);
 while ($DataRows=$stmt->fetch()) {
    $EName1         = $DataRows["customer1"];
	$EName2      = $DataRows["customer2"];
	$Amount       = $DataRows["amount"];
 ?>
 <tr>

	<td><?php echo $EName1; ?></td>
	<td><?php echo $EName2; ?></td>
	<td><?php echo $Amount; ?></td>

 </tr>
 <?php } ?>
</table>
</div>
<section>
 
        <footer>
       <p style="left: 50%;">
                Copyright &copy; 2021 by Nihal, All rights reserved
                </p>

        
        </footer>

</section>


	</body>
</html>