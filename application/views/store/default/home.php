<style>
</style>

<!-- Banner  -->
<section class="banner-slider mj">
	<div id="carouselExampleControls" class="carousel slide mj" data-ride="carousel">
		<div class="carousel-inner text-center text-white">
			<?php
			$homepage_slider = json_decode($store_setting['homepage_slider']);
			for ($i = 0; $i < sizeof($homepage_slider); $i++) {
				$homepage_slider_available = true;
			?>
				<div class="carousel-item <?= ($i == 0) ? 'active' : ''; ?>">
					<div class="banner-caption" style="">
						<img src="<?= (!empty($homepage_slider[$i]->slider_background_image)) ? base_url('assets/images/site/' . $homepage_slider[$i]->slider_background_image) : base_url('assets/store/default/img/banner.png') ?>" alt="Los Angeles" width="100%" height="100%">
						<div class="carousel-caption banner-caption-inner">
							<?php $slider_text_color = (!empty($homepage_slider[$i]->slider_text_color)) ? $homepage_slider[$i]->slider_text_color : '#FFF'; ?>
							<h1 class="display-4" style="color: <?= $slider_text_color ?> !important;">
								<?= htmlentities($homepage_slider[$i]->title, ENT_QUOTES); ?><br />
								<?= htmlentities($homepage_slider[$i]->sub_title, ENT_QUOTES); ?>
							</h1>
							<?= (!empty($homepage_slider[$i]->content)) ? '<p style="color: ' . $slider_text_color . ' !important;">' . htmlentities($homepage_slider[$i]->content, ENT_QUOTES) . '</p>' : '' ?>
							<?php if (!empty($homepage_slider[$i]->button_text)) { ?>
								<a href="<?= $homepage_slider[$i]->button_link; ?>" class="btn btn-main bg-white color mt-4" style="color: <?= (!empty($homepage_slider[$i]->button_text_color)) ? $homepage_slider[$i]->button_text_color : '#FFF' ?> !important; background-color: <?= (!empty($homepage_slider[$i]->button_bg_color)) ? $homepage_slider[$i]->button_bg_color : '#FFF' ?> !important;"><?= $homepage_slider[$i]->button_text; ?>&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php
			}

			// dummy homepage slide if not available
			if (!isset($homepage_slider_available)) {
			?>
				<div class="carousel-item active">
					<div class="banner-caption" style="background-image: url(<?= base_url('assets/store/default/img/banner.png') ?>);">
						<div class="banner-caption-inner">
							<h1>Bạn đã sẵn sàng<span>?</span></h1>
							<a href="#" class="btn btn-main bg-white color" data-toggle="modal" data-target="#buyModel"><?= __('store.buy_now') ?> &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			<?php
			}

			?>
		</div>
		<a class="carousel-control-prev carousel-prev--color" href="#carouselExampleControls" role="button" data-slide="prev">
			<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
		</a>
		<a class="carousel-control-next carousel-next--color" href="#carouselExampleControls" role="button" data-slide="next">
			<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/slider-arrow.png" />
		</a>
	</div>
</section>
<!-- About -->
<section class="about-home">
	<div class="container">
		<div class="row about1 about-founder">
			<div class="col-12 col-md-12 col-lg-4 col-xl-6 image-about leoanh-ytb">
				<div class="img has-hover x md-x lg-x y md-y lg-y" id="image_255026422">
					<div class="img-inner dark">
						<img decoding="async" width="467" height="143" src="https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png.png" data-src="https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png.png" class="attachment-original size-original lazy-load-active" alt="" srcset="https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png.png 467w, https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png-300x92.png 300w" data-srcset="https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png.png 467w, https://ohbp.vn/wp-content/uploads/2020/06/cau-chuyen-thuong-hieu-png-300x92.png 300w" sizes="(max-width: 467px) 100vw, 467px">
					</div>
					<style>
						#image_255026422 {
							width: 76%;
						}
					</style>
				</div>
				<iframe class="iframe-style-founder" src="https://www.youtube.com/embed/JZ3MfKPLUk4?si=Ga7q2czKH52sD4FQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> </iframe>

			</div>
			<div class="col-12 col-md-12 col-lg-8 col-xl-6 pt-4">
				<div class="">
					<p><b>OVAN HEALTH </b><b>&amp; BEAUTY PALACE –</b></p>
					<h2 style='font-weight: 700;'><b style="font-size: 22px;color: #0a0a0a;font-weight: 700;font-size: 22px;margin-bottom:20px;">Giải pháp sức khoẻ trẻ hoá cấp tế bào 5 sao</b></h2>
					<div class="" style="display: flex;flex-direction: column;gap: 20px;">
						<p><span style="font-weight: 400;line-height: 24px;">OVANGROUP, với gần 20 năm hoạt động kinh doanh trong lĩnh vực làm đẹp, sức khỏe, tế bào gốc và nghiên cứu ứng dụng công nghệ Plasma, chúng tôi đúc kết kinh nghiệm và phát triển ra mô hình <a href="https://ohbp.vn">Ovan Health &amp; Beauty Palace</a> với mong mỏi mang đưa ứng dụng để xây dựng những liệu pháp tốt nhất để chăm sóc sức khoẻ và trẻ hóa cho từng khách hàng.</span></p>
						<p><span style="font-weight: 400;line-height: 24px;">Với tâm huyết và đặt lợi ích giá trị cho khách hàng, với đội ngũ chuyên tâm, chúng tôi đã kết hợp để đưa được ứng dụng y học cổ truyền như chăm sóc bấm huyệt, khai thông và kết hợp phương pháp hiện đại như công nghệ Tế bào gốc, công nghệ Plasma và các sản phẩm dưỡng chất thiên nhiên để đưa vào liệu trình kết hợp hiệu quả nhất.</span></p>
					</div>
					<div class="line"></div>
					<!-- <div class="contact_about_us">ß
						<div class="address">
							<i class='bx bxs-map-pin'></i>
							<span><?= !empty($store_setting['address']) ? $store_setting['address'] : 'Default Address'; ?></span>
						</div>
						<div class="address">
							<i class='bx bxs-phone'></i>
							<span><?= !empty($store_setting['contact_number']) ? $store_setting['contact_number'] : '+90 555 555 5555'; ?></span>
						</div>
						<div class="address">
							<i class='bx bx-envelope'></i>
							<span><?= !empty($store_setting['email']) ? $store_setting['email'] : 'Default Email'; ?></span>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section dich-vu-section" id="section_971021030">
	<div class="bg section-bg fill bg-fill bg-loaded">
	</div>
	<div class="section-content relative">
		<div class="row" id="row-307352073">
			<div id="col-465944887" class="col small-12 large-12 col-content-new">
				<div class="col-inner intro-dich-vu">
					<div class="container section-title-container">
						<h2 class="section-title section-title-center text-center"><b></b><span class="section-title-main">Giải Pháp Sức Khỏe Trẻ Hóa Cấp Tế Bào 5 Sao</span><b></b></h2>
					</div>
					<h2 style="text-align: center;">GIẢI PHÁP TỐI ƯU CHO BẠN</h2>
					<p style="text-align: center;"><strong>SỨC KHỎE TRẺ HÓA CẤP TẾ BÀO 5 SAO</strong></p>
					<p style="text-align: center;">Thanh lọc detox cấp tế bào</p>
					<p style="text-align: center;">Ứng dụng y học tái tạo cho sức khỏe trẻ hóa sống lâu</p>
					<p style="text-align: center;">Dưỡng sinh đông y truyền thống, kết hợp máy công nghệ cao Fusion Wave</p>
					<p style="text-align: center;">Dinh dưỡng hợp lý từng cá thể hóa</p>
					<p style="text-align: center;">Tập luyện thể dục để đạt hiệu quả cao nhất</p>
					<div id="gap-1456727138" class="gap-element clearfix" style="display:block; height:auto;">
						<style>
							#gap-1456727138 {
								padding-top: 19px;
							}
						</style>
					</div>
					<div class="slider-wrapper relative" id="slider-621168895">
						<div class="slider slider-nav-simple slider-nav-normal slider-nav-light slider-nav-outside slider-style-normal slider-lazy-load-active is-draggable flickity-enabled" ß tabindex="0">

							<div class="flickity-viewport" style="height: 397.914px; touch-action: pan-y;">
								<div class="flickity-slider" style="">
									<div class="row row-collapse is-selected flickity-viewport-container" id="row-577537378" style="">
										<div id="col-182428537" class="">
											<div class="col-inner text-center">
												<div class="icon-box featured-box icon-box-center text-center">
													<div class="icon-box-img" style="">
														<div class="icon">
															<div class="icon-inner">
																<img class="img-flickity" decoding="async" width="300" height="300" src="https://ohbp.vn/wp-content/uploads/2024/03/4-300x300.jpg" data-src="https://ohbp.vn/wp-content/uploads/2024/03/4-300x300.jpg" class="attachment-medium size-medium lazy-load-active" alt="" srcset="https://ohbp.vn/wp-content/uploads/2024/03/4-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/4-1024x1024.jpg 1024w, https://ohbp.vn/wp-content/uploads/2024/03/4-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/4-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/4-1536x1536.jpg 1536w, https://ohbp.vn/wp-content/uploads/2024/03/4-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/4-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/4.jpg 2048w" data-srcset="https://ohbp.vn/wp-content/uploads/2024/03/4-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/4-1024x1024.jpg 1024w, https://ohbp.vn/wp-content/uploads/2024/03/4-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/4-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/4-1536x1536.jpg 1536w, https://ohbp.vn/wp-content/uploads/2024/03/4-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/4-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/4.jpg 2048w" sizes="(max-width: 300px) 100vw, 300px">
															</div>
														</div>
													</div>
													<div class="icon-box-text last-reset">
														<h3 style="text-align: center;font-size: 18px;font-weight: 600;">TRẺ HÓA</h3>
														<p style="text-align: center;">Gói khỏe, trẻ hóa 2-5T bằng Y Học Tái Tạo &amp; Dưỡng tinh chất</p>
														<a class="button primary lowercase reveal-icon nut-xem-them" style="border-radius:99px;">
															<span>Xem thêm</span>
															<i class="icon-angle-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div id="col-561108398" class="">
											<div class="col-inner text-center" style="background-color:rgba(0, 142, 162, 0.61) !important;">
												<div class="icon-box featured-box icon-box-center text-center">
													<div class="icon-box-img" style="">
														<div class="icon">
															<div class="icon-inner">
																<img class="img-flickity" decoding="async" width="300" height="300" src="https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-300x300.jpg" data-src="https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-300x300.jpg" class="attachment-medium size-medium lazy-load-active" alt="" srcset="https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n.jpg 900w" data-srcset="https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/432787813_122147320376061300_5770072997601790367_n.jpg 900w" sizes="(max-width: 300px) 100vw, 300px">
															</div>
														</div>
													</div>
													<div class="icon-box-text last-reset item-2">
														<h3 style="text-align: center;font-size: 18px;font-weight: 600;color: white;">Detox – Thải Độc Toàn Diện</h3>
														<p style="text-align: center;">Soi Máu, Kiểm Tra<br>
															&amp; Kết Luận 36 Chỉ Số, phác đồ tầm soát</p>
														<a class="button primary lowercase reveal-icon nut-xem-them" style="border-radius:99px;">
															<span>Xem thêm</span>
															<i class="icon-angle-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div id="col-1607528035" class="">
											<div class="col-inner text-center">
												<div class="icon-box featured-box icon-box-center text-center">
													<div class="icon-box-img" style="">
														<div class="icon">
															<div class="icon-inner">
																<img class="img-flickity" decoding="async" width="300" height="300" src="https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-300x300.jpg" data-src="https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-300x300.jpg" class="attachment-medium size-medium lazy-load-active" alt="" srcset="https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1.jpg 900w" data-srcset="https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/432744118_122147319530061300_2030661586627453500_n-1.jpg 900w" sizes="(max-width: 300px) 100vw, 300px">
															</div>
														</div>
													</div>
													<div class="icon-box-text last-reset">
														<h3 style="text-align: center;font-size: 18px;font-weight: 600;">Massage Thư Giãn</h3>
														<p style="text-align: center;">Massage thư giãn tinh dầu / đá nóng</p>
														<a class="button primary lowercase reveal-icon nut-xem-them" style="border-radius:99px;">
															<span>Xem thêm</span>
															<i class="icon-angle-right"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div id="col-1290046180" class="">
											<div class="col-inner text-center" style="background-color:rgba(0, 142, 162, 0.61) !important;">
												<div class="icon-box featured-box icon-box-center text-center">
													<div class="icon-box-img" style="">
														<div class="icon">
															<div class="icon-inner">
																<img class="img-flickity" decoding="async" width="300" height="300" src="https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-300x300.jpg" data-src="https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-300x300.jpg" class="attachment-medium size-medium lazy-load-active" alt="" srcset="https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-1024x1024.jpg 1024w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-1536x1536.jpg 1536w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y.jpg 2048w" data-srcset="https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-300x300.jpg 300w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-1024x1024.jpg 1024w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-150x150.jpg 150w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-768x768.jpg 768w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-1536x1536.jpg 1536w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-600x600.jpg 600w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y-100x100.jpg 100w, https://ohbp.vn/wp-content/uploads/2024/03/duong-sinh-dong-y.jpg 2048w" sizes="(max-width: 300px) 100vw, 300px">
															</div>
														</div>
													</div>
													<div class="icon-box-text last-reset item-2">
														<h3 style="text-align: center;font-size: 18px;font-weight: 600;color: white;">Dưỡng Sinh Trị Liệu Đông Y</h3>
														<p style="text-align: center;">DỊCH VỤ TRỊ LIỆU VIP</p>
														<a class="button primary lowercase reveal-icon nut-xem-them" style="border-radius:99px;">
															<span>Xem thêm</span>
															<i class="icon-angle-right"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="loading-spin dark large centered" style="display: none;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
		#section_971021030 {
			padding-top: 120px;
			padding-bottom: 120px;
		}

		#section_971021030 .ux-shape-divider--top svg {
			height: 150px;
			--divider-top-width: 100%;
		}

		#section_971021030 .ux-shape-divider--bottom svg {
			height: 150px;
			--divider-width: 100%;
		}
	</style>
