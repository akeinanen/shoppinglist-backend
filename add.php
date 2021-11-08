<?php
    require("inc/functions.php");
    require("inc/headers.php");

    if ($_SERVER['REQUEST_METHOD']=== 'OPTIONS') {
        return 0;
    }

    $input = json_decode(file_get_contents('php://input'));
    $description = filter_var($input->description,FILTER_SANITIZE_STRING);
    $amount = filter_var($input->amount,FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = openDb();

        $query = $db->prepare('INSERT INTO item(description, amount) VALUES(:description, :amount)');
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->bindValue(':amount',$amount,PDO::PARAM_INT);
        $query->execute();

        header('HTTP/1.1 200 OK');
        $data = array('id' => $db->lastInsertId(),'description' => $description, 'amount' => $amount);
        print json_encode($data);

    } catch(PDOException $pdoex) {
        returnError($pdoex);
    }

?>