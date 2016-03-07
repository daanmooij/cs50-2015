<div id="center" class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
<?php if(isset($_SESSION["id"])): ?>
<h2>Error:</h2>
<h3><?= htmlspecialchars($message) ?></h3>
<?php else: ?>
<h1>Error:</h1>
<h2><?= htmlspecialchars($message) ?></h2>
<?php endif ?>

    <span class="btn btn-link"><a href="javascript:history.go(-1);">Back</a></span>
</div>
