<div class="jumbotron mt-4">
    <div class="container">
        <h1 class="display-4">Welcome to SimpleShop!</h1>
        <p class="lead">Your simple, lightweight e-commerce platform.</p>
        <hr class="my-4">
        <p>Explore our wide range of products, upload your own, and enjoy our community's favourites.</p>
        <a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>products" role="button">Browse Products</a>
        <?php if (!$this->session->userdata('logged_in')) : ?>
            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>users/register" role="button">Sign Up</a>
            <a class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>users/login" role="button">Login</a>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Featured Product</h2>
            <p>Check out our featured product this month, chosen for its outstanding quality and reviews.</p>
            <p><a class="btn btn-secondary" href="<?php echo base_url(); ?>products/featured" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Upload Your Product</h2>
            <p>Got something to sell? Our platform allows you to upload your own products easily to reach thousands of potential customers.</p>
            <p><a class="btn btn-secondary" href="<?php echo base_url(); ?>products/upload" role="button">Upload now &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Community Favorites</h2>
            <p>See what's trending in our community. These are the products our users can't get enough of this month.</p>
            <p><a class="btn btn-secondary" href="<?php echo base_url(); ?>products/favorites" role="button">View favorites &raquo;</a></p>
        </div>
    </div>

    <hr>

</div> <!-- /container -->
