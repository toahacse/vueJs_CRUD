<?php

include '../Note.php';

header("Access-Control-Allow-Origin: *");

$note = new Note();

if (isset($_GET['search'])){

    $notes = $note->searchNotes($_GET['search']);
    echo json_encode(["success"=> true, "data"=> $notes]);
}


?>