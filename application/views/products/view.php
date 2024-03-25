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
    </div>
</div>
