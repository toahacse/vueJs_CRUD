<?php

include '../Note.php';

header("Access-Control-Allow-Origin: *");

$note = new Note();

$note = $note->getNotes();

echo json_encode(["success"=> true, "data"=> $note])
?>