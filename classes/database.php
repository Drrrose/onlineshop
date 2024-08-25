<?php
// namespace Onlineshop\Classes;


class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'onlineshopdatabase';

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert($table, $data) {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $stmt = $this->conn->prepare("INSERT INTO $table ($fields) VALUES ($values) ");
        foreach ($data as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }
        return $stmt->execute();
    }

    public function select($colum = "*", $table, $where = ''){
        $stmt = $this->conn->prepare("SELECT $colum FROM $table $where");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $data, $where) {
        $fields = '';
        foreach ($data as $field => $value) {
            $fields .= "$field = :$field, ";
        }
        $fields = rtrim($fields, ', ');

        $stmt = $this->conn->prepare("UPDATE $table SET $fields $where");
        foreach ($data as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }
        return $stmt->execute();
    }

    public function delete($table, $where) {
        $stmt = $this->conn->prepare("DELETE FROM $table $where");
        return $stmt->execute();
    }
}

