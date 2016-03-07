<?php
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty($_POST['recipe']))
            apologize("You must provide a name for the Recipe");          
        
          
        $rows = query("DELETE FROM recipes WHERE recipe = ?", $_POST['recipe']);  
          
            
        redirect("index.php");
    
    }
    
?>
