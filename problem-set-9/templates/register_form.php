<h1>Register</h1>
<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <form action="register.php" method="post">
        <div class="input-group input-pad">
            <input class="form-control" name="username" placeholder="Username" type="text" autofocus>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </div>
        </div>
        
        <div class="input-group input-pad">
            <input class="form-control" name="password" placeholder="Password" type="password">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
        </div>
        
        <div class="input-group input-pad"> 
            <input class="form-control" name="confirmation" placeholder="Password" type="password">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
        </div>
        
        
        <div class="input-group input-pad">
            <button type="submit" class="btn btn-default">Register</button>
            <span class="btn btn-link"><a href="login.php">Log In</a></span>
        </div>
    </form>
</div>
