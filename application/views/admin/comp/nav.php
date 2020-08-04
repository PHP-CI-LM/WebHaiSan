<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">

        <!-- Account panel -->

        <div class="sideProfile">
            <a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url() ?>/images/user.png" /></a>
            <span>Xin chào: <strong>admin!</strong></span>
            <span>ADMIN</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="<?php echo base_url() ?>ci-admin" class="active" id="current">
                    <span>Bảng điều khiển</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="ci-admin/tran.html" class=" exp">
                    <span>Quản lý bán hàng</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="<?php echo base_url() ?>ci-admin/order.html">
                            Thông tin đơn hàng</a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="<?php echo base_url() ?>ci-admin/product.html" class=" exp">
                    <span>Sản phẩm</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="<?php echo base_url() ?>ci-admin/product.html">
                            Sản phẩm </a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="<?php echo base_url() ?>ci-admin/user.html" class=" exp">
                    <span>Tài khoản</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="<?php echo base_url() ?>ci-admin/user.html">
                            Thành viên </a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="javascript:void(0)" class=" exp">
                    <span>Bình luận</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="<?php echo base_url() ?>ci-admin/comment.html">
                            Bình luận </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>ci-admin/comment/filter.html">
                            Lọc bình luận</a>
                    </li>
                </ul>

            </li>
        </ul>

    </div>
    <div class="clear"></div>
</div>