</section>

<!-- Top tags - Sản phẩm kích hoạt thành viên -->
<!-- <section class="category-tag">
	<div class="container">
		<h3><?= __('store.top_tags') ?>:</h3>
		<div class="container-flex-category">
			<ul class="category-listing">
				<?php if ($category_tags) { ?>
					<?php foreach ($category_tags as $key => $category_tag) { ?>
						<?php $has_top_tags = true; ?>
						<li style="width: 300px;display: -webkit-box;
						-webkit-line-clamp: 1;
						-webkit-box-orient: vertical;
						overflow: hidden;">
							<a href="<?= base_url('store/category/' . $category_tag['slug']) ?>"><?= $category_tag['name'] ?>
							</a>
						</li>
					<?php } ?>
				<?php } ?>

				<?php if (!isset($has_top_tags)) { ?>
					<li class="demo-cat-badge"><a href="#">Danh mục 1</a></li>
					<li class="demo-cat-badge"><a href="#">Danh mục 2</a></li>
					<li class="demo-cat-badge"><a href="#">Danh mục 3</a></li>
				<?php } ?>

				<li><a href="<?= $base_url ?>category">+ <?= __('store.see_all_categories') ?>
					</a></li>
			</ul>
		</div>
	</div>
</section> -->

<!-- Top tags - Slider sản phẩm kích hoạt -->
<section class="category-tag">
	<div class="container">
		<h3 class="text-center"><?= __('store.top_tags') ?></h3>
		<div class="row categories-listing-row-strategy d-flex justify-content-center">
			<div class="col">
				<?php
				if (!empty($productsPopular)) {
					foreach ($productsPopular as $product) {
						if ($product['product_id'] == 126) {
							$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
				?>
							<a href="<?= $href ?>" class="category-home pruduct-home" style="text-decoration: none">
								<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/images/product/upload/thumb/'); ?><?= $product['product_featured_image']; ?>" />
								<h3 style="font-size: 15px;font-weight: 500;font-weight: 500;display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: 	vertical; overflow: hidden;">
									<?= $product['product_name']; ?>
								</h3>
								<h3 style="font-size: 10px;font-weight: 500;display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: 	hidden;">
									<?= $product['product_short_description']; ?>
								</h3>
								<h3 style="font-size: 20px;font-weight: 700;"><?= c_format($product['product_price']); ?></h3>
								<button class="btn btn-product bg-main2 text-white mt-3">Chi tiết</button>
							</a>
				<?php
						}
					}
				}
				?>
			</div>
			<div class="col-lg-6">
				<div class="categories-listing-row-strategy justify-content-center product-strategy-for-affiliate mt-2">
					<?php
					if (!empty($productForAffiliate)) {
						foreach ($productForAffiliate as $product) {
							if ($product['product_id'] !== 126) {
								$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
					?>
								<a href="<?= $href ?>" class="category-home pruduct-home col-lg-2 col-md-3 col-sm-4" style="text-decoration: none">
									<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/images/product/upload/thumb/'); ?><?= $product['product_featured_image']; ?>" width="100" height="100" />
									<h3 style="font-size: 15px;font-weight: 500;font-weight: 500;display: -webkit-box;
														  -webkit-line-clamp: 1;
														  -webkit-box-orient: vertical;
														  overflow: hidden;"><?= $product['product_name']; ?></h3>
									<h3 style="font-size: 10px;font-weight: 500;display: -webkit-box;
														  -webkit-line-clamp: 1;
														  -webkit-box-orient: vertical;
														  overflow: hidden;
														  "><?= $product['product_short_description']; ?></h3>
									<h3 style="font-size: 20px;font-weight: 700;"><?= c_format($product['product_price']); ?>
									</h3>
									<!-- <div class="rating-row d-flex justify-space-center"><?= $product['product_avg_rating_stars'] ?></div> -->
									<button class="btn btn-product bg-main2 text-white mt-3">Chi tiết</button>
								</a>
						<?php
							}
						}
					} else {
						?>
						<div class="category-home pruduct-home">
							<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/ctg1.png" />
							<h3><?= __('store.dog') ?></h3>
						</div>
					<?php
					}
					?>
				</div>
			</div>

		</div>
	</div>
