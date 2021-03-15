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
		<title>Customers</title>
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
		<h2 class="success">  </h2>
		<div>
			<fieldset>
				<form class="pt-5 mt-5" action="view.php" method="GET">
					<input type="text" name="Search" value="" placeholder="Search by name / ssn"><br><br>
					<input type="submit" name="SearchButton" value="Search record">
				</form>
			</fieldset>
		</div>
		<?php
		if (isset($_GET["SearchButton"])) {
			global $ConnectingDB;
			$Search = $_GET["Search"];
			$sql = "SELECT * FROM customer WHERE CName=:searcH OR SSN=:searcH";
			$stmt=$ConnectingDB->prepare($sql);
			$stmt->bindValue(':searcH',$Search);
			$stmt->execute();
			while ($DataRows = $stmt->fetch()) {
                $Id            = $DataRows["id"];
				$EName         = $DataRows["CName"];
				$Email          = $DataRows["Email"];
                $SSN           = $DataRows["SSN"];
				$Amount    = $DataRows["Amount"];
				?>
				<div>


				<table  width="1000" border="5" align="center">
					<caption>Search Result</caption>
					<tr>
                        <th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>SSN</th>
						<th>Amount</th>
					</tr>
					<tr>
                    <td><?php echo $Id; ?></td>
						<td><?php echo $EName; ?></td>
						<td><?php echo $Email; ?></td>
						<td><?php echo $SSN; ?></td>
						<td><?php echo $Amount; ?></td>
						<td> <a href="View.php">Search Again</a> </td>
					</tr>
				</table>
				</div>

		<?php	} //Ending of While Loop
		}//Ending of Submit button

		?>
		<table class="pt-5 mt-5" width="1000" border="5" align="center">
			<caption>View From Database</caption>
			<tr>
                <th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>SSN</th>
				<th>Amount</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>


<?php
 global $ConnectingDB;
 $sql ="SELECT * FROM customer";
 $stmt = $ConnectingDB->query($sql);
 while ($DataRows=$stmt->fetch()) {
    $Id          = $DataRows["id"];
	$EName       = $DataRows["CName"];
	$Email        = $DataRows["Email"];
	$SSN  = $DataRows["SSN"];
	$Amount     = $DataRows["Amount"];
 ?>
 <tr>
 <td><?php echo $Id; ?></td>
	<td><?php echo $EName; ?></td>
	<td><?php echo $Email; ?></td>
	<td><?php echo $SSN; ?></td>
	<td><?php echo $Amount; ?></td>
	<td class="EditButton"> <a href="Update.php?id=<?php echo $Id; ?>">Update</a> </td>
	<td class="DeleteButton"> <a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
 </tr>
 <?php } ?>
</table>
<div>

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