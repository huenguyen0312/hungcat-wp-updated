<?php
// /policy/ (rewrite in inc/static-pages.php), taken from hungcat-static pages/policy/index.ejs
get_header();
$hotline = hc_contact( 'contact_hotline' );
$cskh    = hc_contact( 'contact_cskh' );

// id of each heading is the anchor used by the footer links: /policy/#<id>
$policies = array(
	array( 'id' => 'bao-hanh', 'title' => 'Chính sách bảo hành' ),
	array( 'id' => 'giao-nhan-hang', 'title' => 'Giao hàng và nhận hàng' ),
	array( 'id' => 'thanh-toan', 'title' => 'Phương thức thanh toán' ),
	array( 'id' => 'doi-tra', 'title' => 'Chính sách đổi trả' ),
	array( 'id' => 'kiem-hang', 'title' => 'Chính sách kiểm hàng' ),
);
$hotline_link = '<a href="tel:' . esc_attr( hc_tel( $hotline ) ) . '">' . esc_html( $hotline ) . '</a>';
$cskh_link    = '<a href="tel:' . esc_attr( hc_tel( $cskh ) ) . '">' . esc_html( $cskh ) . '</a>';
?>
  <main class="policy-page">
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
              <span class="breadcrumb-link">Chính sách khách hàng</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <section class="policy">
      <div class="policy-container container">
        <h1 class="policy-title">Chính sách khách hàng</h1>
        <p class="policy-lead">Bao bì Hưng Cát luôn đặt quyền lợi của khách hàng lên hàng đầu. Vui lòng đọc kỹ các chính sách dưới đây trước khi đặt hàng. Nếu có bất kỳ thắc mắc nào, hãy liên hệ Hotline <?= $hotline_link ?> hoặc CSKH <?= $cskh_link ?> để được hỗ trợ.</p>

        <div class="policy-layout">
          <nav class="policy-toc" aria-label="Mục lục chính sách">
            <p class="policy-toc__title">Nội dung</p>
            <ol class="policy-toc__list">
              <?php foreach ( $policies as $index => $item ) : ?>
              <li class="policy-toc__item">
                <a href="#<?= $item['id'] ?>" class="policy-toc__link js-anchor js-policy-toc-link">
                  <span class="policy-toc__number"><?= sprintf( '%02d', $index + 1 ) ?></span><?= $item['title'] ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ol>
          </nav>

          <div class="policy-body">
            <!-- 01. Chính sách bảo hành -->
            <section class="policy-section">
              <h2 class="policy-section__title" id="<?= $policies[0]['id'] ?>"><span class="policy-section__number" aria-hidden="true">01</span><?= $policies[0]['title'] ?></h2>
              <div class="policy-section__content">
                <p>Tất cả sản phẩm bao bì do Hưng Cát sản xuất đều được kiểm tra chất lượng trước khi xuất xưởng và được bảo hành theo các điều kiện sau:</p>
                <h3>Điều kiện bảo hành</h3>
                <ul>
                  <li>Sản phẩm sai quy cách so với đơn đặt hàng đã xác nhận: kích thước, độ dày, màu sắc, chất liệu.</li>
                  <li>Lỗi in ấn do nhà sản xuất: in lệch, nhòe mực, sai nội dung so với bản thiết kế đã duyệt.</li>
                  <li>Lỗi kỹ thuật trong quá trình sản xuất: hở đường hàn, rách, thủng, khóa zip không kín.</li>
                </ul>
                <h3>Trường hợp không được bảo hành</h3>
                <ul>
                  <li>Sản phẩm bị hư hỏng do bảo quản không đúng cách (để nơi ẩm ướt, nhiệt độ cao, ánh nắng trực tiếp).</li>
                  <li>Sản phẩm được sử dụng sai mục đích hoặc vượt quá tải trọng khuyến nghị.</li>
                  <li>Nội dung in sai do bản thiết kế khách hàng đã duyệt có lỗi.</li>
                </ul>
                <p class="policy-note">Thời hạn tiếp nhận yêu cầu bảo hành là <strong>07 ngày</strong> kể từ ngày nhận hàng. Vui lòng cung cấp hình ảnh, video sản phẩm lỗi và mã đơn hàng khi gửi yêu cầu.</p>
              </div>
            </section>

            <!-- 02. Giao hàng và nhận hàng -->
            <section class="policy-section">
              <h2 class="policy-section__title" id="<?= $policies[1]['id'] ?>"><span class="policy-section__number" aria-hidden="true">02</span><?= $policies[1]['title'] ?></h2>
              <div class="policy-section__content">
                <h3>Phạm vi và thời gian giao hàng</h3>
                <ul>
                  <li>Hưng Cát giao hàng trên toàn quốc thông qua xe của công ty hoặc đơn vị vận chuyển uy tín.</li>
                  <li>Thời gian sản xuất và giao hàng được thống nhất cụ thể trong báo giá hoặc hợp đồng, tùy theo số lượng và quy cách đơn hàng.</li>
                  <li>Trường hợp giao hàng chậm so với cam kết, Hưng Cát sẽ thông báo trước cho khách hàng và thống nhất phương án xử lý.</li>
                </ul>
                <h3>Chi phí vận chuyển</h3>
                <p>Chi phí vận chuyển được tính theo khối lượng, khoảng cách và được báo rõ trong báo giá trước khi khách hàng xác nhận đơn hàng.</p>
                <h3>Khi nhận hàng</h3>
                <ul>
                  <li>Kiểm tra số lượng kiện hàng, tình trạng bao bì đóng gói bên ngoài so với phiếu giao hàng.</li>
                  <li>Ký xác nhận vào biên bản giao nhận. Nếu kiện hàng bị móp, rách, ướt, vui lòng ghi chú tình trạng vào biên bản và chụp ảnh lại trước khi ký nhận.</li>
                </ul>
              </div>
            </section>

            <!-- 03. Phương thức thanh toán -->
            <section class="policy-section">
              <h2 class="policy-section__title" id="<?= $policies[2]['id'] ?>"><span class="policy-section__number" aria-hidden="true">03</span><?= $policies[2]['title'] ?></h2>
              <div class="policy-section__content">
                <p>Khách hàng có thể lựa chọn một trong các hình thức thanh toán sau:</p>
                <ul>
                  <li><strong>Chuyển khoản ngân hàng:</strong> thông tin tài khoản được ghi trên báo giá hoặc hợp đồng. Vui lòng ghi rõ tên công ty và mã đơn hàng trong nội dung chuyển khoản.</li>
                  <li><strong>Tiền mặt:</strong> thanh toán trực tiếp tại văn phòng công ty hoặc khi nhận hàng (áp dụng theo thỏa thuận).</li>
                </ul>
                <h3>Tiến độ thanh toán</h3>
                <ul>
                  <li>Đặt cọc khi xác nhận đơn hàng để Hưng Cát tiến hành chuẩn bị nguyên liệu và sản xuất.</li>
                  <li>Thanh toán phần còn lại khi nhận hàng hoặc theo thời hạn công nợ được thỏa thuận trong hợp đồng.</li>
                </ul>
                <p class="policy-note">Hưng Cát xuất hóa đơn VAT đầy đủ theo yêu cầu của khách hàng.</p>
              </div>
            </section>

            <!-- 04. Chính sách đổi trả -->
            <section class="policy-section">
              <h2 class="policy-section__title" id="<?= $policies[3]['id'] ?>"><span class="policy-section__number" aria-hidden="true">04</span><?= $policies[3]['title'] ?></h2>
              <div class="policy-section__content">
                <h3>Trường hợp được đổi trả</h3>
                <ul>
                  <li>Sản phẩm bị lỗi do nhà sản xuất hoặc không đúng quy cách đã thỏa thuận.</li>
                  <li>Giao sai mẫu mã, sai số lượng so với đơn đặt hàng.</li>
                </ul>
                <h3>Quy trình đổi trả</h3>
                <ol>
                  <li>Liên hệ CSKH trong vòng <strong>07 ngày</strong> kể từ ngày nhận hàng, cung cấp mã đơn hàng cùng hình ảnh hoặc video sản phẩm lỗi.</li>
                  <li>Hưng Cát kiểm tra, xác nhận lỗi và thông báo phương án xử lý: sản xuất bù, đổi hàng hoặc hoàn tiền phần hàng lỗi.</li>
                  <li>Hàng đổi trả cần được giữ nguyên tình trạng như khi nhận, chưa qua sử dụng.</li>
                </ol>
                <p class="policy-note">Hưng Cát chịu toàn bộ chi phí vận chuyển đối với hàng đổi trả do lỗi của nhà sản xuất. Sản phẩm in theo thiết kế riêng của khách hàng không áp dụng đổi trả vì lý do thay đổi nhu cầu.</p>
              </div>
            </section>

            <!-- 05. Chính sách kiểm hàng -->
            <section class="policy-section">
              <h2 class="policy-section__title" id="<?= $policies[4]['id'] ?>"><span class="policy-section__number" aria-hidden="true">05</span><?= $policies[4]['title'] ?></h2>
              <div class="policy-section__content">
                <p>Khách hàng được quyền kiểm tra hàng hóa khi nhận hàng, trước khi thanh toán phần còn lại của đơn hàng.</p>
                <h3>Nội dung kiểm tra</h3>
                <ul>
                  <li>Số lượng kiện hàng và số lượng sản phẩm theo phiếu giao hàng.</li>
                  <li>Quy cách sản phẩm: kích thước, độ dày, màu sắc, nội dung in theo mẫu đã duyệt.</li>
                  <li>Chất lượng ngoại quan: đường hàn, bề mặt in, khóa zip (nếu có).</li>
                </ul>
                <h3>Kiểm tra trong quá trình sản xuất</h3>
                <p>Với đơn hàng số lượng lớn, khách hàng có thể đề nghị duyệt mẫu trước khi sản xuất hàng loạt hoặc đến trực tiếp nhà máy tại <?= esc_html( hc_contact( 'contact_address' ) ) ?> để kiểm tra.</p>
                <p class="policy-note">Nếu phát hiện sai sót khi kiểm hàng, vui lòng ghi chú vào biên bản giao nhận và liên hệ ngay Hotline <?= $hotline_link ?> để được xử lý kịp thời.</p>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php
get_footer();