</section>


<!-- Sản phẩm chiến lược -->
<section class="main-categories">
	<div class="container">
		<h2 class="section-title">
			<?= __('Sản phẩm chiến lược') ?>
		</h2>
		<div class="categories-listing-row-strategy justify-content-center product-strategy">
			<?php
			if (!empty($productsPopular)) {
				foreach ($productsPopular as $product) {
					// dd($productsPopular);
					$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
			?>
					<a href="<?= $href ?>" class="category-home pruduct-home col-lg-2 col-md-3 col-sm-4" style="text-decoration: none">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/images/product/upload/thumb/'); ?><?= $product['product_featured_image']; ?>" />
						<h3 style="font-size: 15px;font-weight: 500;font-weight: 500;display: -webkit-box;
								-webkit-line-clamp: 1;
								-webkit-box-orient: vertical;
								overflow: hidden;"><?= $product['product_name']; ?></h3>
						<h3 style="font-size: 10px;font-weight: 500;display: -webkit-box;
								-webkit-line-clamp: 1;
								-webkit-box-orient: vertical;
								overflow: hidden;
								"><?= $product['product_short_description']; ?></h3>
						<h3 style="font-size: 20px;font-weight: 700;"><?= c_format($product['product_price']); ?></h3>
						<!-- <div class="rating-row d-flex justify-space-center"><?= $product['product_avg_rating_stars'] ?></div> -->
						<button class="btn btn-product bg-main2 text-white mt-3">Chi tiết</button>
					</a>
				<?php
				}
			} else {
				?>
				<div class="category-home pruduct-home">
					<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/ctg1.png" />
					<h3><?= __('store.dog') ?></h3>
				</div>
			<?php

			}
			?>

		</div>
	</div>
