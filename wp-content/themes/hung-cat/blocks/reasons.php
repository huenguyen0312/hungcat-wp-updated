<?php
$reasons = array(
  array(
    'title'       => 'tư vấn 24/7',
    'description' => 'Đội ngũ nhân viên tư vấn hỗ trợ nhiệt tình. Luôn sát cánh đồng hành cùng doanh nghiệp',
    'icon'        => 'forum',
  ),
  array(
    'title'       => 'Chứng nhận tiêu chuẩn',
    'description' => 'Hưng Cát tuân thủ và áp dụng thành công tiêu chuẩn ISO 9001:2015 vào hệ thống quản lý chất lượng của mình',
    'icon'        => 'developer_guide',
  ),
  array(
    'title'       => 'Cam kết chất lượng',
    'description' => 'Top 10 Công ty sản xuất in ấn bao bì sản phẩm ổn định, uy tín hàng đầu tại Việt Nam',
    'icon'        => 'compost',
  ),
  array(
    'title'       => 'Đáp ứng tiến độ',
    'description' => 'Hưng Cát luôn cam kết sản xuất đúng tiến độ, đảm bảo cho mọi dự án của khách hàng',
    'icon'        => 'local_shipping',
  ),
);
?>
<section class="reasons">
  <div class="reasons-container container">
    <ul class="reasons-list">
      <?php foreach( $reasons as $reason ): ?>

      <li class="reasons-item js-animate">
        <div class="reasons-content">
          <span class="material-symbols-outlined text-base reasons-icon"><?= $reason['icon'] ?></span>
          <h3 class="reasons-title"><?= $reason['title'] ?></h3>
          <p class="reasons-description"><?= $reason['description'] ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
