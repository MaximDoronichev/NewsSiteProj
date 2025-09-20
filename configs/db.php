<?php
class DataBase{
    //По хорошему нужно создать config.php, чтобы загружать данные БД из файла, но мне лень :)
    private $host = 'localhost';
    private $db_name = 'techart';
    private $username = 'root';
    private $password = '';
    private $conn = null;

    public function connect(){
        if ($this->conn === null){
            try{
                $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            return $this->conn;
            }
            catch(PDOException $exception){
                error_log("DB Connection Error: ".$exception->getMessage(), 0);
                die('Произошла внутренняя ошибка сервера. Пожалуйста, попробуйте позже.');
                return null;
            }
        }
        
    }
}