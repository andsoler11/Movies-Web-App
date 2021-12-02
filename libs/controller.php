<?php

/**
 * this is the controller class
 * from this class the other controllers are going to extend
 * im going to use it to load the models
 * redirect to another view passing messages
 * and also did a function to get POST calls from my forms in the views so i dont have to write always like $_POST 
 */


class Controller
{
    // constructor of the class, where I instance the view class
    function __construct()
    {
        $this->view = new View();
    }

    // here I load the model that I pass in the method
    function loadModel($model)
    {
        // get the url of the model so I can require it
        $url = 'models/' . $model . 'model.php';

        // check if the file exists and instance the model
        if(file_exists($url))
        {
            require_once $url;
            // all my models classes are named with the end with "Model" so I can instance them easier
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    // so I use this method so I dont have to always wirte $_GET and the name of the parameter
    function getGet($name)
    {
        return $_GET[$name];
    }

    // so I use this method so I dont have to always wirte $_POST and the name of the parameter
    function getPost($name)
    {
        return $_POST[$name];
    }

    // check if the params passed are set 
    function existPost($params)
    {
        // iterate for each of the params so I can check if they are set
        foreach ($params as $param)
        {
            // if the param is not set, put an error in the error log and return false
            if(!isset($_POST[$param])){
                error_log('CONTROLLER::existPost -> the parameter doesnt exists ' . $param);
                return false;
            }
        }

        // if everything is set return true
        return true;
    }

    function existGet($params)
    {
        foreach ($params as $param)
        {
            if(!isset($_GET[$param])){
                error_log('CONTROLLER::existGet -> the parameter doesnt exists ' . $param);
                return false;
            }
        }
        
        return true;
    }

    

    function redirect($route, $messages)
    {
        $data = [];
        $params = '';

        foreach($messages as $key => $message)
        {
            array_push($data, $key . '=' . $message);
        }

        $params = join('&', $data);
        //?nombre=Andres&apellido=Soler

        if($params != '')
        {
            $params = '?' . $params;
        }

        header('location: ' . constant('URL') . '/' . $route . $params);
    }


}


?>