<?php
get_header();
$images = get_template_directory_uri() . '/assets/images';
?>
  <main class="news-page">
    <div class="breadcrumb">
      <div class="breadcrumb-container container">
        <div class="breadcrumb-inner">
          <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
              <a href="/" class="breadcrumb-link">
                Trang chủ
              </a>
            </li>
            <li class="breadcrumb-item">
              <a href="/products/" class="breadcrumb-link">
                Sản phẩm
              </a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">
              <?php the_title(); ?>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
	  <?php
	  while ( have_posts() ) : the_post();
		  $detailImages = hc_product_gallery();
		  ?>
        <div class="detail-temp">
          <div class="detail-temp__container container">
            <div class="detail-temp__content">
              <div class="product-detail-head">
                <div class="product-detail-left js-animate">
                  <div class="product-detail-slider js-product-detail-slider">
                    <?php foreach ($detailImages as $image) : ?>
                    <div>
                      <img src="<?= esc_url( $image['src'] ) ?>" alt="<?= esc_attr( $image['alt'] ) ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>">
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php // Single image (no gallery → featured image only): no thumbnail nav ?>
                  <?php if ( count( $detailImages ) > 1 ) : ?>
                  <div class="product-detail-nav-wrap js-product-detail-nav-wrap">
                    <button type="button" class="product-detail-nav__arrow product-detail-nav__arrow--prev js-product-detail-nav-prev" aria-label="Ảnh trước"></button>
                    <ul class="product-detail-nav js-product-detail-slider-nav">
                      <?php foreach ($detailImages as $index => $image) : ?>
                      <li class="product-detail-nav__item<?= $index === 0 ? ' active' : '' ?>">
                        <button type="button" class="product-detail-nav__btn" aria-label="Xem ảnh <?= $index + 1 ?>"<?= $index === 0 ? ' aria-current="true"' : '' ?>>
                          <img src="<?= esc_url( $image['thumb'] ) ?>" alt="" width="100" height="100">
                        </button>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                    <button type="button" class="product-detail-nav__arrow product-detail-nav__arrow--next js-product-detail-nav-next" aria-label="Ảnh tiếp theo"></button>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="product-detail-right js-animate">
                  <h2 class="product-detail-name"><?php the_title(); ?></h2>
                  <p class="product-tag">
                    <span class="product-tag__item">#Túi zip</span>
                    <span class="product-tag__item">#Túi may mặc OPP, PE</span>
                    <span class="product-tag__item">#Túi bóng kính PP</span>
                    <span class="product-tag__item">#Túi dựng sản phẩm y tế</span>
                  </p>

                  <ul class="product-policy">
                    <li class="product-policy__item">
                      <span class="product-policy__title">Cam kết chất lượng</span>
                      <p class="product-policy__text">Sản phầm ứng dụng da dạng trong nhiều lĩnh vực vì tính dễ tái chế
                        và thân thiện với môi trường</p>
                    </li>
                    <li class="product-policy__item">
                      <span class="product-policy__title">Chi phí rẻ và thấp nhất</span>
                      <p class="product-policy__text">Chúng tôi cam kết cung cấp dịch vụ với chất lượng tốt nhất, giá
                        thành hợp lý nhất</p>
                    </li>
                    <li class="product-policy__item">
                      <span class="product-policy__title">Phục vụ tận tâm</span>
                      <p class="product-policy__text">Đội ngũ nhân viên giàu kinh nghiệm, nhiệt tình, chuyên nghiệp phục
                        vụ khách hàng 24/7</p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-detail js-animate">
                <h3 class="product-detail__heading">Chi tiết sản phẩm</h3>
                <p class="news-detail__slug">
                  <?= get_the_excerpt() ?>
                </p>
                <article class="product-detail__content">
                  <?php the_content(); ?>
                </article>
              </div>
            </div>
			  <?php echo get_template_part( 'blocks/sidebar-product-detail' ); ?>
          </div>
        </div>
	  <?php
	  endwhile;
	  ?>

	  <?php echo get_template_part( 'blocks/banner' ); ?>
	  <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();