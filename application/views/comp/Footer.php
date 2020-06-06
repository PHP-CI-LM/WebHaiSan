<html>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v6.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<!-- Your customer chat code -->
	<div class="fb-customerchat" attribution=setup_tool page_id="100722644961244" theme_color="#ffc300" logged_in_greeting="Hi! How can we help you?" logged_out_greeting="Hi! How can we help you?">
	</div>
<body>
    <script>
        function buyNow(id, soluong, gia) {
            addToCart(id, soluong, gia, checkOut);
        }

        function checkOut() {
            window.location.href = '<?php echo base_url()?>gio-hang.html'
        }

        function getNumberBuy() {
            var inputNumber = document.getElementById("count");
            return inputNumber.value;
        }
    </script>
</body>

</html>