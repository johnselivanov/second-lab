<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'connection.php';
    $rangeQuery = ['balance' => ['$lt' => 0]];
    $cursor = $client->find($rangeQuery);
    $result = "Пользователи с отрицательным балансом:<ol>";
    foreach ($cursor as $document) {
        $name = $document['name'];
        $IP = $document['ip'];
        $balance = $document['balance'];
        $result .=  "<li>Имя: $name, IP: $IP, balance: $balance</li>";
    }
    $result .= "</ol>";
    echo $result;
    echo "<script> localStorage.setItem('les_zero', '$result');</script>";
    ?>
</body>
</html>