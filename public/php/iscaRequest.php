<?php   

require '../vendor/autoload.php';
include 'ConnectBuilder.php';

$requestType = $_GET['requestType'];
$queryType = $_GET['queryType'];

ConnectBuilder::buildConnection('QB'); //Establishes a connection to the database using Pixie Query Builder and assigns the connection to the QB constant

//Preparing to run the correct request.
if ($requestType = "fields") {
    switch ($queryType) {
        case "accountQuery":
            $query = "SHOW COLUMNS FROM account_view"; break;
        case "contactQuery":
            $query = "SHOW COLUMNS FROM account_view"; break;
        case "licenseQuery":
            $query = "SHOW COLUMNS FROM license_view"; break;
        case "keyQuery":
            $query = "SHOW COLUMNS FROM license_view"; break;
    }
} else if ($requestType = "datQuery") {
    switch ($queryType) {
        case "accountQuery":
            $query = "SHOW COLUMNS FROM account_view"; break;
    }
}

$result = QB::query($query)->get();
echo json_encode($result);