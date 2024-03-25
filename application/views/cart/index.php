<h2><?= $title ?></h2>
<?php if ($this->cart->total_items() > 0): ?>
    <div class="cart-list">
        <?php foreach ($this->cart->contents() as $item): ?>
            <div>
                <h4><?php echo $item['name']; ?></h4>
                <p>$<?php echo $item['price']; ?></p>
                <a href="<?php echo base_url('cart/remove/'.$item['rowid']); ?>">Remove</a>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <h3>Total: $<?php echo $this->cart->total(); ?></h3>
        <a href="<?php echo base_url('cart/checkout'); ?>" class="btn btn-success">Checkout</a>
    </div>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
