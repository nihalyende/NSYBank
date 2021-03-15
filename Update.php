<?php
require_once("include/DB.php");

$SearchQueryParameter = $_GET["id"];

if (isset($_POST["Submit"])) {
	
		$EName= $_POST["EName"];
        $Email = $_POST["Email"];
		$SSN = $_POST["SSN"];
		$Amount = $_POST["Amount"];
		$ConnectingDB;
		$sql = "UPDATE customer SET CName='$EName', Email='$Email',SSN='$SSN',  Amount='$Amount' WHERE id='$SearchQueryParameter'" ;
		$Execute=$ConnectingDB->query($sql);
		if($Execute) {
			echo '<script>window.open("view.php?id=Record Updated Successfully","_self")</script>';  //Sendimg user back
		}



}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light fixed-top py-4 mb-5" id="main-nav">
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
	<?php
	$ConnectingDB;
	$sql= "SELECT * FROM customer WHERE id='$SearchQueryParameter'" ;
	$stmt= $ConnectingDB->query($sql);
	while ($DataRows = $stmt-> fetch()) {
		$Id = $DataRows["id"] ;
	$EName  = $DataRows["CName"];
	$Email  = $DataRows["Email"];
	$SSN = $DataRows["SSN"];
	$Amount = $DataRows["Amount"];
	}

	?>
<div class="">
	<form class="mt-5 pt-5" action="Update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
		<fieldset>
			<span class="fieldInfo">Employee Name:</span>
			<br>
			<input type="text" name="EName" value="<?php echo $EName;
			?>">
			<br>
			<span class="text">Email:</span>
			<br>
			<input type="text" name="Email" value="<?php echo $Email;
			?>">
			<br>
            <span class="fieldInfo">Social Security Number:</span>
			<br>
			<input type="text" name="SSN"value="<?php echo $SSN;
			?>">
			<br>
			
			<span class="fieldInfo">Amount:</span>
			<br>
			<input type="text" name="Amount"value="<?php echo $Amount;
			?>">
			<br>
			<input type="submit" name="Submit" value="Submit Your Record">
		</fieldset>
	</form>
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