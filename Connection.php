<?php
class Connection{
  // $conn is the object which gonna be used everywhere
  public $conn;

  public function __construct(){

    $this->conn = new PDO("mysql:host=localhost;dbname=phonebook", "root", "");

  }

  #       Get all notes
  public function getAllNotes($id){
    $statement = $this->conn->prepare("SELECT * FROM contacts WHERE user_id='$id';");
    $statement->execute();
    $data = $statement->fetchAll();

    return $data;
  }

  #       Delete a note
  public function deleteNote($id){
    $statement = $this->conn->prepare("DELETE FROM contacts WHERE id=$id;");
    $statement->execute();
  }

  #       Update a note
  public function updateNote($name, $phone, $email, $img, $id){
    $name = addslashes($name);
    $phone = addslashes($phone);
    $email = addslashes($email);
    $img = addslashes($img);
    $statement = $this->conn->prepare(
      "UPDATE contacts
      SET name = '$name', phone = '$phone', email = '$email', image = '$img'
      WHERE id=$id;"
    );
    $statement->execute();
  }

  #       Delete a note


  #       Get a note
  public function getNote($id){
    $statement = $this->conn->prepare("SELECT * FROM tasks WHERE id='$id';");
    $statement->execute();
    $data = $statement->fetchAll();

    return $data;
  }

  #       Insert a note
  public function addNote($name, $phone, $email, $user_id, $img){
    $statement = $this->conn->prepare("INSERT INTO contacts (name,phone,email,image, user_id) VALUES
    (:name,:phone,:email,:image, :user_id);");
    $statement->execute(
      array(
          ':name' => $name,
          ':phone' => $phone,
          ':email' => $email,
          ':image' => $img,
          ':user_id' => $user_id
      )
    );
  }

  public function insert($query, $array){
    $statement = $this->conn->prepare($query);
    $statement->execute($array);
  }

  public function fetch($query, $array){
    $statement = $this->conn->prepare($query);
    $statement->execute();
    $data = $statement->fetchAll();

    return $data;
  }

}




?>
