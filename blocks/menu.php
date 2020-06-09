<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?site=home">Home<span class="sr-only">(current)<span></a>
            </li>
                <?php if(!isset($_SESSION['user'])):?>
            <li class="nav-item">
                <a class="nav-link" href="?site=registration">Registration form</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?site=enter">Enter</a>
            </li>
            <?php endif?>
            <li class="nav-item">
                <a class="nav-link" href="?site=users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?site=update">Update user data</a>
            </li>
            <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="?site=exit">Exit</a>
            </li>
            <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>