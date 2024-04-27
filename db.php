<?php

$db_name = 'test';
$db_user = '047535065_test';
$db_password = '047535065_test';
$db_host = 'localhost';
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>