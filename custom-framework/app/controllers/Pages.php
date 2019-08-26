<?php

    class Pages extends Controller
    {
        public function __construct()
        {
            //echo 'Pages Loaded';

        }

        public function index()
        {
            $data = ['title' => 'welcome'];
            //$this->view('Hello');
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $this->view('pages/about');
        }
    }

?>