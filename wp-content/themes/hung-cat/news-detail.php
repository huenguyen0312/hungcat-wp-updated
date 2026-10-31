<?php
get_header();
$images = get_template_directory_uri() . '/assets/images';
$news_title = 'Quy trình sản xuất túi zip';
$news_info = array(
  array( 'class' => 'news-detail__date', 'icon' => 'calendar_month', 'text' => '20/10/2021' ),
  array( 'class' => 'news-detail__category', 'icon' => 'category', 'text' => 'Tin tức' ),
  array( 'class' => 'news-detail__creator', 'icon' => 'person', 'text' => 'Hung Cat' ),
);
$related_news = array(
  array( 'image' => 'news-sample.webp', 'title' => 'Tiêu chuẩn Tuyên Bố Tái Chế (RCS)' ),
  array( 'image' => 'news-sample.webp', 'title' => 'Tiêu chuẩn Tuyên Bố Tái Chế (RCS)' ),
  array( 'image' => 'news-sample.webp', 'title' => 'Tiêu chuẩn Tuyên Bố Tái Chế (RCS)' ),
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
              <a href="/news/" class="breadcrumb-link">
                Tin tức
              </a>
            </li>
            <li class="breadcrumb-item">
              <span class="breadcrumb-link">
              <?= $news_title ?>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="detail-temp">
      <div class="detail-temp__container container">
        <div class="detail-temp__content">
          <h2 class="news-detail-title"><?= $news_title ?></h2>
          <div class="news-detail">
            <p class="news-detail__info">
              <?php foreach ($news_info as $info) : ?>
              <span class="<?= $info['class'] ?>"><span class="material-symbols-outlined"><?= $info['icon'] ?></span><?= $info['text'] ?></span>
              <?php endforeach; ?>
            </p>
            <p class="news-detail__slug">
              Túi zip chỉ đỏ là loại túi nilon được sản xuất 100% từ hạt nhựa nguyên sinh LDPE nên túi có độ bóng, dẻo dai tốt, không mùi, không độc hại, chịu được nhiệt độ tốt vô cùng an toàn để đựng thực phẩm
            </p>
            <div class="news-detail__content">
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

            <p class="news-detail__info news-detail__info--bottom">
              <?php foreach ($news_info as $info) : ?>
              <span class="<?= $info['class'] ?>"><span class="material-symbols-outlined"><?= $info['icon'] ?></span><?= $info['text'] ?></span>
              <?php endforeach; ?>
            </p>
          </div>
        </div>
        <div class="detail-temp__sidebar">
          <div class="related-news">
            <h3 class="related-news__heading">Tin tức liên quan</h3>
            <ul class="related-news__list">
              <?php foreach ($related_news as $related) : ?>
              <li class="related-news__item">
                <a href="/news/00/" class="related-news__content">
                  <div class="related-news__image">
                    <img src="<?= $images ?>/<?= $related['image'] ?>" alt="" width="330" height="220">
                  </div>
                  <h4 class="related-news__title"><?= $related['title'] ?></h4>
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
