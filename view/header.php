<?php require_once $config['MODEL_PATH'] . 'header.php'; ?>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-body">Company name</a></h5>
    <nav class="my-2 my-md-0 mr-md-3" id="navigation">
        <?php foreach ($navbar as $link) {
            echo $link;
        } ?>
    </nav>
    <?php if (isset($_SESSION['user'])): ?>
        <a class="btn btn-outline-primary" href="?page=logout">Log Out</a>
    <?php else: ?>
        <a class="mx-1 btn btn-outline-primary" href="?page=login">Sign In</a>
        <a class="mx-1 btn btn-outline-primary" href="?page=signup">Sign Up</a>
    <?php endif; ?>
</div>
