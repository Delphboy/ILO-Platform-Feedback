<?php
/**
 * Created by PhpStorm.
 * User: sagiu
 * Date: 16/01/2018
 * Time: 11:34
 */
// recieve request
$sql = $_POST["click"];
//$sql = $_POST["country"];

//Data Base Connect to be removed when proved working

$host="den1.mysql3.gear.host";
$dbName="gr2";
$user = "gr2";
$pass = 'gr0up2t357db!';

//$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$sqlQuery = $sql; // put your students table name
//echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement
?>
<!--Table-->

<form action="/tests/testFilter.php" method="post">
	<label> <select name="click" class="searchOp">
				<option value="select * from gr2.review where country like 'AF';">Afghanistan</option>
				<option value="select * from gr2.review where country like 'AX';">Åland Islands</option>
				<option value="select * from gr2.review where country like 'AL';">Albania</option>
				<option value="select * from gr2.review where country like 'DZ';">Algeria</option>
				<option value="select * from gr2.review where country like 'AS';">American Samoa</option>
				<option value="select * from gr2.review where country like 'AD';">Andorra</option>
				<option value="select * from gr2.review where country like 'AO';">Angola</option>
				<option value="select * from gr2.review where country like 'AI';">Anguilla</option>
				<option value="select * from gr2.review where country like 'AQ';">Antarctica</option>
				<option value="select * from gr2.review where country like 'AG';">Antigua and Barbuda</option>
				<option value="select * from gr2.review where country like 'AR';">Argentina</option>
				<option value="select * from gr2.review where country like 'AM';">Armenia</option>
				<option value="select * from gr2.review where country like 'AW';">Aruba</option>
				<option value="select * from gr2.review where country like 'AU';">Australia</option>
				<option value="select * from gr2.review where country like 'AT';">Austria</option>
				<option value="select * from gr2.review where country like 'AZ';">Azerbaijan</option>
				<option value="select * from gr2.review where country like 'BS';">Bahamas</option>
				<option value="select * from gr2.review where country like 'BH';">Bahrain</option>
				<option value="select * from gr2.review where country like 'BD';">Bangladesh</option>
				<option value="select * from gr2.review where country like 'BB';">Barbados</option>
				<option value="select * from gr2.review where country like 'BY';">Belarus</option>
				<option value="select * from gr2.review where country like 'BE';">Belgium</option>
				<option value="select * from gr2.review where country like 'BZ';">Belize</option>
				<option value="select * from gr2.review where country like 'BJ';">Benin</option>
				<option value="select * from gr2.review where country like 'BM';">Bermuda</option>
				<option value="select * from gr2.review where country like 'BT';">Bhutan</option>
				<option value="select * from gr2.review where country like 'BO';">Bolivia, Plurinational State of</option>
				<option value="select * from gr2.review where country like 'BQ';">Bonaire, Sint Eustatius and Saba</option>
				<option value="select * from gr2.review where country like 'BA';">Bosnia and Herzegovina</option>
				<option value="select * from gr2.review where country like 'BW';">Botswana</option>
				<option value="select * from gr2.review where country like 'BV';">Bouvet Island</option>
				<option value="select * from gr2.review where country like 'BR';">Brazil</option>
				<option value="select * from gr2.review where country like 'IO';">British Indian Ocean Territory</option>
				<option value="select * from gr2.review where country like 'BN';">Brunei Darussalam</option>
				<option value="select * from gr2.review where country like 'BG';">Bulgaria</option>
				<option value="select * from gr2.review where country like 'BF';">Burkina Faso</option>
				<option value="select * from gr2.review where country like 'BI';">Burundi</option>
				<option value="select * from gr2.review where country like 'KH';">Cambodia</option>
				<option value="select * from gr2.review where country like 'CM';">Cameroon</option>
				<option value="select * from gr2.review where country like 'CA';">Canada</option>
				<option value="select * from gr2.review where country like 'CV';">Cape Verde</option>
				<option value="select * from gr2.review where country like 'KY';">Cayman Islands</option>
				<option value="select * from gr2.review where country like 'CF';">Central African Republic</option>
				<option value="select * from gr2.review where country like 'TD';">Chad</option>
				<option value="select * from gr2.review where country like 'CL';">Chile</option>
				<option value="select * from gr2.review where country like 'CN';">China</option>
				<option value="select * from gr2.review where country like 'CX';">Christmas Island</option>
				<option value="select * from gr2.review where country like 'CC';">Cocos (Keeling) Islands</option>
				<option value="select * from gr2.review where country like 'CO';">Colombia</option>
				<option value="select * from gr2.review where country like 'KM';">Comoros</option>
				<option value="select * from gr2.review where country like 'CG';">Congo</option>
				<option value="select * from gr2.review where country like 'CD';">Congo, the Democratic Republic of the</option>
				<option value="select * from gr2.review where country like 'CK';">Cook Islands</option>
				<option value="select * from gr2.review where country like 'CR';">Costa Rica</option>
				<option value="select * from gr2.review where country like 'CI';">Côte d'Ivoire</option>
				<option value="select * from gr2.review where country like 'HR';">Croatia</option>
				<option value="select * from gr2.review where country like 'CU';">Cuba</option>
				<option value="select * from gr2.review where country like 'CW';">Curaçao</option>
				<option value="select * from gr2.review where country like 'CY';">Cyprus</option>
				<option value="select * from gr2.review where country like 'CZ';">Czech Republic</option>
				<option value="select * from gr2.review where country like 'DK';">Denmark</option>
				<option value="select * from gr2.review where country like 'DJ';">Djibouti</option>
				<option value="select * from gr2.review where country like 'DM';">Dominica</option>
				<option value="select * from gr2.review where country like 'DO';">Dominican Republic</option>
				<option value="select * from gr2.review where country like 'EC';">Ecuador</option>
				<option value="select * from gr2.review where country like 'EG';">Egypt</option>
				<option value="select * from gr2.review where country like 'SV';">El Salvador</option>
				<option value="select * from gr2.review where country like 'GQ';">Equatorial Guinea</option>
				<option value="select * from gr2.review where country like 'ER';">Eritrea</option>
				<option value="select * from gr2.review where country like 'EE';">Estonia</option>
				<option value="select * from gr2.review where country like 'ET';">Ethiopia</option>
				<option value="select * from gr2.review where country like 'FK';">Falkland Islands (Malvinas)</option>
				<option value="select * from gr2.review where country like 'FO';">Faroe Islands</option>
				<option value="select * from gr2.review where country like 'FJ';">Fiji</option>
				<option value="select * from gr2.review where country like 'FI';">Finland</option>
				<option value="select * from gr2.review where country like 'FR';">France</option>
				<option value="select * from gr2.review where country like 'GF';">French Guiana</option>
				<option value="select * from gr2.review where country like 'PF';">French Polynesia</option>
				<option value="select * from gr2.review where country like 'TF';">French Southern Territories</option>
				<option value="select * from gr2.review where country like 'GA';">Gabon</option>
				<option value="select * from gr2.review where country like 'GM';">Gambia</option>
				<option value="select * from gr2.review where country like 'GE';">Georgia</option>
				<option value="select * from gr2.review where country like 'DE';">Germany</option>
				<option value="select * from gr2.review where country like 'GH';">Ghana</option>
				<option value="select * from gr2.review where country like 'GI';">Gibraltar</option>
				<option value="select * from gr2.review where country like 'GR';">Greece</option>
				<option value="select * from gr2.review where country like 'GL';">Greenland</option>
				<option value="select * from gr2.review where country like 'GD';">Grenada</option>
				<option value="select * from gr2.review where country like 'GP';">Guadeloupe</option>
				<option value="select * from gr2.review where country like 'GU';">Guam</option>
				<option value="select * from gr2.review where country like 'GT';">Guatemala</option>
				<option value="select * from gr2.review where country like 'GG';">Guernsey</option>
				<option value="select * from gr2.review where country like 'GN';">Guinea</option>
				<option value="select * from gr2.review where country like 'GW';">Guinea-Bissau</option>
				<option value="select * from gr2.review where country like 'GY';">Guyana</option>
				<option value="select * from gr2.review where country like 'HT';">Haiti</option>
				<option value="select * from gr2.review where country like 'HM';">Heard Island and McDonald Islands</option>
				<option value="select * from gr2.review where country like 'VA';">Holy See (Vatican City State)</option>
				<option value="select * from gr2.review where country like 'HN';">Honduras</option>
				<option value="select * from gr2.review where country like 'HK';">Hong Kong</option>
				<option value="select * from gr2.review where country like 'HU';">Hungary</option>
				<option value="select * from gr2.review where country like 'IS';">Iceland</option>
				<option value="select * from gr2.review where country like 'IN';">India</option>
				<option value="select * from gr2.review where country like 'ID';">Indonesia</option>
				<option value="select * from gr2.review where country like 'IR';">Iran, Islamic Republic of</option>
				<option value="select * from gr2.review where country like 'IQ';">Iraq</option>
				<option value="select * from gr2.review where country like 'IE';">Ireland</option>
				<option value="select * from gr2.review where country like 'IM';">Isle of Man</option>
				<option value="select * from gr2.review where country like 'IL';">Israel</option>
				<option value="select * from gr2.review where country like 'IT';">Italy</option>
				<option value="select * from gr2.review where country like 'JM';">Jamaica</option>
				<option value="select * from gr2.review where country like 'JP';">Japan</option>
				<option value="select * from gr2.review where country like 'JE';">Jersey</option>
				<option value="select * from gr2.review where country like 'JO';">Jordan</option>
				<option value="select * from gr2.review where country like 'KZ';">Kazakhstan</option>
				<option value="select * from gr2.review where country like 'KE';">Kenya</option>
				<option value="select * from gr2.review where country like 'KI';">Kiribati</option>
				<option value="select * from gr2.review where country like 'KP';">Korea, Democratic People's Republic of</option>
				<option value="select * from gr2.review where country like 'KR';">Korea, Republic of</option>
				<option value="select * from gr2.review where country like 'KW';">Kuwait</option>
				<option value="select * from gr2.review where country like 'KG';">Kyrgyzstan</option>
				<option value="select * from gr2.review where country like 'LA';">Lao People's Democratic Republic</option>
				<option value="select * from gr2.review where country like 'LV';">Latvia</option>
				<option value="select * from gr2.review where country like 'LB';">Lebanon</option>
				<option value="select * from gr2.review where country like 'LS';">Lesotho</option>
				<option value="select * from gr2.review where country like 'LR';">Liberia</option>
				<option value="select * from gr2.review where country like 'LY';">Libya</option>
				<option value="select * from gr2.review where country like 'LI';">Liechtenstein</option>
				<option value="select * from gr2.review where country like 'LT';">Lithuania</option>
				<option value="select * from gr2.review where country like 'LU';">Luxembourg</option>
				<option value="select * from gr2.review where country like 'MO';">Macao</option>
				<option value="select * from gr2.review where country like 'MK';">Macedonia, the former Yugoslav Republic of</option>
				<option value="select * from gr2.review where country like 'MG';">Madagascar</option>
				<option value="select * from gr2.review where country like 'MW';">Malawi</option>
				<option value="select * from gr2.review where country like 'MY';">Malaysia</option>
				<option value="select * from gr2.review where country like 'MV';">Maldives</option>
				<option value="select * from gr2.review where country like 'ML';">Mali</option>
				<option value="select * from gr2.review where country like 'MT';">Malta</option>
				<option value="select * from gr2.review where country like 'MH';">Marshall Islands</option>
				<option value="select * from gr2.review where country like 'MQ';">Martinique</option>
				<option value="select * from gr2.review where country like 'MR';">Mauritania</option>
				<option value="select * from gr2.review where country like 'MU';">Mauritius</option>
				<option value="select * from gr2.review where country like 'YT';">Mayotte</option>
				<option value="select * from gr2.review where country like 'MX';">Mexico</option>
				<option value="select * from gr2.review where country like 'FM';">Micronesia, Federated States of</option>
				<option value="select * from gr2.review where country like 'MD';">Moldova, Republic of</option>
				<option value="select * from gr2.review where country like 'MC';">Monaco</option>
				<option value="select * from gr2.review where country like 'MN';">Mongolia</option>
				<option value="select * from gr2.review where country like 'ME';">Montenegro</option>
				<option value="select * from gr2.review where country like 'MS';">Montserrat</option>
				<option value="select * from gr2.review where country like 'MA';">Morocco</option>
				<option value="select * from gr2.review where country like 'MZ';">Mozambique</option>
				<option value="select * from gr2.review where country like 'MM';">Myanmar</option>
				<option value="select * from gr2.review where country like 'NA';">Namibia</option>
				<option value="select * from gr2.review where country like 'NR';">Nauru</option>
				<option value="select * from gr2.review where country like 'NP';">Nepal</option>
				<option value="select * from gr2.review where country like 'NL';">Netherlands</option>
				<option value="select * from gr2.review where country like 'NC';">New Caledonia</option>
				<option value="select * from gr2.review where country like 'NZ';">New Zealand</option>
				<option value="select * from gr2.review where country like 'NI';">Nicaragua</option>
				<option value="select * from gr2.review where country like 'NE';">Niger</option>
				<option value="select * from gr2.review where country like 'NG';">Nigeria</option>
				<option value="select * from gr2.review where country like 'NU';">Niue</option>
				<option value="select * from gr2.review where country like 'NF';">Norfolk Island</option>
				<option value="select * from gr2.review where country like 'MP';">Northern Mariana Islands</option>
				<option value="select * from gr2.review where country like 'NO';">Norway</option>
				<option value="select * from gr2.review where country like 'OM';">Oman</option>
				<option value="select * from gr2.review where country like 'PK';">Pakistan</option>
				<option value="select * from gr2.review where country like 'PW';">Palau</option>
				<option value="select * from gr2.review where country like 'PS';">Palestinian Territory, Occupied</option>
				<option value="select * from gr2.review where country like 'PA';">Panama</option>
				<option value="select * from gr2.review where country like 'PG';">Papua New Guinea</option>
				<option value="select * from gr2.review where country like 'PY';">Paraguay</option>
				<option value="select * from gr2.review where country like 'PE';">Peru</option>
				<option value="select * from gr2.review where country like 'PH';">Philippines</option>
				<option value="select * from gr2.review where country like 'PN';">Pitcairn</option>
				<option value="select * from gr2.review where country like 'PL';">Poland</option>
				<option value="select * from gr2.review where country like 'PT';">Portugal</option>
				<option value="select * from gr2.review where country like 'PR';">Puerto Rico</option>
				<option value="select * from gr2.review where country like 'QA';">Qatar</option>
				<option value="select * from gr2.review where country like 'RE';">Réunion</option>
				<option value="select * from gr2.review where country like 'RO';">Romania</option>
				<option value="select * from gr2.review where country like 'RU';">Russian Federation</option>
				<option value="select * from gr2.review where country like 'RW';">Rwanda</option>
				<option value="select * from gr2.review where country like 'BL';">Saint Barthélemy</option>
				<option value="select * from gr2.review where country like 'SH';">Saint Helena, Ascension and Tristan da Cunha</option>
				<option value="select * from gr2.review where country like 'KN';">Saint Kitts and Nevis</option>
				<option value="select * from gr2.review where country like 'LC';">Saint Lucia</option>
				<option value="select * from gr2.review where country like 'MF';">Saint Martin (French part)</option>
				<option value="select * from gr2.review where country like 'PM';">Saint Pierre and Miquelon</option>
				<option value="select * from gr2.review where country like 'VC';">Saint Vincent and the Grenadines</option>
				<option value="select * from gr2.review where country like 'WS';">Samoa</option>
				<option value="select * from gr2.review where country like 'SM';">San Marino</option>
				<option value="select * from gr2.review where country like 'ST';">Sao Tome and Principe</option>
				<option value="select * from gr2.review where country like 'SA';">Saudi Arabia</option>
				<option value="select * from gr2.review where country like 'SN';">Senegal</option>
				<option value="select * from gr2.review where country like 'RS';">Serbia</option>
				<option value="select * from gr2.review where country like 'SC';">Seychelles</option>
				<option value="select * from gr2.review where country like 'SL';">Sierra Leone</option>
				<option value="select * from gr2.review where country like 'SG';">Singapore</option>
				<option value="select * from gr2.review where country like 'SX';">Sint Maarten (Dutch part)</option>
				<option value="select * from gr2.review where country like 'SK';">Slovakia</option>
				<option value="select * from gr2.review where country like 'SI';">Slovenia</option>
				<option value="select * from gr2.review where country like 'SB';">Solomon Islands</option>
				<option value="select * from gr2.review where country like 'SO';">Somalia</option>
				<option value="select * from gr2.review where country like 'ZA';">South Africa</option>
				<option value="select * from gr2.review where country like 'GS';">South Georgia and the South Sandwich Islands</option>
				<option value="select * from gr2.review where country like 'SS';">South Sudan</option>
				<option value="select * from gr2.review where country like 'ES';">Spain</option>
				<option value="select * from gr2.review where country like 'LK';">Sri Lanka</option>
				<option value="select * from gr2.review where country like 'SD';">Sudan</option>
				<option value="select * from gr2.review where country like 'SR';">Suriname</option>
				<option value="select * from gr2.review where country like 'SJ';">Svalbard and Jan Mayen</option>
				<option value="select * from gr2.review where country like 'SZ';">Swaziland</option>
				<option value="select * from gr2.review where country like 'SE';">Sweden</option>
				<option value="select * from gr2.review where country like 'CH';">Switzerland</option>
				<option value="select * from gr2.review where country like 'SY';">Syrian Arab Republic</option>
				<option value="select * from gr2.review where country like 'TW';">Taiwan, Province of China</option>
				<option value="select * from gr2.review where country like 'TJ';">Tajikistan</option>
				<option value="select * from gr2.review where country like 'TZ';">Tanzania, United Republic of</option>
				<option value="select * from gr2.review where country like 'TH';">Thailand</option>
				<option value="select * from gr2.review where country like 'TL';">Timor-Leste</option>
				<option value="select * from gr2.review where country like 'TG';">Togo</option>
				<option value="select * from gr2.review where country like 'TK';">Tokelau</option>
				<option value="select * from gr2.review where country like 'TO';">Tonga</option>
				<option value="select * from gr2.review where country like 'TT';">Trinidad and Tobago</option>
				<option value="select * from gr2.review where country like 'TN';">Tunisia</option>
				<option value="select * from gr2.review where country like 'TR';">Turkey</option>
				<option value="select * from gr2.review where country like 'TM';">Turkmenistan</option>
				<option value="select * from gr2.review where country like 'TC';">Turks and Caicos Islands</option>
				<option value="select * from gr2.review where country like 'TV';">Tuvalu</option>
				<option value="select * from gr2.review where country like 'UG';">Uganda</option>
				<option value="select * from gr2.review where country like 'UA';">Ukraine</option>
				<option value="select * from gr2.review where country like 'AE';">United Arab Emirates</option>
				<option value="select * from gr2.review where country like 'GB';">United Kingdom</option>
				<option value="select * from gr2.review where country like 'US';">United States</option>
				<option value="select * from gr2.review where country like 'UM';">United States Minor Outlying Islands</option>
				<option value="select * from gr2.review where country like 'UY';">Uruguay</option>
				<option value="select * from gr2.review where country like 'UZ';">Uzbekistan</option>
				<option value="select * from gr2.review where country like 'VU';">Vanuatu</option>
				<option value="select * from gr2.review where country like 'VE';">Venezuela, Bolivarian Republic of</option>
				<option value="select * from gr2.review where country like 'VN';">Viet Nam</option>
				<option value="select * from gr2.review where country like 'VG';">Virgin Islands, British</option>
				<option value="select * from gr2.review where country like 'VI';">Virgin Islands, U.S.</option>
				<option value="select * from gr2.review where country like 'WF';">Wallis and Futuna</option>
				<option value="select * from gr2.review where country like 'EH';">Western Sahara</option>
				<option value="select * from gr2.review where country like 'YE';">Yemen</option>
				<option value="select * from gr2.review where country like 'ZM';">Zambia</option>
				<option value="select * from gr2.review where country like 'ZW';">Zimbabwe</option>
			
		</select> </label> <input type="submit" placeholder="Select Country" value="Input Country">
