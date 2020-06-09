<?php if(isset($_SESSION['user'])): ?>
<div class="card">
    <div class="card-header">List users</div>
    <div class="card-body">
        <?php
        $sql = "SELECT * FROM users";
        $query = $conn->query($sql);
        print $conn->error;
        ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Birth Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $query->fetch_assoc()) : ?>
                <tr>
                <?php if($user['password'] != $_SESSION['user']['password']) { ?>
                    <td>Private Data</td>
                    <td><?= $user['title'] ?> <?= $user['firstName'] ?> <?= $user['lastName'] ?></td>
                    <td>Private Data</td>
                    <td>Private Data</td>
                    <td>Private Operation</td>
                <?php } else {?>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['title'] ?> <?= $user['firstName'] ?> <?= $user['lastName'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['birthDate'] ?></td>
                    <td>
                        <a href="?site=update&id=<?= $user['id'] ?>">Edit</a>
                        <br>
                        <a href="?site=delete&id=<?= $user['id'] ?>">Delete</a>
                    </td>
                    <td>
                        <?php $picture = $user['imageUpload'];
                        echo '<img src="data:image/jpeg;base64,' . $picture . '"/>';
                        ?>
                    </td>
                </tr>
                <?php } endwhile ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <div class="alert altert-danger">Only authenticated users can see the content of this page!</div>
<?php endif?>