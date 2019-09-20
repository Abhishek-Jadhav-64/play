<?php

    //Base Controllers

    class Controller
    {
        public function model($model)
        {
            //Require model file
            require_once '../app/models/'. $model . '.php';
            return new $model();
        }

        public function view($view, $data = [])
        {
            //CHeck for view file
            if(file_exists('../app/views/' . $view . '.php'))
            {
                require_once '../app/views/' . $view . '.php';
            }
            else
            {
                //view does not exist
                die('View does not exist');
            }
        }
    }

?>