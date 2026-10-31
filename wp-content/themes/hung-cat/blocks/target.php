<?php
$targets = array(
  array(
    'icon_name'   => 'public',
    'heading'     => 'Cam kết chất lượng',
    'description' => 'Sản phầm ứng dụng da dạng trong nhiều lĩnh vực vì tính dễ tái chế và thân thiện với môi trường',
  ),
  array(
    'icon_name'   => 'savings',
    'heading'     => 'Chi phí rẻ và thấp nhất',
    'description' => 'Chúng tôi cam kết cung cấp dịch vụ với chất lượng tốt nhất, giá thành hợp lý nhất',
  ),
  array(
    'icon_name'   => 'support_agent',
    'heading'     => 'Phục vụ tận tâm',
    'description' => 'Đội ngũ nhân viên giàu kinh nghiệm, nhiệt tình, chuyên nghiệp phục vụ khách hàng 24/7',
  ),
);
?>
<section class="target">
  <div class="target-container container">
    <div class="target-column js-animate">
      <p class="target-text"><b>Công Ty Bao bì Hưng Cát</b> tự hào là đơn vị hàng đầu trong lĩnh vực sản xuất in ấn bao bì, túi nilon giá rẻ tại miền Bắc, với cam kết mang đến cho khách hàng những dịch vụ chất lượng và giá cả cạnh tranh nhất. Chúng tôi:</p>
      <p class="target-text target-text--blue target-text--medium mt-[30px]">
        - MIỄN PHÍ thiết kế mẫu in bao bì theo yêu cầu<br>
        - Báo giá sỉ rẻ cực kỳ cạnh tranh<br>
        - Sản xuất túi PE, PP chất lượng.<br>
        - Công nghệ in ấn sắc nét<br>
        - Độ bền cao, thân thiện môi trường<br>
        - Giao hàng trên toàn quốc<br>
      </p>
      <div class="target-button">
        <a href="#contact" class="button js-anchor">Liên hệ tư vấn</a>
      </div>
    </div>
    <div class="target-column js-animate">
      <ul class="target-list">
        <?php foreach ($targets as $target) : ?>
        <li class="target-item">
          <span class="material-symbols-outlined target-icon"><?= $target['icon_name']?></span>
          <h3 class="target-title"><?= $target['heading']?></h3>
          <p class="target-text target-text--sm"><?= $target['description']?></p>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
