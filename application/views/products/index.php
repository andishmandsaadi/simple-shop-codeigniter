<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2><?= $title ?></h2>
            <a href="<?php echo base_url(); ?>products/create" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('uploads/'.$product['image']); ?>" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo word_limiter($product['description'], 20); ?></p>
                        <a href="<?php echo site_url('products/view/'.$product['id']); ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>