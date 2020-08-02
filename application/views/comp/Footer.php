<html>

<div class="custom-footer">
  <div class="contact">
    <div class="logo">
      <span class="img"></span>
    </div>
    <ul class="list-info">
      <li class="item name">Công ty TNHH Hải sản Bình Minh</li>
      <li class="item address">Chi nhánh 1: Số 1 Võ Văn Ngân, Thủ Đức, Tp. Hồ Chí Minh</li>
      <li class="item address">Chi nhánh 2: Số 210/5 Cao Văn Lâu, Quận 8, Tp. Hồ Chí Minh</li>
    </ul>
  </div>
  <!-- <div class="info">
    <div class="title">Về chúng tôi</div>
    <ul class="list-info">
      <li class="item">Chính sách giao nhận hàng</li>
      <li class="item">Chính sách đổi trả</li>
    </ul>
  </div> -->
</div>

<!--Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml: true,
      version: 'v7.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="101485071604686">
</div> -->

<body>
  <script>
    $(document).ready(() => {
      var view_port_height = $(window).height();
      var body_height = parseInt($('body').height());
      if (view_port_height > body_height) {
        $('.custom-footer').addClass('bottom');
      }
    });

    function buyNow(id, soluong, gia) {
      addToCart(id, soluong, gia, checkOut);
    }

    function checkOut() {
      window.location.href = '<?php echo base_url() ?>gio-hang.html'
    }

    function getNumberBuy() {
      var inputNumber = document.getElementById("count");
      return inputNumber.value;
    }
  </script>
</body>

</html>