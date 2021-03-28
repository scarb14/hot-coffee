<?php

namespace Core\DB;

class Model
{
    const TABLE_NAME = '';
    const TABLE_PREFIX = '';
    const TABLE_PREFIX_FIELD = '';

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = MySQL::getInstance();
        $this->mysqli->set_charset('utf8');
    }

    public function getAll(): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE_NAME;
        return $this->select($sql);
    }

    public function query(string $sql): \mysqli_result
    {
        return $this->mysqli->query($sql);
    }

    public function select(string $sql): array
    {
        if (!$sql) {
            return [];
        }
        $result = $this->query($sql);
        if ($result->num_rows === 0) {
            return [];
        }
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
