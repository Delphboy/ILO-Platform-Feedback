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

        $this->AMTAvg = $this->calculatePlatformAverage('AMT');
        $this->ClickWorkerAvg = $this->calculatePlatformAverage('ClickWorker');
        $this->CraigslistAvg = $this->calculatePlatformAverage('Craigslist');
        $this->CrowdSourceAvg = $this->calculatePlatformAverage('CrowdSource');
        $this->ElanceAvg = $this->calculatePlatformAverage('Elance');
        $this->FiverrAvg = $this->calculatePlatformAverage('Fiverr');
        $this->FreelancerAvg = $this->calculatePlatformAverage('Freelancer');
        $this->GetACoderAvg = $this->calculatePlatformAverage('GetACoder');
        $this->GuruAvg = $this->calculatePlatformAverage('Guru');
        $this->PeopleperhourAvg = $this->calculatePlatformAverage('Peopleperhour');
        $this->Project4hireAvg = $this->calculatePlatformAverage('Project4hire');
        $this->ToptalAvg = $this->calculatePlatformAverage('Toptal');
        $this->UpworkAvg = $this->calculatePlatformAverage('Upwork');
        $this->iFreelanceAvg = $this->calculatePlatformAverage('iFreelance');
    }

    /**
     * Take the output of an SQL query and turn it into a table body (<tr> and <td>)
     * @param $data
     * @return string - HTML string to go between <table></table> tags
     */
    function generateTableBody($data)
    {
//        $this->ILODatabase->query($statement);
//        $data = $this->ILODatabase->resultSet();
        $rowCount = sizeof($data); //No of rows

        $output = "";

        // Remove undefined offest error
        if($data == null)
            $colCount = 16;
        else
            $colCount = sizeof($data[0]);

        for($rowNum = 0; $rowNum < $rowCount; $rowNum++)
        {
            $flag = $this->isExtreme($data[$rowNum]);
            if($flag)
                $output = $output . '<tr style="color: red">';
            else
                $output = $output . '<tr>';
            for($colNum = 0; $colNum < ($colCount/2); $colNum++)
            {
                $output = $output . '<td>' . $data[$rowNum][$colNum] . '</td>';
            }
            $output = $output . '</tr>';
        }

        return $output;
    }

    /**
     * Search for all the tuples belonging to a specified platform
     * Then calculate and return the average
     * @param $platform
     * @return average of the platform
     */
    function calculatePlatformAverage($platform)
    {
        $dbConnection = database::Instance();
        $query = "SELECT platform, (AVG(wage) + AVG(hours_spent_looking) + AVG(hours_spent_working) + AVG(rating_pay)+
                  AVG(rating_conditions) + AVG(rating_description) + AVG(rating)) / (SELECT(COUNT(platform))) FROM gr2.review WHERE platform=:plat;";
        $dbConnection->query($query);
        $dbConnection->bind(':plat', $platform);
        $dbConnection->execute();
        $row = $dbConnection->resultSet();
        $average = $row[0][1];
        return $average;
    }

    /**
     * Calculate the average of the current tuple
     * @param $tuple
     * @return array
     */
    function calculateTupleAverage($tuple)
    {
        $average = ($tuple[2] + $tuple[4] + $tuple[5] + $tuple[8] + $tuple[10]
                + $tuple[11] + $tuple[12]) / 7;
        return $average;
    }

    /**
     * Calculate whether or not a tuple is in the extremes of the data for it's
     * respective platform
     * @param $tuple
     * @return bool
     */
    function isExtreme($tuple)
    {
        $platform = $tuple[1];
        $tupleAvg = $this->calculateTupleAverage($tuple);
        switch($platform)
        {
            case 'AMT':
                $platformAvg = $this->AMTAvg;
                break;
            case 'ClickWorker':
                $platformAvg = $this->ClickWorkerAvg;
                break;
            case 'Craigslist':
                $platformAvg = $this->CraigslistAvg;
                break;
            case 'CrowdSource':
                $platformAvg = $this->CrowdSourceAvg;
                break;
            case 'Elance':
                $platformAvg = $this->ElanceAvg;
                break;
            case 'Fiverr':
                $platformAvg = $this->FiverrAvg;
                break;
            case 'Freelancer':
                $platformAvg = $this->FreelancerAvg;
                break;
            case 'GetACoder':
                $platformAvg = $this->GetACoderAvg;
                break;
            case 'Guru':
                $platformAvg = $this->GuruAvg;
                break;
            case 'Peopleperhour':
                $platformAvg = $this->PeopleperhourAvg;
                break;
            case 'Project4hire':
                $platformAvg = $this->Project4hireAvg;
                break;
            case 'Toptal':
                $platformAvg = $this->ToptalAvg;
                break;
            case 'Upwork':
                $platformAvg = $this->UpworkAvg;
                break;
            case 'iFreelance':
                $platformAvg = $this->iFreelanceAvg;
                break;
            default:
                $platformAvg = $this->AMTAvg;
                break;
        }
        $avgWidth = $platformAvg * 2;
        $percentile = ($avgWidth / 100) * 5;
        return ($tupleAvg < ($percentile)
            || $tupleAvg > ($avgWidth - $percentile));
    }
}