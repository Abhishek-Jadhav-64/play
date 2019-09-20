<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'pdotest';

    //Set DSB
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    //PDO interface
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $status = 'admin';

    $sql = 'SELECT * FROM users WHERE status = :status';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['status' => $status]);
    $users = $stmt->fetchAll();

    foreach ($users as $user)
    {
        echo $user->name. '<br>';
    }

