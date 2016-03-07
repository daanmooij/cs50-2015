<?php

    require("../includes/config.php");

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("password_form.php", ["title" => "Change Password"]);
    } else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["oldpass"]) || empty($_POST["newpass"]) || empty($_POST["confirm"])){
            apologize("You must fill in all fields.");
        }
        if($_POST["newpass"] != $_POST["confirm"]){
            apologize("Your new passwords must match.");
        }
        if($_POST["oldpass"] == $_POST["newpass"]){
            apologize("Your new password must differ from your current one.");
        }
        $query = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if(crypt($_POST["oldpass"], $query[0]["hash"]) == $query[0]["hash"]){
            $query = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["newpass"]), $_SESSION["id"]);
            if($query === false){
                apologize("Could not update password.");
            }
            else{
                redirect("/");   
            }           
        } else{
            apologize("You must provide your correct current password.");
        }
    }
?>
