<?php

    require_once("constants.php");
    
    // header() sends a raw HTTP header to the browser 
    function redirect($destination){
        if (preg_match("/^https?:\/\//", $destination)){
            header("Location: " . $destination);
        } else if (preg_match("/^\//", $destination)){
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        } else{
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }
        exit;
    }
    
    // render makes the template complete with boilerplates
    function render($template, $values = []){  
        if (file_exists("../templates/$template")){   
            extract($values);
            require("../templates/header.php");
            require("../templates/$template");
            require("../templates/footer.php");     
        } else{
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
    
    // TODO Comment function
    function apologize($message){
        render("apology.php", ["message" => $message, "title" => "Something went wrong"]);
        exit;
    }
    
    // TODO Comment function
    function dump($variable){
        require("../templates/dump.php");
        exit;
    }
    
    // TODO Comment function
    function logout(){
        $_SESSION = [];
        if (!empty($_COOKIE[session_name()])){
            setcookie(session_name(), "", time() - 42000);
        }
        session_destroy();
    }
    
    // TODO Comment function
    function query(/* $sql [, ... ] */){
        $sql = func_get_arg(0);
        $parameters = array_slice(func_get_args(), 1);
        static $handle;
        if (!isset($handle)){
            try{
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            } catch (Exception $e){
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }     
        $statement = $handle->prepare($sql);
        if ($statement === false){ 
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }
        $results = $statement->execute($parameters);
        if ($results !== false){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else{
            return false;
        }
    }
?>
