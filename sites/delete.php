<?php if(isset($_SESSION['user'])): ?>
<div class="card">
    <div class="card-header">User has been deleted!</div>
    <div class="card-body">
        <?php

        $id = $_GET['id'];

        $servername = "localhost";
        $username = "gyakportal2020";
        $password = "1doki9";
        $db = "gyakportal2020";

        $conn = new mysqli($servername, $username, $password, $db);

        $sql = "DELETE FROM users WHERE id ='$id'";
        $query = $conn->query($sql);
        print $conn->error;
        ?>
    </div>
</div>
<?php else: ?>
    <div class="alert altert-danger">Only authenticated users can see the content of this page!</div>
<?php endif?>