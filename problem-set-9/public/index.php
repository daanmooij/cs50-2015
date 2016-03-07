<?php

    require("../includes/config.php");
    
    $rows = query("SELECT * FROM recipes WHERE id = ?", $_SESSION["id"]);
    
    
    render("recipes.php", ["title" => "Recipes", "recipes" => $rows]);
?>
