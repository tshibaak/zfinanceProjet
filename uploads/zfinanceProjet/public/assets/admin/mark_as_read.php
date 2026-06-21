<?php

require "../../../src/config/db.php";

if (!isset($_POST['id'])) {
    exit;
}

$id = (int) $_POST['id'];

$stmt = $db->prepare("
    UPDATE contacts
    SET statut = 'lu'
    WHERE id = ?
");

$stmt->execute([$id]);

echo "ok";