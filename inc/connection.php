<?php
session_start();

class DatabaseConnection
{
  private $conn;

  public function __construct($hostname, $username, $password, $dbname)
  {
    $this->conn = new mysqli($hostname, $username, $password, $dbname);
    if ($this->conn->connect_error) {
      die($this->conn->connect_error);
    }
  }

  public function execQuery($query, $params = array())
  {
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
      die("prepare error: " . $this->conn->error);
    }

    if (!empty($params)) {
      $dataTypes = '';
      $values = array();

      foreach ($params as $param) {
        $dataTypes .= $param['type'];
        $values[] = $param['value'];

        $stmt->bind_param($dataTypes, ...$values);
      }
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
      die("Query failed: " . $this->conn->error);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
  }
}

//connection
$conn = new DatabaseConnection("localhost", "root", "", "bedlp");

?>