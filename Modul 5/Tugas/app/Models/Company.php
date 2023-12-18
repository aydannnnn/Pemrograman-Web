<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";

use app\Config\DatabaseConfig;
use mysqli;

class Company extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        // CONNECT KE DATABASE MYSQL
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        // Check connection
        if ($this->conn->connect_error) {
            # code...
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    // PROSES MENAMPILKAN SEMUA DATA
    public function findAll()
    {
        $sql = "SELECT * FROM employee JOIN position ON employee.position_id = position.position_id";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            # code...
            $data[] = $row;
        }
        return $data;
    }
    // PROSES MENAMPILKAN DATA DENGAN ID
    public function findById($id)
    {
        // $sql = "SELECT * FROM employee JOIN position ON employee.position_id = position.position_id WHERE employee_id = ?";
        $sql = "SELECT * FROM employee JOIN position on employee.position_id = position.position_id WHERE position.position_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            # code...
            $data[] = $row;
        }
        return $data;
    }

    // PROSES INSERT DATA
    public function create($data)
    {
        $employeeName = $data['name'];
        $nik = $data['nik'];
        $positionId = $data['position_id'];
        $query = "INSERT INTO employee (nik, name, position_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nik, $employeeName, $positionId);
        $stmt->execute();
        $this->conn->close();
    }
    //PROSES UPDATE DATA DENGAN ID
    public function update($data, $id)
    {
        $employeeName = $data['name'];

        $query = "UPDATE employee SET name = ? WHERE employee_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $employeeName, $id);
        $stmt->execute();
        $this->conn->close();
    }
    // PROSES DELETE DATA DENGAN ID
    public function destroy($id)
    {
        $query = "DELETE FROM employee WHERE employee_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}
