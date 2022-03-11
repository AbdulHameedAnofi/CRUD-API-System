<?php

class Users {

    //database
    private $conn;
    private $db_table = 'users';
    
    public $id;
    public $name;
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $created_at;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createUser() {
        $sql = "INSERT INTO 
                ". $this->db_table ."
            SET
                name = :name,
                username = :username,
                email = :email,
                password = :password,
                created_at = :created_at";

        $stmt = $this->conn->prepare($sql);

        //sanitize
        $this->name         = htmlspecialchars(strip_tags($this->name));
        $this->username     = htmlspecialchars(strip_tags($this->username));
        $this->email        = htmlspecialchars(strip_tags($this->email));
        $this->password     = htmlspecialchars(strip_tags($this->password));
        $this->created_at   = htmlspecialchars(strip_tags($this->created_at));

        //bind param
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created_at", $this->created_at);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $sql = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $sql = "SELECT * FROM " . $this->db_table . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        //binding param
        $stmt->bindParam(1, $this->id);
        //executing
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $value['name'];
        $this->username = $value['username'];
        $this->email = $value['email'];
        $this->created_at = $value['created_at'];
    }

    public function updateUser() {
        $sql = "UPDATE 
               " .$this->db_table. "
            SET
                name = :name,
                username = :username,
                email = :email,
                password = :password,
                created_at = :created_at
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($sql);

        //sanitize
        $this->name         = htmlspecialchars(strip_tags($this->name));
        $this->username     = htmlspecialchars(strip_tags($this->username));
        $this->email        = htmlspecialchars(strip_tags($this->email));
        $this->password     = htmlspecialchars(strip_tags($this->password));
        $this->created_at   = htmlspecialchars(strip_tags($this->created_at));
        $this->id           = htmlspecialchars(strip_tags($this->id));

        //bind param
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteUser() {
        $sql = "DELETE FROM " . $this->db_table . " WHERE id = :id";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        //clean input
        $this->id = htmlspecialchars(strip_tags($this->id));
        //bind param
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}