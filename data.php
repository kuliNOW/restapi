<?php
class Data
{

    private $conn;
    private $tableName = "data";
    public $id;
    public $name;
    public $email;
    public $job;
    public $created;
    public $result;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getDataAll()
    {
        $query = "SELECT id, name, email, job, created FROM " . $this->tableName . "";
        $this->result = $this->conn->query($query);
        return $this->result;
    }

    public function createData()
    {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->job = htmlspecialchars(strip_tags($this->job));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $query = "INSERT INTO " . $this->tableName . " SET name = '" . $this->name . "', email = '" . $this->email . "', job = '" . $this->job . "',created = '" . $this->created . "'";
        $this->conn->query($query);
        if ($this->conn->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function getbyId()
    {
        $query = "SELECT id, name, email, job, created FROM " . $this->tableName . " WHERE id = ? LIMIT 0,1";
        $record = $this->conn->prepare($query);
        $record->bind_param('i', $this->id);
        $record->execute();
        $result = $record->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->job = $row['job'];
            $this->created = $row['created'];
        } else {
            $this->id = null;
        }
    }

    public function getbyName()
    {
        $query = "SELECT id, name, email, job, created FROM " . $this->tableName . " WHERE name = ? LIMIT 0,1";
        $record = $this->conn->prepare($query);
        $record->bind_param('s', $this->name);
        $record->execute();
        $result = $record->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->job = $row['job'];
            $this->created = $row['created'];
        } else {
            $this->name = null;
        }
    }

    public function getbyEmail()
    {
        $query = "SELECT id, name, email, job, created FROM " . $this->tableName . " WHERE email = ? LIMIT 0,1";
        $record = $this->conn->prepare($query);
        $record->bind_param('s', $this->email);
        $record->execute();
        $result = $record->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->job = $row['job'];
            $this->created = $row['created'];
        } else {
            $this->email = null;
        }
    }

    public function getbyJob()
    {
        $query = "SELECT id, name, email, job, created FROM " . $this->tableName . " WHERE job = ? LIMIT 0,1";
        $record = $this->conn->prepare($query);
        $record->bind_param('s', $this->job);
        $record->execute();
        $result = $record->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->job = $row['job'];
            $this->created = $row['created'];
        } else {
            $this->job = null;
        }
    }

    public function updateData()
    {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->job = htmlspecialchars(strip_tags($this->job));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $query = "UPDATE " . $this->tableName . " SET name = '" . $this->name . "', email = '" . $this->email . "', job = '" . $this->job . "',created = '" . $this->created . "' WHERE id = " . $this->id;

        $this->conn->query($query);
        if ($this->conn->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function deleteData()
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE id = " . $this->id;
        $this->conn->query($query);
        if ($this->conn->affected_rows > 0) {
            return true;
        }
        return false;
    }
}