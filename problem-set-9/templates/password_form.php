<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <h2>Change Password</h2>

    <form action="password.php" method="post">
        <div class="input-group input-pad">
            <input class="form-control" name="oldpass" placeholder="Current Password" type="password" autofocus>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
        </div>
        <div class="input-group input-pad">
            <input class="form-control" name="newpass" placeholder="New Password" type="password">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
        </div>
        <div class="input-group input-pad">
            <input class="form-control" name="confirm" placeholder="New Password" type="password">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
        </div>
        
        <div class="input-group input-pad">
            <button type="submit" class="btn btn-default" >Change Password</button>
        </div>
    </form>
</div>
