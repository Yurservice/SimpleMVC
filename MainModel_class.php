<?php 

class MainModel extends AbstractModel 
{
    
    private $table_name = 'main_table'; 

    public function getRowById(int $id): array {
        $result = $this->mysqli->query("SELECT * FROM $this->table_name WHERE `id` = $id");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function setData(string $data): int {
        if(is_string($data)&&strlen($data) < 256) {
            $query = "INSERT INTO $this->table_name (`something`) VALUES (?)";
            $param_query = $this->mysqli->prepare($query);
            $param_query->bind_param('s', htmlspecialchars($data));
            $param_query->execute();
            if ($param_query->error) {
                // Log errors 
                $result = false;
            }
            else $result = $param_query->insert_id;
            $param_query->close();
            return $result;
        }
    }
}

?>