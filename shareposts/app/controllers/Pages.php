<?php

    class Pages extends Controller
    {
        public function __construct()
        {
            //echo 'Pages Loaded';
            $this->postModel = $this->model('Post');

        }

        public function index()
        {
            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'welcome',
                'posts' => $posts

                ];
            //$this->view('Hello');


            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = ['title' => 'About Us'];
            $this->view('pages/about', $data);
        }


    }

?>