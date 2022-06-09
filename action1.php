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
    $name = $_GET['name'];
    $cursor = $client->find(['name' => $name]);
    $result = "Сообщения от клиента:<ol>";
    foreach ($cursor as $document) {
        $name = $document['name'];
        $IP = $document['ip'];
        $balance = $document['balance'];
        $messeges = $document['messeges'];
        if(is_object($messeges)){
            $messeges = (array)$messeges;
            $messeges = (implode(' ', $messeges));
        }
        $result .=  "<li>Имя: $name, IP: $IP, balance: $balance, сообщения: $messeges </li>";
    }
    $result .= "</ol>";
    echo $result;
    echo "<script> localStorage.setItem('$name', '$result');</script>";
    ?>
</body>
</html>