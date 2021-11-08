<?php
    require("inc/functions.php");
    require("inc/headers.php");

    try{
        $db = openDb();
        $sql = 'SELECT * FROM item';
        $query = $db->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        print json_encode($results, JSON_PRETTY_PRINT);
    } catch(PDOException $pdoex) {
        returnError($pdoex);
    }

?>