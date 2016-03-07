<?php

    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("register_form.php", ["title" => "Register"]);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            apologize("You must provide a username."); 
        } else if(empty($_POST["password"])){
            apologize("You must provide a password");
        } else if($_POST["password"] != $_POST["confirmation"]){
            apologize("You must provide matching passwords"); 
        } else{ 
            $result = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
            if($result === false){
                apologize("Username already exists");
            } else{
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $_SESSION["id"] = $rows[0]["id"];
                redirect("/");
            }   
        }
    }
?>
