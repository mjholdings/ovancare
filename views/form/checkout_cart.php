<?php if($products) { ?>
	<form id="checkout-cart-form" class="table-responsive">
		<input type="hidden" name="checkout_page" value="true">

		
			<div class="shopping-cart">
	        	<div class="column-labels">
	        		<label class="product-image"><?= __('store.image') ?></label>
	        		<label class="product-details"><?= __('store.product') ?></label>
	        		<label class="product-price"><?= __('store.price') ?></label>
	        		<label class="product-quantity"><?= __('store.quantity') ?></label>
	        		<label class="product-line-price"><?= __('store.total') ?></label>
	        	</div>
	        	<?php foreach ($products as $key => $product) { ?>
	        	<div class="product">
	        		<div class="product-image"><img class="media-object" src="<?= $product['product_featured_image'] ?>" ></div>
	        		<div class="product-details">
	        			<div class="product-title"><?= $product['product_name'] ?></div>
	        			<p class="product-description"><?= $product['product_short_description'] ?></p>
	        		</div>
	        		<div class="product-price"><?= c_format($product['product_price']) ?></div>
	        		<div class="product-quantity">
						
		                <?php if($product['product_type'] != 'downloadable'){ ?>
		                    <div class="number-input mini-number-input">
		                        <input type="text" name="quantity[<?= $product['cart_id'] ?>]" value="<?= $product['quantity'] ?>" size="1" class="form-control qty-input">
		                        <div>
		                            <span class='plus'> + </span>
		                            <span class='minus'> - </span>
		                        </div>
		                    </div>
		                <?php } else { ?>
		                    <?= $product['quantity'] ?>
		                <?php } ?>
	        		</div>
	        		
	        		<div class="product-line-price"><?= c_format($product['total']) ?></div>
	        	</div>
	        	<?php } ?>

	        	<div class="totals">

	        	      <?php 
      foreach ($totals as $key => $value) { ?>

        <div class="totals-item">
				<label><?= $value['title'] ?></label>		 
				<div class="totals-value" id="cart-subtotal"><?= c_format($value['amount']) ?></div>		 
			</div>
            <?php } ?>
	        	</div>

	        </div>
		</div>
			<div class="text-danger error-coupon-msg"></div>
        	<div class="input-group">
			    <input type="text" class="form-control coupon_code" placeholder="<?= __('store.enter_coupon_code') ?>" name="coupon">
			    <div class="input-group-append">
			      <button type="button" class="submit-coupon btn btn-primary"><?= __('store.apply') ?></button>
			    </div>
			</div>
		</div>
	</form>
<?php } ?>