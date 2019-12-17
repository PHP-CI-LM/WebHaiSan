    <header>
        <!-- Thanh topbar -->
        <div class="container-fluid">

            <!-- Thanh tiêu để trên cùng dành cho màn hình trung bình và hẹp -->
            <div class="container topbar">
                <div class="row">
                    <?php
                    $isAdmin = false;
                    $strSearch = "";
                    if (strpos(uri_string(), "Manager") !== false)
                        $isAdmin = true;
                    if (isset($query) == true) {
                        $strSearch = $query;
                    }
                    ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-ms-8">
                        <form action="<?php echo base_url() ?>tim-kiem.html" method="GET" class="search-bar clearfix" id="search-textbox\">
                            <input name="query" type="text" id="Search" value="<?php echo $strSearch ?>" placeholder="Nhập thứ muốn tìm ..." style="border: 1px solid #dcdcdc; border-radius: 0;"></input> <span><button type="submit">
                                    <i class="fa fa-search" style="margin-top: 0"></i>
                                </button></span>
                        </form>
                        <div id="zoom-btn">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <ul class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-ms-4">
                        <ul class="icon-bar horizontal f-right">
                            <li class="icon dropdown">
                                <span>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-user"></i>
                                        <span class="title">
                                            <span>Đăng nhập</span>
                                            <br>
                                            <span style="font-size: 1.15rem; font-weight: 500;">Tài khoản</span>
                                        </span>
                                    </a>
                                </span>
                                <div class="right-dropdown-content">
                                    <?php
                                    $user = $this->session->tempdata('user');
                                    if ($user === null) {
                                        echo '<a class="item" href="' . base_url() . 'dang-nhap.html?backUrl=' . urlencode(current_url()) . '">Đăng nhập</a>';
                                        echo '<a class="item" href="' . base_url() . 'dang-ky-thanh-vien.html">Đăng ký tài khoản</a>';
                                    } else {
                                        if ($isAdmin) {
                                            echo '<li><a href="Manager/BangTin">Trang quản lý</a>';
                                        }
                                        echo '<a class="item" href="' . base_url() . 'user/thong-tin-tai-khoan.html' . '">Thông tin tài khoản</a>';
                                        echo '<a class="item" href="' . base_url() . 'dang-xuat.html">Đăng xuất</a>';
                                    }
                                    ?>
                                </div>
                            </li>
                            <li class="icon cart-icon">
                                <span>
                                    <a href="<?php echo base_url() ?>gio-hang.html">
                                        <i class="fa fa-briefcase" style="color: #363636"></i>
                                        <span class="title">Giỏ hàng</span>
                                    </a>
                                </span>
                                <span class="cart-count">
                                    <?php
                                    $count = 0;
                                    if (get_cookie("countProduct") != null) {
                                        $count = get_cookie("countProduct");
                                    }
                                    echo "<span id=\"number\">" . $count . "</span>";
                                    ?>
                                </span>
                            </li>
                        </ul>
                </div>
            </div>
        </div>

        <!-- Thanh menu -->
        <nav class="container" style="background: #FCFCFC">
            <!-- Menu -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-ms-12">
                    <div class="navbar" style="border: none;">
                        <ul class="nav nav-left">

                            <?php
                            if (!$isAdmin) {
                                echo "<li class=\"nav-item nav-item-lv1 active\"><a class=\"nav-link\" href=\"" . base_url() . "\">Trang chủ</a></li>";
                            } else {
                                echo "<li class=\"nav-item nav-item-lv1 active\"><a class=\"nav-link\" href=\"../Home\">Trang chủ</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"BangTin\">Bảng Tin</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"DonHang\">Đơn hàng</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"KhachHang\">Khách hàng</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"KhoSach\">Kho sách</a></li>";
                            }
                            ?>
                        </ul>
                        <div class="nav nav-toggle">
                            <button id="btn-toggle">
                                <i class="fa fa-align-justify"></i>
                            </button>
                            <div class="toggle-content">
                                <?php
                                if (!$isAdmin) {
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('" . base_url() . "')\"><a href=\"" . base_url() . "\">Trang chủ</a></span> ";
                                } else {
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('" . base_url() . "')\"><a href=\"" . base_url() . "\">Trang chủ</a></span> ";
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('BangTin')\"><a href=\"BangTin\">Bảng tin</a></span>";
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('DonHang')\"><a href=\"DonHang\">Đơn hàng</a></span>";
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('KhachHang')\"><a href=\"KhachHang\">Khách hàng</a></span>";
                                    echo "<span class=\"toggle-item\" style=\"cursor: pointer;\"";
                                    echo "onclick=\"gotoPage('KhoSach')\"><a href=\"KhoSach\">Kho sách</a></span>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <script type="text/javascript">
        $(document).ready(function() {

            var child = $(".nav.nav-left").children();
            $(child).removeClass("active");
            var url = location.href;

            if (url.indexOf("Categories") != -1) {
                if (url.indexOf("Categories?danhMuc=yeuthich") != -1) child.eq(1).addClass("active");
                else if (url.indexOf("Categories?danhMuc=banchay") != -1) child.eq(2).addClass("active");
            } else if (url.indexOf("Manager") == -1) child.eq(0).addClass("active");
            if (url.indexOf("Manager") != -1) {
                if (url.indexOf("BangTin") != -1) child.eq(1).addClass("active");
                else if (url.indexOf("DonHang") != -1) child.eq(2).addClass("active");
                else if (url.indexOf("KhachHang") != -1) child.eq(3).addClass("active");
                else if (url.indexOf("KhoSach") != -1 || url.indexOf("Sach") != -1) child.eq(4).addClass("active");
            } else child.eq(0).addClass("active");


            $("#btn-toggle").click(function() {
                var height = $("#btn-toggle").next().css("height");
                if (height == '0px') {
                    $("#btn-toggle").next().animate({
                        "height": "50%"
                    }, 450);
                } else {
                    $("#btn-toggle").next().animate({
                        "height": "0px"
                    }, 450);
                }
            });
        });

        $('.dropdown').click(function(e) {
            e.preventDefault();
            if ($(".dropdown .right-dropdown-content").css("display") === "none") {
                $(".dropdown .right-dropdown-content").css({
                    "display": "block"
                });
                $(".dropdown .right-dropdown-content").animate({
                    "opacity": "1.0"
                }, 100);
            } 
            else {
                $(".dropdown .right-dropdown-content").css({
                    "display": "none"
                });
                $(".dropdown .right-dropdown-content").animate({
                    "opacity": "0"
                }, 100);
            }
        });
    </script>