</section>
<!-- home page product grid - Sản phẩm thịnh hành -->
<section class="home-product-grid">
	<div class="container">
		<div class="home-trend-top d-flex justify-content-between">
			<h2 class="section-title">
				<?= __('store.trending_products') ?>
			</h2>
			<div class="searchbox">
				<input id="searchProduct" type="text" placeholder="<?= __('store.search') ?>" />
				<img src="<?= base_url('assets/store/default/'); ?>img/search.png" class="search-icon-home" alt="<?= __('store.search') ?>">
			</div>
		</div>

		<div class="product-row product-grid-mjj product-list-trending">

		</div>
		<a href="javascript:void(0);" class="see-more see-more-trendings" data-next_page="1" data-request_page_section="trending">
			<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/loading.png" />
			<?= __('store.show_more') ?>
		</a>
	</div>
</section>


<?php
$homepage_features = (isset($store_setting['homepage_features']) && !empty($store_setting['homepage_features'])) ? json_decode($store_setting['homepage_features']) : [];
?>
<!-- Home page feature box - Điểm mạnh -->
<section class="stats-home">
	<div class="container">
		<div class="stats-row d-flex justify-content-center">
			<?php
			foreach ($homepage_features as $hf) {
				$homepage_features_are_available = true;
			?>
				<?php $img = (!empty($hf->feature_image)) ? base_url('assets/images/site/' . $hf->feature_image) : base_url('assets/store/default/img/stats1.png'); ?>
				<div class="stats-box d-flex align-items-center mx-4">
					<div class="stats-icon">
						<img alt="<?= __('store.image') ?>" src="<?= $img; ?>" style="width: 65px; height: 65px;" />
					</div>
					<div class="stats-text">
						<h4><?= $hf->title; ?></h4>
						<p><?= $hf->sub_title; ?></p>
					</div>
				</div>
			<?php
			}

			if (!isset($homepage_features_are_available)) {
			?>
				<div class="stats-box d-flex align-items-center mx-4">
					<div class="stats-icon">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/') ?>img/stats1.png" style="width: 65px; height: 65px;" />
					</div>
					<div class="stats-text">
						<h4><?= __('store.free_shipping') ?></h4>
						<p><?= __('store.free_shipping_all_order') ?></p>
					</div>
				</div>

				<div class="stats-box d-flex align-items-center mx-4">
					<div class="stats-icon">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/') ?>img/stats2.png" style="width: 65px; height: 65px;" />
					</div>
					<div class="stats-text">
						<h4><?= __('store.100_money_guarantee') ?></h4>
						<p><?= __('store.30_days_money_back') ?></p>
					</div>
				</div>

				<div class="stats-box d-flex align-items-center mx-4">
					<div class="stats-icon">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/') ?>img/stats3.png" style="width: 65px; height: 65px;" />
					</div>
					<div class="stats-text">
						<h4><?= __('store.help_center') ?></h4>
						<p><?= __('store.24_7_support_system') ?></p>
					</div>
				</div>

				<div class="stats-box d-flex align-items-center mx-4">
					<div class="stats-icon">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/') ?>img/stats4.png" style="width: 65px; height: 65px;" />
					</div>
					<div class="stats-text">
						<h4><?= __('store.payment_method') ?></h4>
						<p><?= __('store.secure_payment') ?></p>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>


<!-- New product box - Sản phẩm mới -->
<section class="home-new-products">
	<div class="container">
		<div class="home-trend-top d-flex justify-content-between">
			<h2 class="section-title">
				<?= __('store.new_products') ?>
			</h2>
			<!-- <ul class="category-listing">
				<li class="demo-cat-badge"><a href="#">Danh mục 1</a></li>
				<li class="demo-cat-badge"><a href="#">Danh mục 2</a></li>
				<li class="demo-cat-badge"><a href="#">Danh mục 3</a></li>
			</ul> -->
		</div>

		<div class="product-row product-grid-mjj product-list-new">
		</div>

		<a href="javascript:void(0);" class="see-more see-more-new" data-next_page="1" data-request_page_section="new">
			<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/loading.png" />
			<?= __('store.show_more') ?>
		</a>
	</div>
</section>

<section class="banner-ads">
	<?php if (isset($settings['hbanimage']) && $settings['hbanimage'] != "") { ?>
		<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/images/site/'); ?><?= $settings['hbanimage']; ?>" class="img-fluid img-banner-ads" />
	<?php } else { ?>
		<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/ad-bg.jpg" class="img-fluid img-banner-ads" />
	<?php } ?>


	<?php $homepage_banner = (isset($store_setting['homepage_banner'])) ? json_decode($store_setting['homepage_banner']) : []; ?>

	<div class="ad-caption">
		<h3><?= (isset($homepage_banner->title) && !empty($homepage_banner->title)) ? $homepage_banner->title : 'OvanCare'; ?>
		</h3>
		<p><?= (isset($homepage_banner->content) && !empty($homepage_banner->content)) ? $homepage_banner->content : 'OvanCare is simply dummy text of the printing and typesetting industry.'; ?>
		</p>
		<a href="<?= (isset($homepage_banner->button_link) && !empty($homepage_banner->button_link)) ? $homepage_banner->button_link : '#'; ?>"><?= (isset($homepage_banner->button_text) && !empty($homepage_banner->button_text)) ? $homepage_banner->button_text : 'OvanCare'; ?></a>
	</div>
</section>

<section class="main-categories">
	<div class="container">
		<h2 class="section-title">
			<?= __('store.categories') ?>
		</h2>

		<div class="categories-listing-row row justify-content-center">
			<?php


			if (!empty($category)) {
				foreach ($category as $cat_value) {
			?>
					<a href="<?php echo base_url('store/category/' . $cat_value['slug']) ?>" class="category-home col-lg-2 col-md-3 col-sm-4 " style="text-decoration: none">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/images/product/upload/thumb/'); ?><?= $cat_value['image']; ?>" />
						<h3><?= $cat_value['name']; ?></h3>
					</a>
				<?php
				}
			} else {
				?>
				<div class="category-home category-shadow">
					<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/'); ?>img/ctg1.png" />
					<h3><?= __('store.dog') ?></h3>
				</div>
			<?php

			}
			?>

		</div>
	</div>
</section>

<!-- DỊCH VỤ GRID -->
<section class="container dichvu">
	<h2 class="title-font text-custom-secondary text-start" style="color:var(color-pink);font-family:Yeseva One !important;font-weight:500">Dịch vụ</h2>
	<div class="row my-auto">
		<?php foreach ($productsDichVu as $key => $product) { ?>
			<div class="col-12 col-lg-6 px-0">
				<?php
				$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
				$image = (!empty($product['product_featured_image'])) ? base_url('assets/images/product/upload/thumb/' . $product['product_featured_image']) : 'https://res.cloudinary.com/dtiwyksp8/image/upload/v1700123969/woman-with-mask_vnj1sv.png" class="mr-1 product-thumbnail-img';
				?>
				<div class="row service-card">
					<div class="col-10 col-md-6 my-3 service-img-container">
						<img src="<?= $image ?>" class="service-img" alt="" />
						<div class="service-price title-font"><?= c_format($product['product_price']) ?></div>
					</div>
					<div class="col-12 col-md-5 my-auto ml-auto pl-4">
						<h3 class="title-font text-custom-secondary custom-full-underline">
							<?= $product['product_name'] ?>
						</h3>
						<ul class="service-list mt-5">
							<li class="service-list-item"><?= $product['product_short_description'] ?></li>
						</ul>
						<a href="<?= $href ?>" class="btn btn-custom-pink buttonServiceList">Chi tiết</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>

<!-- ĐÀO TẠO OVANCARE - TẾ BÀO GỐC -->
<article class="container py-5 tebaogoc">
	<section class="row">
		<div class="col-12 col-lg-5 action-banner">
			<div class="card h-100 text-white">
				<img src="https://res.cloudinary.com/dtiwyksp8/image/upload/v1701925148/z4950465051273_3810f3ec82b1172b261bf5fb3ca7f9ca_nd9zlw.jpg" class="card-img" />
				<div class="card-img-overlay p-5 d-flex flex-column justify-content-between">
					<div class="rejuvenation">
						<h2 class="card-title title-font mt-5" style="color: #FFF">Trẻ hóa cấp tế bào</h2>
						<p class="card-text">
							OVANCARE mang sắc đẹp đến với mọi người
						</p>
						<h3 class="title-font mb-3 title-nameMain" style="color:#FFF">OVANCARE</h3>
						<a href="<?= base_url('store/category/' . $row['slug']) ?>" class="btn btn-custom-skin title-font btn-service">XEM THÊM</a>
					</div>
					<!-- <p class="card-text font-weight-light mb-5">
						Valid till 23rd March, 10am | Online exclusive
					</p> -->
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-7">
			<div class="product-rejuvenation">
				<?php foreach ($products as $key => $product) { ?>
					<div class="content-rejuvenation">
						<?php

						$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
						$image = (!empty($product['product_featured_image'])) ? base_url('assets/images/product/upload/thumb/' . $product['product_featured_image']) : 'https://res.cloudinary.com/dtiwyksp8/image/upload/v1700124220/hair-spray_k3qpyh.png" class="mr-1 product-thumbnail-img';
						?>
						<div class="image">
							<img src="<?= $image ?>" class="mr-1 product-thumbnail-img" alt="..." />
						</div>
						<div class="media-body d-flex flex-column align-self-center ml-4">
							<a href="<?= $href ?>" class="font-weight-bold text-dark" style="display: -webkit-box;
								-webkit-line-clamp: 1;
								-webkit-box-orient: vertical;
								overflow: hidden;"><?= $product['product_name'] ?></a>
							<div class="rating">
								<?php
								for ($i = 0; $i < $product['product_avg_rating']; $i++) {
								?>
									<i class="fa fa-star text-warning"></i>
								<?php
								}
								while ($product['product_avg_rating'] < 5) {
								?>
									<i class="fa fa-star text-secondary"></i>
								<?php
									$product['product_avg_rating']++;
								}
								?>
							</div>
							<div class="d-flex my-2 justify-content-between align-content-center">
								<!-- <?php if ($product['product_msrp'] > 0) { ?>
									<span class="price"><?= c_format($product['product_msrp']) ?></span>
								<?php } ?> -->
								<span class="discount-price" style="font-weight:600; color:#343A40; font-size6px"><?= c_format($product['product_price']) ?></span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</article>

<?php if ($productsDaoTao) { ?>
	<article class="pb-5 daotao-pc" style="margin-top:80px;">
		<div class="container">
			<h2 class="title_mj">Đào tạo OvanEdu</h2>
			<div class="container py-2 image-slider-mj" style="background: rgba(238, 220, 188, 0.22); margin-top:30px">
				<div class="row">
					<div id="slide">
						<?php foreach ($productsDaoTao as $key => $product) { ?>
							<?php

							$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
							$image = (!empty($product['product_featured_image'])) ? base_url('assets/images/product/upload/thumb/' . $product['product_featured_image']) : 'https://cdn.pixabay.com/photo/2017/08/24/11/12/makeup-2676392_640.jpg';
							?>
							<div class="item" style="background-image: url(<?= $image ?>);">
								<div class="content">
									<div class="name"><?= $product['product_name'] ?></div>
									<div class="des"><?= $product['product_short_description'] ?></div>
									<div class="des"><?= c_format($product['product_price']) ?></div>
									<a href="<?= $href ?>" class="btn btn-custom-skin title-font btn-service">XEM THÊM</a>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="buttons">
						<button id="prev"><i class="fa-solid fa-angle-left"></i></button>
						<button id="next"><i class="fa-solid fa-angle-right"></i></button>
					</div>
				</div>
			</div>
		</div>
	</article>


<?php } ?>
<?php if ($productsDaoTao) { ?>
	<article class="pb-5 daotao-mobile">
		<div class="container">
			<h2 class="title_mj">Đào tạo OvanEdu</h2>
			<div class="col-12 col-lg-5 action-banner slider-daotao">
				<?php foreach ($productsDaoTao as $key => $product) { ?>

					<?php
					$href = base_url("store/" . base64_encode($user_id) . "/product/" . $product['product_slug']);
					$image = (!empty($product['product_featured_image'])) ? base_url('assets/images/product/upload/thumb/' . $product['product_featured_image']) : 'https://cdn.pixabay.com/photo/2017/08/24/11/12/makeup-2676392_640.jpg';
					?>
					<div class="card h-100 text-white ">
						<div class="daotao-items">
							<img src="<?= $image ?>" class="card-img" />
							<div class="card-img-overlay p-5 d-flex flex-column justify-content-between">
								<div class="content-daotao">
									<h2 class="card-title title-font mt-5" style="color: #FFF"><?= $product['product_name'] ?>
									</h2>
									<p class="card-text">
										<?= $product['product_short_description'] ?>
									</p>
									<h3 class="title-font mb-3 title-nameMain" style="color:#FFF">
										<?= c_format($product['product_price']) ?>
									</h3>
									<a href="<?= $href ?>" class="btn btn-custom-skin title-font btn-service">XEM THÊM</a>
								</div>
							</div>
							<!-- <p class="card-text font-weight-light mb-5">
						Valid till 23rd March, 10am | Online exclusive
					</p> -->
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</article>

<?php } ?>

<section class="home-blog">
	<div class="container">

		<?php $bs_cards = (isset($store_setting['bs_cards']) && !empty($store_setting['bs_cards'])) ? json_decode($store_setting['bs_cards']) : []; ?>

		<div class="row">
			<?php
			foreach ($bs_cards as $hf) {
				$bs_cards_are_available = true;
				if ($hf->button_link != "")
					$bs_button_link = $hf->button_link;
				else
					$bs_button_link = "#";


			?>
				<?php $img = (!empty($hf->feature_image)) ? base_url('assets/images/site/' . $hf->feature_image) : base_url('assets/store/default/img/blog1.png'); ?>
				<div class="col-md-6 col-12">
					<a class="bs_button_link" href="<?php echo $bs_button_link; ?>" target="<?php if ($hf->link_target == "true") {
																								echo '_blank';
																							} else {
																								echo '_self';
																							} ?>">
						<div class="blog-wrapper bg-main2" <?= (!empty($hf->bg_color)) ? 'style="background-color:' . $hf->bg_color . '"' : '' ?>>
							<img alt="<?= __('store.image') ?>" src="<?= $img; ?>" class="blog-img" />
							<div class="blog-content">
								<h4 class="blogContent-title" <?= (!empty($hf->bg_color_text)) ? 'style="color:' . $hf->bg_color_text . '"' : '' ?>><?= $hf->title; ?></h4>
								<p class="blogContent-para" <?= (!empty($hf->bg_color_text)) ? 'style="color:' . $hf->bg_color_text . '"' : '' ?>><?= $hf->sub_title; ?></p>
							</div>
						</div>
					</a>
				</div>
			<?php
			}

			if (!isset($bs_cards_are_available)) {
			?>
				<div class="col-md-6 col-12">
					<div class="blog-wrapper bg-main2">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/img') ?>/blog1.png" class="blog-img" />
						<div class="blog-content">
							<h4>OvanCare</h4>
							<p>
								Vui lòng vập nhật dữ liệu.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="blog-wrapper bg-main">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/img') ?>/fb2.png" class="blog-img" />
						<div class="blog-content">
							<h4>OvanCare</h4>
							<p>
								Vui lòng vập nhật dữ liệu.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="blog-wrapper bg-main">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/img') ?>/fb3.png" class="blog-img" />
						<div class="blog-content">
							<h4>OvanCare</h4>
							<p>
								Vui lòng vập nhật dữ liệu.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="blog-wrapper bg-main2">
						<img alt="<?= __('store.image') ?>" src="<?= base_url('assets/store/default/img') ?>/fb4.png" class="blog-img" />
						<div class="blog-content">
							<h4>OvanCare</h4>
							<p>
								Vui lòng vập nhật dữ liệu.
							</p>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>

		<!-- LỢI THẾ OVANCARE -->
		<div class="blog-paraContent">
			<?php
			$para = isset($store_setting['homepage_bottom_section']) ? json_decode($store_setting['homepage_bottom_section']) : "";
			$para = isset($para->content) ? $para->content : "";
			?>
			<?= (!empty(strip_tags($para))) ? $para : 'Vui lòng cập nhật bài viết ở trang quản trị.
'; ?>
		</div>
		<!--		<a href="javascript:void(0);" class="blog-more">--><? //= __('store.show_more') 
																		?><!-- <br /> <i class="fas fa-angle-down"></i></a>-->
	</div>
</section>

<?php include 'product-list-template.php'; ?>


<script type="text/javascript">
	$(document).on('click', '.blog-more', function() {
		var el = $(".blog-para"),
			curHeight = el.height(),
			autoHeight = el.css('height', 'auto').height();
		el.height(curHeight).animate({
			height: autoHeight
		}, 500);
		$(this).after('<a href="javascript:void(0);" class="blog-less">' + '<?= __('store.hide') ?>' + ' <br/> <i class="fas fa-angle-up"></i></a>');
		$(this).remove();
	});

	$(document).on('click', '.blog-less', function() {
		var el = $(".blog-para");
		el.animate({
			height: '50px'
		}, 500);
		$(this).after('<a href="javascript:void(0);" class="blog-more">' + '<?= __('store.show_more') ?>' + ' <br/> <i class="fas fa-angle-down"></i></a>');
		$(this).remove();
	});

	$(document).ready(function() {
		load_Product($('#searchProduct').val());

		$('#searchProduct').keyup(function(e) {
			e.preventDefault();
			var search = $(this).val();
			load_Product(search);
		});
	});


	$(document).on('click', '.see-more', function() {
		load_Product(null, {
			next_page: $(this).data('next_page'),
			request_page_section: $(this).data('request_page_section')
		});
	});

	function load_Product(search, postData = {}) {
		var data = postData;
		data.search = search;
		data.request_page = 'home';
		var ajaxReq = 'ToCancelPrevReq';
		var ajaxReq = $.ajax({
			url: "<?= base_url() ?>" + 'Store/load_ProductHome',
			type: 'POST',
			dataType: 'JSON',
			data: data,
			beforeSend: function() {
				if (ajaxReq != 'ToCancelPrevReq' && ajaxReq.readyState < 4) {
					ajaxReq.abort();
				}
				$('.btn-search').addClass('btn-loading');
			},
			complete: function() {
				$('.btn-search').removeClass('btn-loading');
			},
			success: function(res) {
				if (res.trendings) {
					if (postData.next_page && postData.next_page > 1) {
						$('.product-list-trending').append(Mustache.render($('#product-list-template').html(), res.trendings));
					} else {
						$('.product-list-trending').html(Mustache.render($('#product-list-template').html(), res.trendings));
					}
					$('.see-more-trendings').data('next_page', res.trendings.next_page);
					if (res.trendings.is_last_page) {
						$('.see-more-trendings').hide();
					}
				}

				if (res.new) {
					if (postData.next_page && postData.next_page > 1) {
						$('.product-list-new').append(Mustache.render($('#product-list-template').html(), res.new));
					} else {
						$('.product-list-new').html(Mustache.render($('#product-list-template').html(), res.new));
					}
					$('.see-more-new').data('next_page', res.new.next_page);
					if (res.new.is_last_page) {
						$('.see-more-new').hide();
					}
				}

				if (res.category.new && res.category.new.length) {
					$('.home-new-products .category-listing').html(res.category.new);
				}

				if (res.category.all && res.category.all.length) {
					$(".demo-cat-badge").hide();
				}
			}
		});
	}
</script>