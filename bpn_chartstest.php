<?php

require ('Models/database.php');
/*
Script  : PHP-PDO-JSON-mysql-googlechart
Author  : Enam Hossain
version : 1.0

*/

/*
--------------------------------------------------------------------
Usage:
--------------------------------------------------------------------

Requirements: PHP, Apache and MySQL

Installation:

  --- Create a database by using phpMyAdmin and name it "chart"
  --- Create a table by using phpMyAdmin and name it "googlechart" and make sure table has only two columns as I have used two columns. However, you can use more than 2 columns if you like but you have to change the code a little bit for that
  --- Specify column names as follows: "weekly_task" and "percentage"
  --- Insert some data into the table
  --- For the percentage column only use a number

      ---------------------------------
      example data: Table (googlechart)
      ---------------------------------

      weekly_task     percentage
      -----------     ----------

      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20


*/

/* Establish the database connection */
$conn = database::Instance();

try {
    /* select all the weekly tasks from the table googlechart */
    $conn->query('SELECT platform, AVG(wage) FROM review GROUP BY platform');
    $result = $conn->resultset();

    echo 'Attempt to create arrays';

    $rows = array();
    $table = array();
    $table['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /*
            note that one column is in "string" format and another one is in "number" format
            as pie chart only required "numbers" for calculating percentage
            and string will be used for Slice title
        */


        array('label' => 'platform', 'type' => 'string'),
        array('label' => 'avg wage', 'type' => 'number')


    );
    /* Extract the information from $result */
    foreach($result as $r) {

        $temp = array();
        //print_r($r);
        print_r($r['platform']);
        echo '<br>';
        print_r($r['AVG(wage)']);

        // the following line will be used to slice the Pie chart

        // Values of each slice
        $temp[] = array('v' => (string) $r['platform']);
        $plat = (string)$r['platform'];
        $temp[] = array('v' => (real) $r['AVG(wage)']);
        $wage = (real)$r['AVG(wage)'];
        echo "<p> $wage</p>";

        $rows[] = array('c' => $temp);
    }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    echo 'cannot do what you asked';
}

?>


<html>
<head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/filters.js"></script>
</head>

<body>
<!--this is the div that will hold the pie chart-->

<div id="chart_div">
    <script type="text/javascript">drawbarchart(<?php echo $jsonTable; ?>);</script>
</div>
</body>
</html>