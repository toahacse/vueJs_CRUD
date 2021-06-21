<?php

include 'Connecion.php';

class Note extends Connecion{

    public function getNotes(){
        $sql = "SELECT * FROM notes";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function searchNotes($search){
        $sql = "SELECT * FROM notes where title LIKE ? OR description LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("%$search%", "%$search%"));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findNotes($id){
        $sql = "SELECT * FROM notes where id=? limit 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addNote($title, $description, $author_id){
        $sql = "insert into notes(title,description,author_id) VALUES(?,?,?)";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($title , $description , $author_id))){
            return true;
        }
        return false;

    }

    public function updateNote($title, $description, $author_id, $id){
        $sql = "update notes set title =?, description=?, author_id = ? where id = ?";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($title , $description , $author_id, $id))){
            return true;
        }
        return false;

    }



    public function deleteNotes($id){
        $sql = "DELETE FROM notes where id=?";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($id))){
            return true;
        }
        return false;

    }




}

?>