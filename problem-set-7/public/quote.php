<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // else render form
    render("quote_form.php", ["title" => "Quote"]);
}

// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["symbol"]))
    {
        apologize("You must provide a stock symbol");
    }
    $stock = lookup($_POST["symbol"]);
    
    if($stock === false)
    {
        apologize("You must provide a valid stock symbol");
    } 
    else
    {
        render("quote_display.php", ["title" => "Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => number_format($stock["price"],3)]);
    }        
}

else
{
    render("quote_form.php", ["title" => "Quote"]);
}

?>
