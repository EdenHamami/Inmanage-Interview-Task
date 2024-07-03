<?php

class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($query) {
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    //INSERT query
    public function insert($query) {
        if ($this->conn->query($query) === TRUE) {
            return $this->conn->insert_id;
        } else {
            return "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    // DELETE query
    public function delete($query) {
        if ($this->conn->query($query) === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    //UPDATE query
    public function update($query) {
        if ($this->conn->query($query) === TRUE) {
            return "Record updated successfully";
        } else {
            return "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn->close();
    }
}

?>
