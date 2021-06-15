<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
include 'config.php';

$company = $_GET['comp'];
echo "$company";
// get Users

$query = "SELECT * FROM `$company` INNER JOIN `studententries` ON `$company`.enr = `studententries`.`COL 3`";
if (!$result = mysqli_query($link, $query)) {
    exit(mysqli_error($link));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$company.'.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Sr no.',	'Role' ,	'Firstname' ,	'Lastname','Enrolment',	'Email','Mobile',	'Whats App',	'Current location'	,'Address'	,'Skype Id',	'10th'	,'12th',	'Diploma',	'SPI' ,'SEM 1'	,'SPI SEM 2'	,'SPI SEM 3'	,'SPI SEM 4',	'SPI SEM 5'	,'CPI'	,'CGPA'	,'KNOWN TECHNOLOGIES'
));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>