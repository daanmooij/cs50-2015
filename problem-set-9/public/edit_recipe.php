<?php
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty($_POST['recipe']))
            apologize("You must provide a name for the Recipe");
        
        if(empty($_POST['ingredients']))
            apologize("You must provide the ingredients for the Recipe");
         
        if(empty($_POST['directions']))
            apologize("You must provide the directions for the Recipe");
          
        
          
        $rows = query("UPDATE recipes SET recipe = ?, ingredients = ?, directions = ? WHERE recipe = ? ", 
                        $_POST['recipe'], $_POST['ingredients'], $_POST['directions'], $_POST['recipe']);  
          
            
        redirect("index.php");
    
    }
    
?>
