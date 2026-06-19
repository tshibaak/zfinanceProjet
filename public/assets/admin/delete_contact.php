<?php

session_start();

if(empty($_SESSION['admin_logged'])){
    exit;
}

require "../../../src/config/db.php";

$id = (int)$_GET['id'];

$stmt = $db->prepare("
DELETE FROM contacts
WHERE id = :id
");

$stmt->execute([
    ':id'=>$id
]);

header('Location: contacts.php');
exit;