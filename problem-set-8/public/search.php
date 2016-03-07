<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // search database for places matching $_GET["geo"]
    
    
    $params = array_map('trim', explode(",", $_GET["geo"]));
    
    if(($index = array_search("US", $params)) !== false)
    {
        unset($params[$index]);
    }
    
    $params = array_values($params);
    
    
    $query = "SELECT * FROM places WHERE MATCH (country_code, place_name, postal_code, 
    admin_name1, admin_code1, admin_name2, admin_code2, admin_name3, admin_code3) AGAINST ('";
       
    for($i = 0; $i < count($params); $i++)
    {
        if(preg_match('/\s/', $params[$i]))
        {
            $query .= "+\"" . $params[$i] . "*\" ";
        }
        else
        {
            $query .= "+" . $params[$i] . "* "; 
        }     
    } 
    
    $query .= "' IN BOOLEAN MODE) ORDER BY place_name";   
        
    $places = query($query);

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
