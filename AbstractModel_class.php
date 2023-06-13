<?php 

abstract class AbstractModel 
{
    protected $mysqli;
    private static $DB_HOST = "localhost";
    private static $DB_USER = "root";
    private static $DB_PASSWORD = "root";
    private static $DB_NAME = "simpledb";

    public function __construct() {
		$mysqli = @new mysqli(self::$DB_HOST, self::$DB_USER, self::$DB_PASSWORD, self::$DB_NAME);
        if ($mysqli->connect_errno) exit("DB connection error!");
		$mysqli->set_charset("utf8");
        $this->mysqli = $mysqli;
	}

    public function __destruct() {
		if (($this->mysqli) && (!$this->mysqli->connect_errno)) $this->mysqli->close();
	}

    abstract public function getRowById(int $id): array;
    abstract public function setData(string $data): int;
}

?>