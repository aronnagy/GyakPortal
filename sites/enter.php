<div class="row justify-content-md-center mt-5">
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header bg-primary text-white">Enter</h5>
            <div class="card-body">
                <?php if(isset($_SESSION['entererror'])): ?>
                    <div class="alert alert-danger"><?=$_SESSION['entererror']?></div>
                    <?php
                        unset($_SESSION['entererror']);
                        endif;
                    ?>
                    <form action="controller/enter.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                        </div>
                        <div class=form-group>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember" value="1" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>
                        <div class="text-right">
                            <button name="enter" id="enter" class="btn btn-primary">Enter</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>