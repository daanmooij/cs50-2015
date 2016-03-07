<?php
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty($_POST['recipe']))
            apologize("You must provide a name for the Recipe");
        
        if(empty($_POST['ingredients']))
            apologize("You must provide the ingredients for the Recipe");
         
        if(empty($_POST['directions']))
            apologize("You must provide the directions for the Recipe");
            
        
        
        
        $user = query("SELECT username FROM users WHERE id = ?", $_SESSION['id']);    
            
        
            
        $rows = query("INSERT INTO recipes (id, recipe, ingredients, directions) VALUES(?, ?, ?, ?)", $_SESSION['id'], $_POST['recipe'], $_POST['ingredients'], $_POST['directions']);
        
        if($rows === false)
            apologize("Recipe already exists");
            
        redirect("/");
    
    }
    
?>
