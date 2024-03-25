<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2><?= $title ?></h2>
            <a href="<?php echo base_url(); ?>products/create" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($products as $product): ?>
            <?php
            $user_id = $this->session->userdata('user_id');
            $is_liked = $user_id ? $this->product_model->is_liked_by_user($product['id'], $user_id) : false;
            $likes_count = $this->product_model->count_likes($product['id']);
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('uploads/'.$product['image']); ?>" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo word_limiter($product['description'], 20); ?></p>
                        <a href="<?php echo site_url('products/view/'.$product['id']); ?>" class="btn btn-primary">View Details</a>
                        <!-- Like/Unlike Button and Like Count -->
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <a href="<?php echo site_url('products/like/'.$product['id']); ?>" class="btn <?= $is_liked ? 'btn-secondary' : 'btn-success' ?>"><?= $is_liked ? 'Unlike' : 'Like' ?></a>
                        <?php endif; ?>
                        <span><?= $likes_count ?> likes</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
