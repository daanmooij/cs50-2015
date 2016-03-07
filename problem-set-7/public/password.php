<?php

require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["currpassword"]) || empty($_POST["newpassword"]) || empty($_POST["confirmation"]))
    {
        apologize("You must fill in all fields");
    }
    
    if($_POST["newpassword"] != $_POST["confirmation"])
    {
        apologize("Your new passwords must match");
    }
    
    if($_POST["currpassword"] == $_POST["newpassword"])
    {
        apologize("Your new password must differ from your current one");
    }
    
    $query = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    // compare hash of user's input against hash that's in database
    if(crypt($_POST["currpassword"], $query[0]["hash"]) == $query[0]["hash"])
    {
        
        $query = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["newpassword"]), $_SESSION["id"]);
        
        if($query === false)
        {
            apologize("Could not update password");
        }
        else
        {
            redirect("index.php");   
        }           
    }
    else
    {
        apologize("You must provide your correct current password");
    }
}

render("password_form.php", ["title" => "Change Password"]);

?>
