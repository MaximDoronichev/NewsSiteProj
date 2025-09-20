<?php
class NewsController {
    private $newsModel;
    private $itemsPerPage = 4;

    public function __construct($db) {
        $this->newsModel = new NewsModel($db);
    }

    private function renderView($viewPath, $data = []) {
        extract($data);
        require_once $viewPath;
    }

    public function news(UriHelper $req) {
        $page = $req->get("page", 1);
        
        $totalNews = $this->newsModel->getNewsCount();
        
        $totalPages = ceil($totalNews / $this->itemsPerPage);
        
        if ($page < 1) $page = 1;
        if ($page > $totalPages) $page = $totalPages;
        
        $news = $this->newsModel->getNews($page, $this->itemsPerPage);
        
        $data = [
            'news' => $news,
            'page' => $page,
            'totalPages' => $totalPages
        ];
        
        $this->renderView('Views/main.php', $data);
    }

    public function newsByID($id) {
        $newsByID = $this->newsModel->getNewsByID($id);
        
        if ($newsByID) {
            $this->renderView('Views/headline.php', ['news' => $newsByID]);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo("Headline does not exist");
            exit();
        }
    }
}