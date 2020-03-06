<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="?page=home" class="text-body">Company name</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="?page=home">Our cars</a>
        <a class="p-2 text-dark" href="#">Support</a>
    </nav>
    <?php if (isset($_SESSION['user'])): ?>
        <a class="btn btn-outline-primary" href="?page=logout">Log Out</a>
    <?php else: ?>
        <a class="mx-1 btn btn-outline-primary" href="?page=login">Sign In</a>
        <a class="mx-1 btn btn-outline-primary" href="?page=signup">Sign Up</a>
    <?php endif; ?>
</div>
