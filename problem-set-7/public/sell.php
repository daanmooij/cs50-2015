<?php

require("../includes/config.php");
    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["symbol"]))
    {
        apologize("You must provide a stock in order to sell it");
    }
    
    $stock = lookup($_POST["symbol"]);
    
    if($stock === false)
    {
        apologize("You must provide a valid stock");
    }     
    else
    {
        // Get the amount of shares
        $query = query("SELECT shares FROM stocks WHERE id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
        
        if($query !== false)
        {
            $shares = $query[0]["shares"];
        }
        else
        {
            apologize("Shares not found");
        }
        
        $value = $stock["price"] * $shares;
        
        $query = query("DELETE FROM stocks WHERE id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
        if($query === false)
        {
            apologize("Error while selling shares");
        }
        
        $query = query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $_SESSION["id"]);
        if($query === false)
        {
            apologize("Error while selling shares");
        }
        
        query("INSERT INTO history (id, transaction, time, symbol, shares, price) VALUES(?, ?, Now(), ?, ?, ?)",
        $_SESSION["id"], "SELL", strtoupper($_POST["symbol"]), $shares, $stock["price"]);
        
        redirect("index.php");
    }    
}

else
{
    $rows = query("SELECT * FROM stocks WHERE id = ?", $_SESSION["id"]);
    render("sell_form.php", ["title" => "Sell", "symbols" => $rows]);
}
    
?>
