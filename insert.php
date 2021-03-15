<?php
require_once("Include/DB.php");
if (isset($_POST["Submit"])) {
	if (!empty($_POST["EName"])&&!empty($_POST["SSN"])) {
    $EName= $_POST["EName"];
    $Email = $_POST["Email"];
		$SSN = $_POST["SSN"];
		$Amount = $_POST["Amount"];
	
		 global $ConnectingDB;
		$sql = "INSERT INTO customer(CName,Email,SSN,Amount) VALUES (:cnamE,:emaiL,:ssN,:amounT)";
		$stmt=$ConnectingDB->prepare($sql);
		$stmt->bindValue(':cnamE',$EName);
		$stmt->bindValue(':emaiL',$Email);
		$stmt->bindValue(':ssN',$SSN);
		$stmt->bindValue(':amounT',$Amount);
	
		$Execute= $stmt->execute();
		if($Execute) {
			echo '<span class="Success">Record has been added successfully </span>';
		}


	}else {
		echo '<span class="FieldInfoHeading"> Please atleast add name and social Security Number</span>';
	}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="new.css">
  <title>Add Customer</title>
</head>

<body>
  <header>
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
    
  <div class="pt-5 mt-5">
    <h1>Enter Customer Details </h1>
	<form class="" action="insert.php" method="post">
		<fieldset>
			<span class="fieldInfo">Customer Name:</span>
			<br>
			<input type="text" name="EName">
			<br>
			<span class="fieldInfo">Email</span>
			<br>
			<input type="text" name="Email">
			<br>
			<span class="fieldInfo">Social Security Number:</span>
			<br>
			<input type="text" name="SSN">
			<br>
			<span class="fieldInfo mb-2">Amount:</span>
			<br>
			<input class="pb-2" type="text" name="Amount">
			<br>
			
			<input type="submit"  name="Submit" value="Submit Your Record">
		</fieldset>
	</form>
</div>
</header>
<section>
 
        <footer>
       <p style="left: 50%;">
                Copyright &copy; 2021 by Nihal, All rights reserved
                </p>

        
        </footer>

</section>

      
</body>
</html>