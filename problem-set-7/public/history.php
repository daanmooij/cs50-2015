<?php

require("../includes/config.php");


    $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach($rows as $row)
    {
        $positions[] = [
            "transaction" => $row["transaction"],
            "time" => $row["time"],
            "symbol" => $row["symbol"],
            "shares" => $row["shares"],
            "price" => $row["price"]           
        ];
        
    }
    
    

render("history_display.php", ["title" => "History", "positions" => $positions]);

?>
