<?php
require_once("Include/DB.php");
if (isset($_POST["Submit"])) {
	if (!empty($_POST["Name1"])&&!empty($_POST["Name2"])&&!empty($_POST["Amount"])) {
    $EName1 = $_POST["Name1"];
    $EName2 = $_POST["Name2"];
		$Amount = $_POST["Amount"];

        $ConnectingDB;
        $sql = "SELECT Amount FROM customer WHERE CName='$EName2'";
        $stmt= $ConnectingDB->query($sql);
        while ($DataRows = $stmt-> fetch()) {
            $Amount2 = $DataRows["Amount"] ;
        }
        $final1 = $Amount2 + $Amount;
    
        $sql = "UPDATE customer SET  Amount='$final1 ' WHERE CName='$EName2'";
        $Execute=$ConnectingDB->query($sql);

    $ConnectingDB;
	$sql= "SELECT Amount FROM customer WHERE CName='$EName1'" ;
	$stmt= $ConnectingDB->query($sql);
	while ($DataRows = $stmt-> fetch()) {
		$Amount1 = $DataRows["Amount"] ;
    }
	$final = $Amount1 - $Amount;
	
		 
		$sql = "UPDATE customer SET  Amount='$final' WHERE CName='$EName1'";
        $Execute=$ConnectingDB->query($sql);

        global $ConnectingDB;
		$sql = "INSERT INTO history(customer1,customer2,Amount) VALUES (:cnamE,:emaiL,:amounT)";
		$stmt=$ConnectingDB->prepare($sql);
		$stmt->bindValue(':cnamE',$EName1);
		$stmt->bindValue(':emaiL',$EName2);
		$stmt->bindValue(':amounT',$Amount);
	
		$Execute= $stmt->execute();

        
		if($Execute) {
			echo '<span class="Success">Transaction Successful </span>';
		} else {
            echo '<span class="Fail">Something went wrong </spam>';
        }

    }
    else {
        echo '<span class="FieldInfoHeading"> Please fill all the details</span>';
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
  <title>Transaction</title>
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
    
  </header>



  <div class="pt-5 mt-5">
    <h1>Enter Customer Details </h1>
	<form class="" action="transact.php" method="post">
		<fieldset>
        <span class="fieldInfo"> Select From</span>
               <select class="form-control"   name="Name1">
                 <?php
                 //Fetchinng all the categories from category table
                 global $ConnectingDB;
                 $sql = "SELECT id,CName FROM customer";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $Id = $DataRows["id"];
                   $Name = $DataRows["CName"];
                  ?>
                  <option> <?php echo $Name; ?></option>
                  <?php } ?>
               </select>

            <br>
            <span class="fieldInfo"> Select To </span>
               <select class="form-control"   name="Name2">
                 <?php
                 //Fetchinng all the categories from category table
                 global $ConnectingDB;
                 $sql = "SELECT id,CName FROM customer";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $Id = $DataRows["id"];
                   $Name1 = $DataRows["CName"];
                  ?>
                  <option> <?php echo $Name1; ?></option>
                  <?php } ?>
               </select>

            <br>
            <span class="fieldInfo">Enter Amount</span>
            <input type="text" name="Amount">
			<br>

			
			<input type="submit"  name="Submit" value="Transact">
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