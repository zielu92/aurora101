<?php
 class ArticleModel {
     private $db;
     public function __construct() {
         $this->db = new DataBase;
     }

     public function getArticles() {
         $this->db->query('SELECT * 
                                 FROM articles');
         return $this->db->resultset();
     }

     public function addArticle($data){
         //TODO: add user_id, category_id
         $this->db->query('INSERT INTO articles (title, user_id, body, status, category_id) 
                                 VALUES (:title, 1, :body, :status, 1)');

         $this->db->bind(':title', $data['title']);
         $this->db->bind(':status', $data['status']);
         $this->db->bind(':body', $data['body']);

         return !!$this->db->execute();
     }

 }