<?php

/**
 * Created by PhpStorm.
 * User: stc765
 * Date: 1/16/18
 * Time: 4:19 PM
 */
require_once ('Graph.php');
require_once ('database.php');
class Admin
{
    private $ILODatabase;

    /**
     * Admin constructor.
     * Create a connection to the database
     */
    function __construct()
    {
        $this->ILODatabase = database::Instance();
    }

    function createTable($statement)
    {
        $this->ILODatabase->query($statement);
        $data = $this->ILODatabase->resultSet();
        $rowCount = sizeof($data); //No of rows

        $output = "";
        $output = $output . '<table id="myTable" border="1" class="table table-striped col-md-5 col-xs-12">';

        $colcount = count($data[0]);
        for($rowno = 0; $rowno < $rowCount; $rowno++) //Go through the rows incrementally
        {
//            $row = $data[$rowno];
//            print_r($row);
//            //echo "<br>";
//            $colcount = count($row);

            $output = $output . '<tr>';

            //hardcoded for the moment as $colcount doubles the size of the array
            for($colno = 0; $colno < ($colcount/2); $colno++) //Go through the columns left to right, incrementally
            {
                /**/
                if($colno == 2)// when the wage column is next
                {
                    $currencyType = $data[$rowno][3];//Get the currency [assuming currency is always at pos{3}]
                    $currencyType = $this->convertWage($currencyType); //returns the correct exchange rate
                    $convertedWage = $data[$rowno][$colno] * $currencyType;//  wage * currency = EUO currency
                    $output = $output . '<td>' . $convertedWage . '</td>';
                }
                else /**/
                    $output = $output . '<td>' . $data[$rowno][$colno] . '</td>';
            }
            $output = $output . '</tr>';
        }
        $output = $output . '</table>';

        return $output;
    }
    /**/
    function convertWage($currencyType)
    {
        switch ($currencyType) {
            case "EUO": return 1; break;
            case "AUD": return 1.5311; break;
            case "BGN": return 1.9558; break;
            case "BRL": return 3.9321; break;
            case "CAD": return 1.5229; break;
            case "CHF": return 1.1748; break;
            case "CNY": return 7.8582; break;
            case "CZK": return 25.365; break;
            case "DKK": return 7.4475; break;
            case "GBP": return 0.8820; break;
            case "HKD": return 9.5648; break;
            case "HRK": return 7.4409; break;
            case "HUF": return 308.51; break;
            case "IDR": return 16325; break;
            case "ILS": return 4.195; break;
            case "INR": return 78.121; break;
            case "JPY": return 136.07; break;
            case "KRW": return 1306.6; break;
            case "MXN": return 22.817; break;
            case "MYR": return 4.8396; break;
            case "NOK": return 9.6013; break;
            case "NZD": return 1.6759; break;
            case "PHP": return 62.068; break;
            case "PLN": return 4.1665; break;
            case "RON": return 4.648; break;
            case "RUB": return 69.213; break;
            case "SEK": return 9.8305; break;
            case "SGD": return 1.6175; break;
            case "THB": return 39.054; break;
            case "TRY": return 4.6374; break;
            case "USD": return 1.2235; break;
            case "YEN": return 135.47; break;
            case "ZAR": return 15.004; break;
            default: return 1;
        }
    }
    /**/

}