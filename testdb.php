<h4>mySQL DB connection test</h4>

<?php

$host="helios.csesalford.com";
$dbName="sgb039";
$user = "sgb039";
$pass = 'Pa55bub135';

$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$sqlQuery = 'SELECT * FROM sgb039.Customer'; // put your students table name
echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement
echo "<table border='1'>";
while ($row = $statement->fetch()) {
	echo "<tr><td>" . $row[0] ."</td><td>". $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3];}
echo "</table>";
$dbHandle = null;