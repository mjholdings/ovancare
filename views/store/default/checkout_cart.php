<style>



</style>

<?php if($products) { ?>

    <form id="checkout-cart-form">

        <input type="hidden" name="checkout_page" value="true">

        <ul class="cart-header">

            <li><?= __('store.product') ?></li>

            <li class="cart-item-price"><?= __('store.price') ?></li>

            <li><?= __('store.quantity') ?></li>

            <li><?= __('Mã giảm giá') ?></li>

            <li><?= __('store.total') ?></li>

            <li></li>

        </ul>

        

        <?php foreach ($products as $key => $product) { ?>

            <ul class="cart-items-row">

                <li>

                    <div class="cart-item">

                        <div class="img-cart">OvanCare

                            <a href="<?= $product['link'] ?>">

                                <img src="<?= !empty($product['product_featured_image']) ? $product['product_featured_image'] : base_url('assets/store/default/img/1.png'); ?>" alt="<?= __('store.product_image') ?>">

                            </a>

                        </div>

                        <div class="cart-item-content">

                            <?php

                                $combinationString = "";

                                if(isset($product['variation']) && !empty($product['variation'])) {

                                    $variation = json_decode($product['variation'], true);

                                    foreach ($variation as $key => $value) {

                                        $separator = ($combinationString === "") ? "" : ", ";

                                        $combinationString .= $separator . ($key === 'colors' ? explode("-", $value)[1] : $value);

                                    }

                                }

                            ?>

                            <a href="<?= $product['link'] ?>">

                                <h3><?= $product['product_name'] ?><?= $combinationString ? "({$combinationString})" : "" ?></h3>

                            </a>

                            <p class="product-description text-muted"><?= $product['product_short_description'] ?? 'OvanGlobal dolor sit amet, consectetur adipiscing' ?></p>

                        </div>

                    </div>

                </li>

                <li class="cart-item-price text-center">

                    <span class="cart-sale-price">

                        <?= !empty($product['product_msrp']) ? '<small class="cart-regular-price">' . c_format($product['product_msrp'] + $product['variation_price']) . '</small><br/>' : '' ?>

                        <?= c_format($product['product_price'] + $product['variation_price']) ?>

                    </span>

                </li>

                <li>

                    <?php if(!in_array($product['product_type'], ['downloadable', 'video', 'videolink'])) { ?>

                        <div id="field1" class="cart-counter">

                            <button type="button" class="sub minus">-</button>

                            <input class="qty-input" name="quantity[<?= $product['cart_id'] ?>]" type="text" value="<?= $product['quantity'] ?>" min="1">

                            <button type="button" class="add plus">+</button>

                        </div>

                    <?php } else { ?>

                        <?= $product['quantity'] ?>

                    <?php } ?>

                </li>

                <li class="cart-item-price text-center">

                    <span class="cart-sale-price text-danger">

                        <?= !empty($product['coupon_code']) ? '<small class="cart-regular-coupon">' . $product['coupon_code']. '</small><br/><hr>' : '' ?>

                        <p><?= $product['coupon_name'] ?></p>

                    </span>

                </li>

                <li>

                    <span class="cart-mini-total-item"><?= c_format($product['total']) ?></span>

                </li>

                <li>

                    <a href="<?= $cart_url . "?remove=" . $product['cart_id'] ?>" style="text-decoration: none">

                        <!-- <img src="<?= base_url('assets/store/default/img/delete.png') ?>" alt="<?= __('store.image') ?>"> -->

                        <i class='bx bx-trash trash-checkout-cart' style='color:#ffffff'  ></i>

                    </a>

                </li>

            </ul>

        <?php } ?>

        

        <ul class="cart-footer-row">

            <?php foreach ($totals as $key => $value) { ?>

                <li>

                    <span><?= $value['title'] ?></span>

                    <span><?= c_format($value['amount']) ?></span>

                </li>

            <?php } ?>

        </ul>

    </form>

<?php } else { ?>

    <script type="text/javascript">

        window.location = '<?= $base_url . "cart" ?>';

    </script>

<?php } ?>