    <header>
        <div class="container toplink">
            <div class="row">
                <div class="col-sm-12">
                    <span class="phone">
                        <i class="fa fa-phone"></i>
                        Liên hệ:
                        <?php echo preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", "0123456789") ?>
                    </span>
                    <span class="checkOrder f-right">
                        <a href="<?php echo base_url() ?>kiem-tra-don-hang.html">
                            <i class="fa fa-bullseye"></i>
                            Tra cứu đơn hàng
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Thanh topbar -->
        <div class="container-fluid">
            <div class="container topbar">
                <div class="row">
                    <?php
                    $strSearch = "";
                    if (isset($query) == true) {
                        $strSearch = $query;
                    }
                    ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-ms-8">
                        <form action="<?php echo base_url() ?>tim-kiem.html" method="GET" class="search-bar clearfix" id="search-textbox\">
                            <input name="query" type="text" autocomplete="off" id="Search" value="<?php echo $strSearch ?>" placeholder="Nhập thứ muốn tìm ..." style="border: 1px solid #dcdcdc; border-radius: 0;"></input> <span><button type="submit">
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
                                            <?php
                                            $user = $this->session->tempdata('user');
                                            if (null == $user) {
                                                echo '<span>Đăng nhập</span><br>';
                                                echo '<span style="font-size: 1.15rem; font-weight: 500;">Đăng ký</span>';
                                            } else {
                                                echo '<span>Thông tin</span><br>';
                                                echo '<span style="font-size: 1.15rem; font-weight: 500;">Đăng xuất</span>';
                                            }
                                            ?>
                                        </span>
                                    </a>
                                </span>
                                <div class="right-dropdown-content">
                                    <?php
                                    if ($user === null) {
                                        echo '<a class="item" href="' . base_url() . 'dang-nhap.html?backUrl=' . urlencode(current_url()) . '">Đăng nhập</a>';
                                        echo '<a class="item" href="' . base_url() . 'dang-ky-thanh-vien.html">Đăng ký tài khoản</a>';
                                    } else {
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
                            if (!isset($page) || $page == 'Home') {
                                echo "<li class=\"nav-item nav-item-lv1 active\"><a class=\"nav-link\" href=\"" . base_url() . "\">Trang chủ</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"" . base_url() . "chinh-sach.html\">Chính sách</a></li>";
                            } else
                            if (isset($page) && $page == 'Policy') {
                                echo "<li class=\"nav-item nav-item-lv1\"><a class=\"nav-link\" href=\"" . base_url() . "\">Trang chủ</a></li>";
                                echo "<li class=\"nav-item nav-item-lv1 active\"><a class=\"nav-link\" href=\"" . base_url() . "chinh-sach.html\">Chính sách</a></li>";
                            }
                            ?>
                        </ul>
                        <div class="nav nav-toggle">
                            <button id="btn-toggle">
                                <i class="fa fa-align-justify"></i>
                            </button>
                            <div class="toggle-content">
                                <?php
                                echo "<a class=\"toggle-item\" href=\"" . base_url() . "\">Trang chủ</a>";
                                echo "<a class=\"toggle-item\" href=\"" . base_url() . "chinh-sach.html\">Chính sách</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="over"></div>
    </header>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn-toggle").click(function() {
                // Enable toggle content
                $("#btn-toggle").next().animate({
                    "left": "0"
                }, 100);
                $("#btn-toggle").next().animate({
                    "width": "300px"
                }, 100);
                $('.over').css({
                    "height": "100%"
                });
            });

            $(".over").click(function() {
                // Disable toggle content
                $("#btn-toggle").next().animate({
                    "left": "-2px"
                }, 100);
                $("#btn-toggle").next().animate({
                    "width": "0px"
                }, 100);
                $('.over').css({
                    "height": "0"
                });
            });
        });

        $('.dropdown span').click(function(e) {
            e.preventDefault();
            if ($(".dropdown .right-dropdown-content").css("display") === "none") {
                $(".dropdown .right-dropdown-content").css({
                    "display": "block"
                });
                $(".dropdown .right-dropdown-content").animate({
                    "opacity": "1.0"
                }, 100);
            } else {
                $(".dropdown .right-dropdown-content").css({
                    "display": "none"
                });
                $(".dropdown .right-dropdown-content").animate({
                    "opacity": "0"
                }, 100);
            }
        });
    </script>