<h4>mySQL DB connection test</h4>



<?php
$sql = $_POST["click"];


$host="den1.mysql3.gear.host";
$dbName="gr2";
$user = "gr2";
$pass = 'gr0up2t357db!';


$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$sqlQuery = $sql; // put your students table name
echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement
echo "<table border='1'>";
while ($row = $statement->fetch()) {
	echo "<tr><td>" . $row[0] ."</td><td>". $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4];}
echo "</table>";
$dbHandle = null;

?>
<form action="/testdb.php" method="post">
<div class = "container">
		<div class = "col-md-6">
			<div class = "register-login">
				<div class = "cool-block">
					<div class = "cool-block-bor">
						<h3><br>Login</h3>
						<form class = "form-horizontal" role = "form">
							<div class = "form-group">
								<label for = "inputEmail1" class = "col-lg-2 control-label">Email</label>
								<div class = "col-lg-10">
									<input type = "text" class = "form-control" id = "inputEmail1" required maxlength="50" minlength="2" placeholder = "Email">
								</div>
							</div>
							<div class = "form-group">
								<label for = "inputPassword1" class = "col-lg-2 control-label">Password</label>
								<div class = "col-lg-10">
									<input type = "password" class = "form-control" id = "inputPassword1" required maxlength="55" minlength="10" placeholder = "Password">
								</div>
							</div>
							<div class = "form-group">
								<div class = "col-lg-offset-2 col-lg-10">
									<div class = "checkbox"><label><input type = "checkbox"> Remember me</label></div>
								</div>
							</div>
							<div class = "form-group">
								<div class = "col-lg-offset-2 col-lg-10">
									<button name="click" type = "submit" class = "btn btn-info">Sign in</button><button type = "reset" class = "btn btn-default">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


				<form action="/testdb.php" method="post">
					<select name="click">
						
						<option value='select * from gr2.user where isAdministrator = 1'>get admin</option>
						<option value='select * from gr2.review'>select * from gr2.review</option>
						<option value='select * from gr2.review where hours_spent_working > 10'>select * from gr2.review where hours_spent_working > 10</option>
						<option value='Helicopter'>Helicopter</option>
						<option value='Motor_Bike'>Motor Bike</option>
						<option value='Bike'>Bike</option>
						<option value='Bus'>Bus</option>
						<option value='Lorry'>Lorry</option>
						<option value='Car'>Car</option>
					</select>
					<input type="submit" value="Quick Search">
				</form>
			