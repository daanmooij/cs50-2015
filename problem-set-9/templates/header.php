<!DOCTYPE html>
<html>
    <head>
    
        <link href="/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"> 
        <link href="/css/styles.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Recipes</title>
        <?php endif ?>
        
        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <?php if(isset($_SESSION["id"])): ?>
                <h1 id="recipehead">Recipes</h1>
                
                    <div class="col-md-8 col-md-offset-2">
                        <ul class="nav nav-tabs nav-justified">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="password.php">Change Password</a></li>
                            <li><a href="logout.php">Log Out</a></li>   
                        </ul>
                    </div>
                
            <?php endif ?>
