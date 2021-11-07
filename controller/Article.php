<?php

class Article extends Controller
{
    public function __construct() {
        $this->articleModel = $this->model('ArticleModel');
    }

    public function index() {
        $articles = $this->articleModel->getArticles();
        $context = ['articles'=>$articles];
        $this->view('article/index', $context);
    }

    public function show($id) {

    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //TODO: add user_id and category_id
            $context = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'status' => trim($_POST['status']),
                'title_err' => '',
                'body_err' => ''
            ];
            if(empty($context['title'])){
                $context['title_err'] = 'Proszę podać tytuł';
                if(empty($context['body'])){
                    $context['body_err'] = 'Proszę podać treść';
                }
            }
            if(empty($context['title_err']) && empty($context['body_err'])){
                if($this->articleModel->addArticle($context)){
                    // Redirect to login
                    flash('article_added', 'dodano artykuł');
                    redirect('articles');
                } else {
                    die('oops, coś się popsuło');
                }
            } else {
                $this->view('article/add', $context);
            }

        } else {
            $context = [
                'title' => '',
                'body' => '',
                'status'=>1
            ];

            $this->view('article/add', $context);
        }
    }

    public function edit($id) {

    }

    public function backup() {

    }
}