<?php if(isset($_SESSION['user'])): ?>
<div class="card">
    <div class="card header">Protected content</div>
    <div class="card-body">
        <div class="alert alert-success">
            Welcome <?=$_SESSION['user']['firstName']?>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="alert altert-danger">Only authenticated users can see the content of this page!</div>
<?php endif?>