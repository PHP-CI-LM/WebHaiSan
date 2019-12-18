<html>

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