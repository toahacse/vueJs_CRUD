<?php
include '../Note.php';

header("Access-Control-Allow-Origin: *");

if (isset($_POST['id'])){
    $note = new Note();
    if ($note->deleteNotes($_POST['id'])){
        echo json_encode(["status" => "success"]);
    }else{
        echo json_encode(["status" => "error"]);
    }
}else{
    echo json_encode(["status" => "error"]);
}