<?php
class NewsModel {
    private $conn;
    private $table = "techart.news";
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getNewsCount() {
        try {
            $query = $this->conn->prepare("SELECT COUNT(*) as count FROM {$this->table}");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch(PDOException $e) {
            echo("Error in getNewsCount: {$e->getMessage()}");
            return 0;
        }
    }
    
    public function getNews($page, $itemsPerPage) {
        try {
            $offset = ($page - 1) * $itemsPerPage;
            $query = $this->conn->prepare(
                "SELECT id, date, title, announce, image 
                 FROM {$this->table} 
                 ORDER BY date DESC 
                 LIMIT :limit OFFSET :offset"
            );
            
            $query->bindValue(':limit', (int)$itemsPerPage, PDO::PARAM_INT);
            $query->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $query->execute();
            
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo("Error in getNewsByPage: {$e->getMessage()}");
            return [];
        }
    }

    public function getNewsByID($id){
        try{
            $query = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $query->bindValue(':id', (int)$id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo("Error in getNewsByID: {$e}");
            return null;
        }
    }
}
?>