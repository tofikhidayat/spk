<?php
require("./core.php");
require("./tempData.php");

$order = new CompareMajors($majorsData, $studentsData);

$result = $order->exec();

echo $result ? json_encode($result) : 'demo';    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Master</title>
</head>
<body>
    
</body>
</html>