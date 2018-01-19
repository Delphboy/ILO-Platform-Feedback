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
                /* CURRENCY CONVERSION */
                if($colno == 2)// when the wage column is next
                {
                    $currencyType = $data[$rowno][3];//Get the currency [assuming currency is always at pos{3}]
                    $currencyType = $this->convertWage($currencyType); //returns the correct exchange rate
                    $convertedWage = $data[$rowno][$colno] * $currencyType;//  wage * currency = EUO currency
                    $output = $output . '<td>' . $convertedWage . '</td>';
                }
                elseif($colno == 9) /* COUNTRY CLARIFICATION */
                {
                    $countryExp = $data[$rowno][9];
                    $countryExp = $this->clarifyCountry($countryExp);
                    $output = $output . "<td>" . $countryExp . "</td>";
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
    function clarifyCountry($country)
    {
        switch ($country) {
            case "AF": return "Afghanistan"; break;
            case "AX": return "Åland Islands"; break;
            case "AL": return "Albania"; break;
            case "DZ": return "Algeria"; break;
            case "AS": return "American Samoa"; break;
            case "AD": return "Andorra"; break;
            case "AO": return "Angola"; break;
            case "AI": return "Anguilla"; break;
            case "AQ": return "Antarctica"; break;
            case "AG": return "Antigua and Barbuda"; break;
            case "AR": return "Argentina"; break;
            case "AM": return "Armenia"; break;
            case "AW": return "Aruba"; break;
            case "AU": return "Australia"; break;
            case "AT": return "Austria"; break;
            case "AZ": return "Azerbaijan"; break;
            case "BS": return "Bahamas"; break;
            case "BH": return "Bahrain"; break;
            case "BD": return "Bangladesh"; break;
            case "BB": return "Barbados"; break;
            case "BY": return "Belarus"; break;
            case "BE": return "Belgium"; break;
            case "BZ": return "Belize"; break;
            case "BJ": return "Benin"; break;
            case "BM": return "Bermuda"; break;
            case "BT": return "Bhutan"; break;
            case "BO": return "Bolivia, Plurinational State of"; break;
            case "BQ": return "Bonaire, Sint Eustatius and Saba"; break;
            case "BA": return "Bosnia and Herzegovina"; break;
            case "BW": return "Botswana"; break;
            case "BV": return "Bouvet Island"; break;
            case "BR": return "Brazil"; break;
            case "IO": return "British Indian Ocean Territory"; break;
            case "BN": return "Brunei Darussalam"; break;
            case "BG": return "Bulgaria"; break;
            case "BF": return "Burkina Faso"; break;
            case "BI": return "Burundi"; break;
            case "KH": return "Cambodia"; break;
            case "CM": return "Cameroon"; break;
            case "CA": return "Canada"; break;
            case "CV": return "Cape Verde"; break;
            case "KY": return "Cayman Islands"; break;
            case "CF": return "Central African Republic"; break;
            case "TD": return "Chad"; break;
            case "CL": return "Chile"; break;
            case "CN": return "China"; break;
            case "CX": return "Christmas Island"; break;
            case "CC": return "Cocos (Keeling) Islands"; break;
            case "CO": return "Colombia"; break;
            case "KM": return "Comoros"; break;
            case "CG": return "Congo"; break;
            case "CD": return "Congo, the Democratic Republic o"; break;
            case "CK": return "Cook Islands"; break;
            case "CR": return "Costa Rica"; break;
            case "CI": return "Côte d'Ivoire"; break;
            case "HR": return "Croatia"; break;
            case "CU": return "Cuba"; break;
            case "CW": return "Curaçao"; break;
            case "CY": return "Cyprus"; break;
            case "CZ": return "Czech Republic"; break;
            case "DK": return "Denmark"; break;
            case "DJ": return "Djibouti"; break;
            case "DM": return "Dominica"; break;
            case "DO": return "Dominican Republic"; break;
            case "EC": return "Ecuador"; break;
            case "EG": return "Egypt"; break;
            case "SV": return "El Salvador"; break;
            case "GQ": return "Equatorial Guinea"; break;
            case "ER": return "Eritrea"; break;
            case "EE": return "Estonia"; break;
            case "ET": return "Ethiopia"; break;
            case "FK": return "Falkland Islands (Malvinas)"; break;
            case "FO": return "Faroe Islands"; break;
            case "FJ": return "Fiji"; break;
            case "FI": return "Finland"; break;
            case "FR": return "France"; break;
            case "GF": return "French Guiana"; break;
            case "PF": return "French Polynesia"; break;
            case "TF": return "French Southern Territories"; break;
            case "GA": return "Gabon"; break;
            case "GM": return "Gambia"; break;
            case "GE": return "Georgia"; break;
            case "DE": return "Germany"; break;
            case "GH": return "Ghana"; break;
            case "GI": return "Gibraltar"; break;
            case "GR": return "Greece"; break;
            case "GL": return "Greenland"; break;
            case "GD": return "Grenada"; break;
            case "GP": return "Guadeloupe"; break;
            case "GU": return "Guam"; break;
            case "GT": return "Guatemala"; break;
            case "GG": return "Guernsey"; break;
            case "GN": return "Guinea"; break;
            case "GW": return "Guinea-Bissau"; break;
            case "GY": return "Guyana"; break;
            case "HT": return "Haiti"; break;
            case "HM": return "Heard Island and McDonald"; break;
            case "VA": return "Holy See (Vatican City State)"; break;
            case "HN": return "Honduras"; break;
            case "HK": return "Hong Kong"; break;
            case "HU": return "Hungary"; break;
            case "IS": return "Iceland"; break;
            case "IN": return "India"; break;
            case "ID": return "Indonesia"; break;
            case "IR": return "Iran, Islamic Republic of"; break;
            case "IQ": return "Iraq"; break;
            case "IE": return "Ireland"; break;
            case "IM": return "Isle of Man"; break;
            case "IL": return "Israel"; break;
            case "IT": return "Italy"; break;
            case "JM": return "Jamaica"; break;
            case "JP": return "Japan"; break;
            case "JE": return "Jersey"; break;
            case "JO": return "Jordan"; break;
            case "KZ": return "Kazakhstan"; break;
            case "KE": return "Kenya"; break;
            case "KI": return "Kiribati"; break;
            case "KP": return "Korea, Democratic People's"; break;
            case "KR": return "Korea, Republic of"; break;
            case "KW": return "Kuwait"; break;
            case "KG": return "Kyrgyzstan"; break;
            case "LA": return "Lao People's Democratic Republic"; break;
            case "LV": return "Latvia"; break;
            case "LB": return "Lebanon"; break;
            case "LS": return "Lesotho"; break;
            case "LR": return "Liberia"; break;
            case "LY": return "Libya"; break;
            case "LI": return "Liechtenstein"; break;
            case "LT": return "Lithuania"; break;
            case "LU": return "Luxembourg"; break;
            case "MO": return "Macao"; break;
            case "MK": return "Macedonia, the former Yugoslav"; break;
            case "MG": return "Madagascar"; break;
            case "MW": return "Malawi"; break;
            case "MY": return "Malaysia"; break;
            case "MV": return "Maldives"; break;
            case "ML": return "Mali"; break;
            case "MT": return "Malta"; break;
            case "MH": return "Marshall Islands"; break;
            case "MQ": return "Martinique"; break;
            case "MR": return "Mauritania"; break;
            case "MU": return "Mauritius"; break;
            case "YT": return "Mayotte"; break;
            case "MX": return "Mexico"; break;
            case "FM": return "Micronesia, Federated States of"; break;
            case "MD": return "Moldova, Republic of"; break;
            case "MC": return "Monaco"; break;
            case "MN": return "Mongolia"; break;
            case "ME": return "Montenegro"; break;
            case "MS": return "Montserrat"; break;
            case "MA": return "Morocco"; break;
            case "MZ": return "Mozambique"; break;
            case "MM": return "Myanmar"; break;
            case "NA": return "Namibia"; break;
            case "NR": return "Nauru"; break;
            case "NP": return "Nepal"; break;
            case "NL": return "Netherlands"; break;
            case "NC": return "New Caledonia"; break;
            case "NZ": return "New Zealand"; break;
            case "NI": return "Nicaragua"; break;
            case "NE": return "Niger"; break;
            case "NG": return "Nigeria"; break;
            case "NU": return "Niue"; break;
            case "NF": return "Norfolk Island"; break;
            case "MP": return "Northern Mariana Islands"; break;
            case "NO": return "Norway"; break;
            case "OM": return "Oman"; break;
            case "PK": return "Pakistan"; break;
            case "PW": return "Palau"; break;
            case "PS": return "Palestinian Territory, Occupied"; break;
            case "PA": return "Panama"; break;
            case "PG": return "Papua New Guinea"; break;
            case "PY": return "Paraguay"; break;
            case "PE": return "Peru"; break;
            case "PH": return "Philippines"; break;
            case "PN": return "Pitcairn"; break;
            case "PL": return "Poland"; break;
            case "PT": return "Portugal"; break;
            case "PR": return "Puerto Rico"; break;
            case "QA": return "Qatar"; break;
            case "RE": return "Réunion"; break;
            case "RO": return "Romania"; break;
            case "RU": return "Russian Federation"; break;
            case "RW": return "Rwanda"; break;
            case "BL": return "Saint Barthélemy"; break;
            case "SH": return "Saint Helena, Ascension and"; break;
            case "KN": return "Saint Kitts and Nevis"; break;
            case "LC": return "Saint Lucia"; break;
            case "MF": return "Saint Martin (French part)"; break;
            case "PM": return "Saint Pierre and Miquelon"; break;
            case "VC": return "Saint Vincent and the Grenadines"; break;
            case "WS": return "Samoa"; break;
            case "SM": return "San Marino"; break;
            case "ST": return "Sao Tome and Principe"; break;
            case "SA": return "Saudi Arabia"; break;
            case "SN": return "Senegal"; break;
            case "RS": return "Serbia"; break;
            case "SC": return "Seychelles"; break;
            case "SL": return "Sierra Leone"; break;
            case "SG": return "Singapore"; break;
            case "SX": return "Sint Maarten (Dutch part)"; break;
            case "SK": return "Slovakia"; break;
            case "SI": return "Slovenia"; break;
            case "SB": return "Solomon Islands"; break;
            case "SO": return "Somalia"; break;
            case "ZA": return "South Africa"; break;
            case "GS": return "South Georgia and the South"; break;
            case "SS": return "South Sudan"; break;
            case "ES": return "Spain"; break;
            case "LK": return "Sri Lanka"; break;
            case "SD": return "Sudan"; break;
            case "SR": return "Suriname"; break;
            case "SJ": return "Svalbard and Jan Mayen"; break;
            case "SZ": return "Swaziland"; break;
            case "SE": return "Sweden"; break;
            case "CH": return "Switzerland"; break;
            case "SY": return "Syrian Arab Republic"; break;
            case "TW": return "Taiwan, Province of China"; break;
            case "TJ": return "Tajikistan"; break;
            case "TZ": return "Tanzania, United Republic of"; break;
            case "TH": return "Thailand"; break;
            case "TL": return "Timor-Leste"; break;
            case "TG": return "Togo"; break;
            case "TK": return "Tokelau"; break;
            case "TO": return "Tonga"; break;
            case "TT": return "Trinidad and Tobago"; break;
            case "TN": return "Tunisia"; break;
            case "TR": return "Turkey"; break;
            case "TM": return "Turkmenistan"; break;
            case "TC": return "Turks and Caicos Islands"; break;
            case "TV": return "Tuvalu"; break;
            case "UG": return "Uganda"; break;
            case "UA": return "Ukraine"; break;
            case "AE": return "United Arab Emirates"; break;
            case "GB": return "United Kingdom"; break;
            case "US": return "United States"; break;
            case "UM": return "United States Minor Outlying"; break;
            case "UY": return "Uruguay"; break;
            case "UZ": return "Uzbekistan"; break;
            case "VU": return "Vanuatu"; break;
            case "VE": return "Venezuela, Bolivarian Republic"; break;
            case "VN": return "Viet Nam"; break;
            case "VG": return "Virgin Islands, British"; break;
            case "VI": return "Virgin Islands, U.S."; break;
            case "WF": return "Wallis and Futuna"; break;
            case "EH": return "Western Sahara"; break;
            case "YE": return "Yemen"; break;
            case "ZM": return "Zambia"; break;
            case "ZW": return "Zimbabwe"; break;
            default: return "unknown";
        }
    }
    /**/

}