<h4>mySQL DB connection test</h4>

<?php
$sql = $_POST["click"];

$host="den1.mysql3.gear.host";
$dbName="gr2";
$user = "gr2";
$pass = 'gr0up2t357db!';

//$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$sqlQuery = $sql; // put your students table name
echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement
echo "<table border='1'>";
while ($row = $statement->fetch()) {
	echo "<tr><td>" . $row[0] ."</td><td>". $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "<td><td>" . $row[4] ."</td><td>". $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] ."</td><td>". $row[8]."</td><td>". $row[9];}
echo "</table>";
$dbHandle = null;

$dbHandle = null;

?>
<form action="/sql.php" method="post">
	<select name="click">
        <option value='select * from gr2.user'>select all users</option>
        <option value='select * from gr2.user where isAdministrator = 1'>get all admin</option>
        <option value='select * from gr2.user where isAdministrator = 0'>get all non admin</option>
        <option value='select * from gr2.review'>select all reviews</option>

	</select>
	<input type="submit" value="Quick Search">
</form>