</form>

<input type="text" id="myInput1" onkeydown="myFunction1()" placeholder="Search by column 2" title="Type">
<!--<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search by column 3" title="Type">-->
<!--<input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search by column 4" title="Type">-->
<!--<input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search by column 5" title="Type">-->
<!--<input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="Search by column 6" title="Type">-->
<!--<input type="text" id="myInput6" onkeyup="myFunction6()" placeholder="Search by column 7" title="Type">-->
<!--<input type="text" id="myInput7" onkeyup="myFunction7()" placeholder="Search by column 8" title="Type">-->
<!--<input type="text" id="myInput8" onkeyup="myFunction8()" placeholder="Search by column 9" title="Type">-->
<!--<input type="text" id="myInput9" onkeyup="myFunction9()" placeholder="Search by column 10" title="Type">-->

<?php
echo "<table id='myTable'  border='1'>";
while ($row = $statement->fetch())
{
echo"<tr><td>". $row[0] ."</td>
	  	 <td>". $row[1] ."</td>
		 <td>". $row[2] ."</td>
		 <td>". $row[3] ."</td>
		 <td>". $row[4] ."</td>
		 <td>". $row[5] ."</td>
		 <td>". $row[6] ."</td>
		 <td>". $row[7] ."</td>
		 <td>". $row[8] ."</td>
		 <td>". $row[9];}
echo "</table>";

//close connect
$dbHandle = null;
?>
<!--Filter Choices-->

<form action="/tests/testFilter.php" method="post">
	<label> <select name = "click">
			<option value = 'select * from gr2.user'>select all users</option>
			<option value = 'select * from gr2.user where isAdministrator = 1'>get all admin</option>
			<option value = 'select * from gr2.user where isAdministrator = 0'>get all non admin</option>
			<option value = 'select * from gr2.review'>select all reviews</option>
		
		</select> </label> <input type="submit" placeholder="Select SQL Query" value="Quick Search">
</form>

<!--JScript to help filter-->

<script>
	function myFunction1() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput1");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[1];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction2() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput2");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[2];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction3() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput3");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction4() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput4");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[4];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction5() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput5");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[5];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction6() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput6");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[6];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction7() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput7");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[7];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction8() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput8");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[8];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction9() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput9");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[9];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
<script>
	function myFunction10() {
		// Declare variables
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput10");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[10];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>


