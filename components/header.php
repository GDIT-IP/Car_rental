<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Our cars</a>
        <a class="p-2 text-dark" href="#">Support</a>
    </nav>
    <?php
        if (!isset($_COOKIE['user'])):
    ?>
        <a class="mx-1 btn btn-outline-primary" href="#">Sign In</a>
        <a class="mx-1 btn btn-outline-primary" href="#">Sign Up</a>
    <?php else: ?>
        <a class="btn btn-outline-primary" href="">Log Out</a>
    <?php endif; ?>
</div>
