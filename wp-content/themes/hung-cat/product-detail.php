<?php
get_header();
$images = get_template_directory_uri() . '/assets/images';
$product_name = 'Túi zip chỉ đỏ';
$slides = array_fill( 0, 5, 'product-sample.webp' );
$tags = array( '#Túi zip', '#Túi may mặc OPP, PE', '#Túi bóng kính PP', '#Túi dựng sản phẩm y tế' );
$policies = array(
  array(
    'title' => 'Cam kết chất lượng',
    'text'  => 'Sản phầm ứng dụng da dạng trong nhiều lĩnh vực vì tính dễ tái chế và thân thiện với môi trường',
  ),
  array(
    'title' => 'Chi phí rẻ và thấp nhất',
    'text'  => 'Chúng tôi cam kết cung cấp dịch vụ với chất lượng tốt nhất, giá thành hợp lý nhất',
  ),
  array(
    'title' => 'Phục vụ tận tâm',
    'text'  => 'Đội ngũ nhân viên giàu kinh nghiệm, nhiệt tình, chuyên nghiệp phục vụ khách hàng 24/7',
  ),
);
$related_products = array(
  array( 'image' => 'product-sample.webp', 'title' => "Product's name" ),
  array( 'image' => 'product-sample.webp', 'title' => "Product's name" ),
  array( 'image' => 'product-sample.webp', 'title' => "Product's name" ),
);
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
              <?= $product_name ?>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="detail-temp">
      <div class="detail-temp__container container">
        <div class="detail-temp__content">
          <div class="product-detail-head">
            <div class="product-detail-left">
              <div class="product-detail-slider js-product-detail-slider">
                <?php foreach ($slides as $slide) : ?>
                <div>
                  <img src="<?= $images ?>/<?= $slide ?>" alt="" width="648" height="359">
                </div>
                <?php endforeach; ?>
              </div>
              <div class="product-detail-nav-wrap js-product-detail-nav-wrap">
                <button type="button" class="product-detail-nav__arrow product-detail-nav__arrow--prev js-product-detail-nav-prev" aria-label="Ảnh trước"></button>
                <ul class="product-detail-nav js-product-detail-slider-nav">
                  <?php foreach ($slides as $index => $slide) : ?>
                  <li class="product-detail-nav__item<?= $index === 0 ? ' active' : '' ?>">
                    <button type="button" class="product-detail-nav__btn" aria-label="Xem ảnh <?= $index + 1 ?>"<?= $index === 0 ? ' aria-current="true"' : '' ?>>
                      <img src="<?= $images ?>/<?= $slide ?>" alt="" width="100" height="100">
                    </button>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <button type="button" class="product-detail-nav__arrow product-detail-nav__arrow--next js-product-detail-nav-next" aria-label="Ảnh tiếp theo"></button>
              </div>
            </div>
            <div class="product-detail-right">
              <h2 class="product-detail-name"><?= $product_name ?></h2>
              <p class="product-tag">
                <?php foreach ($tags as $tag) : ?>
                <span class="product-tag__item"><?= $tag ?></span>
                <?php endforeach; ?>
              </p>
              <ul class="product-policy">
                <?php foreach ($policies as $policy) : ?>
                <li class="product-policy__item">
                  <span class="product-policy__title"><?= $policy['title'] ?></span>
                  <p class="product-policy__text"><?= $policy['text'] ?></p>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <div class="product-detail">
            <h3 class="product-detail__heading">Chi tiết sản phẩm</h3>
            <div class="product-detail__content">
              <h3>1. Xưởng sản xuất túi zip chỉ đỏ</h3>
              <figure>
                <img src="<?= $images ?>/news/img/img-01.webp" alt="" width="648" height="359">
                <figcaption>Quy trình sản xuất túi zip chỉ đỏ của Hưng Cát</figcaption>
              </figure>
              <p>Túi zip chỉ đỏ là loại túi nilon được sản xuất 100% từ hạt nhựa nguyên sinh LDPE nên túi có độ bóng, dẻo dai tốt, không mùi, không độc hại, chịu được nhiệt độ tốt vô cùng an toàn để đựng thực phẩm. Đặc biệt túi zip đỏ còn có khả năng cách điện và có thể tái sử dụng được nhiều lần, bền chắc.</p>
              <figure>
                <img src="<?= $images ?>/news/img/img-02.webp" alt="" width="380" height="211">
                <figcaption>Quy trình sản xuất túi zip chỉ đỏ của Hưng Cát</figcaption>
              </figure>
              <h3>2. Những lưu ý để nhận báo giá sản xuất túi zip chỉ đỏ nhanh nhất</h3>
              <p>
                Để nhận báo giá sản xuất túi zip viền đỏ nhanh nhất, quý khách cần lưu ý những <br>
                thông tin như sau để tư vấn viên của chúng tôi hỗ trợ ngay nhé.<br><br>
                - Cung cấp thông tin chi tiết về mẫu thiết kế túi zip chỉ đỏ<br>
                Quý khách vui lòng cung cấp các thông tin chi tiết về kích thước, độ dày và thiết kế hình in mong muốn trên túi cho chúng tôi để đội ngũ nhân viên Hưng Cát thiết kế và chỉnh sửa mẫu miễn phí phù hợp nhu cầu của quý khách. Hoặc quý khách có thể cung cấp mẫu thiết kế in túi zip có sẵn của cửa hàng mình.<br><br>
                - Số lượng túi zip chỉ đỏ quý khách cần sản xuất<br>
                Quý khách cần sản xuất túi với số lượng bao nhiêu để chúng tôi có thể hỗ trợ báo giá thích hợp giúp quý khách tiết kiệm chi phí. Tại Hưng Cát, số lượng tối thiểu của đơn hàng chạy size riêng theo yêu cầu là từ 100kg/size và các size có sẵn là từ 25kg.<br><br>
                - Thời gian quý khách cần sản phẩm<br>
                Khi liên hệ đặt hàng, quý khách có thể đưa ra mốc thời gian cần hàng để chúng tôi sắp xếp và lên kế hoạch sản xuất phù hợp để kịp tiến độ giao hàng cho quý khách. Thời gian sản xuất dự kiến tại Hưng Cát trung bình từ 5 - 7 với số lượng tối thiểu 200kg.<br><br>
                - Quy cách đóng gói<br>
                Quý khách có thể đưa ra yêu cầu đóng gói bao nhiêu kg trong 1 bao hoặc tuân theo quy cách đóng gói thông dụng tại Hưng Cát là đóng 25kg/bao và đóng 10kg/cây.<br><br>
                - Chính sách giao hàng<br>
                Miễn phí vận chuyển đối với các đơn hàng giao nội thành TP Nam Định, ngoài khu vực sẽ tính thêm phí tùy vị trí.
              </p>
            </div>
            <p class="product-tag">
              <?php foreach ($tags as $tag) : ?>
              <span class="product-tag__item"><?= $tag ?></span>
              <?php endforeach; ?>
            </p>
          </div>
        </div>
        <div class="detail-temp__sidebar">
          <div class="related-product">
            <h3 class="related-product__heading">Sản phẩm khác</h3>
            <ul class="related-product__list">
              <?php foreach ($related_products as $related) : ?>
              <li class="related-product__item">
                <a href="/products/00/" class="related-product__content">
                  <div class="related-product__image">
                    <img src="<?= $images ?>/<?= $related['image'] ?>" alt="" width="100" height="100">
                  </div>
                  <h4 class="related-product__title"><?= $related['title'] ?></h4>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="news-banner">
            <img src="<?= $images ?>/about-us/img-01.webp" alt="" width="330" height="220">
          </div>

          <div class="news-sidebar-button">
            <a href="/contact/" class="button">Liên hệ tư vấn</a>
          </div>
        </div>
      </div>
    </div>

    <?php echo get_template_part( 'blocks/banner' ); ?>
    <?php echo get_template_part( 'blocks/customer' ); ?>
  </main>
<?php
get_footer();
