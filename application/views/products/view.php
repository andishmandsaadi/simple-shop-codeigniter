<h2><?php echo $product['name']; ?></h2>
<div class="row">
    <div class="col-md-8">
        <img class="img-fluid" src="<?php echo site_url('uploads/'.$product['image']); ?>" alt="<?php echo $product['name']; ?>">
    </div>
    <div class="col-md-4">
        <h3>Description</h3>
        <p><?php echo $product['description']; ?></p>
        <h3>Price</h3>
        <p>$<?php echo $product['price']; ?></p>

        <!-- Add to Cart Form -->
        <?php echo form_open('cart/add'); ?>
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        <?php echo form_close(); ?>
        <!-- Toggle Like/Unlike Button -->
        <?php
        $user_id = $this->session->userdata('user_id');
        $is_liked = $user_id ? $this->product_model->is_liked_by_user($product['id'], $user_id) : false;
        ?>
        <?php if ($this->session->userdata('logged_in')): ?>
            <a href="<?php echo site_url('products/like/'.$product['id']); ?>" class="btn btn-primary">
                <?php echo $is_liked ? 'Unlike' : 'Like'; ?>
            </a>
        <?php endif; ?>
        <p><?php echo $this->product_model->count_likes($product['id']); ?> likes</p>
    </div>
</div>
