<html>

<div class="custom-footer">
  <div class="contact">
    <div class="logo">
      <img src="" />
    </div>
    <ul class="list-info">
      <li class="item name">Hải sản Bình Minh
        <span>Chân trời hải sản tươi sống</span>
      </li>
      <li class="item phone">0123456789</li>
    </ul>
  </div>
  <div class="info">
    <div class="title">Danh mục sản phẩm</div>
    <ul class="list-info">
      <li class="item"></li>
      <li class="item"></li>
      <li class="item"></li>
      <li class="item"></li>
    </ul>
  </div>
  <div class="info">
    <div class="title"></div>
    <ul class="list-info">
      <li class="item"></li>
      <li class="item"></li>
      <li class="item"></li>
      <li class="item"></li>
    </ul>
  </div>
</div> 

<!-- Load Facebook SDK for JavaScript -->
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
</div>

<body>
  <script>
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