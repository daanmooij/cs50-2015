<?php

require("../includes/config.php");
    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["symbol"]))
    {
        apologize("You must provide a stock symbol");
    }
    
    if(empty($_POST["shares"]))
    {
        apologize("You must provide an amount of shares");
    }
    
    if(preg_match("/^\d+$/", $_POST["shares"]) === false)
    {
        apologize("You must provide a valid amount of shares");
    }
    
    $stock = lookup(strtoupper($_POST["symbol"]));
    
    if($stock === false)
    {
        apologize("You must provide a valid stock symbol");
    }
    
    $rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $value = $stock["price"] * $_POST["shares"];
    
    
    if($rows[0]["cash"] < $value)
    {
        apologize("You can't afford this purchase");
    }
    
    query("INSERT INTO stocks (id, symbol, shares) VALUES(?, ?, ?) 
    ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
    
    query("UPDATE users SET cash = cash - ? WHERE id = ?", $value, $_SESSION["id"]);
    
    query("INSERT INTO history (id, transaction, time, symbol, shares, price) VALUES(?, ?, Now(), ?, ?, ?)",
        $_SESSION["id"], "BUY", strtoupper($_POST["symbol"]), $_POST["shares"], $stock["price"]);
    
    redirect("index.php");
}

else
{
    render("buy_form.php", ["title" => "Buy"]);
}
    
?>
