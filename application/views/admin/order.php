<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Chợ Hải Sản</title>

	<meta name="robots" content="noindex, nofollow" />

	<link rel="shortcut icon" href="<?php echo public_url() ?>/images/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/crown/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/css/css.css" media="screen" />


	<script type="text/javascript">
		var admin_url = '';
		var base_url = '';
		var public_url = '';
	</script>

	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/spinner/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/uniform.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/autogrowtextarea.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/datatable.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/tablesort.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/resizable.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.tipsy.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.progress.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.jgrowl.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.sourcerer.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/custom.js"></script>


	<script type="text/javascript" src="<?php echo public_url() ?>/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/scrollTo/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/number/jquery.number.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/zclip/jquery.zclip.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/colorbox/jquery.colorbox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/js/jquery/colorbox/colorbox.css" media="screen" />

	<script type="text/javascript" src="<?php echo public_url() ?>/js/custom_admin.js" type="text/javascript"></script>
</head>

<body>

	<!-- Left side content -->
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

					<a href="<?php echo base_url()?>admin" class="active" id="current">
						<span>Bảng điều khiển</span>
						<strong></strong>
					</a>


				</li>
				<li class="tran">

					<a href="admin/tran.html" class=" exp">
						<span>Quản lý bán hàng</span>
						<strong>1</strong>
					</a>

					<ul class="sub">
						<!-- <li>
							<a href="admin/tran.html">
								Giao dịch </a>
						</li> -->
						<li>
							<a href="<?php echo base_url()?>admin/order.html">
								Đơn hàng sản phẩm </a>
						</li>
					</ul>

				</li>
				<li class="product">

					<a href="admin/product.html" class=" exp">
						<span>Sản phẩm</span>
						<strong>1</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url()?>admin/product.html">
								Sản phẩm </a>
						</li>
						<!-- <li>
							<a href="admin/cat.html">
								Danh mục </a>
						</li>
						<li>
							<a href="admin/comment.html">
								Phản hồi </a>
						</li> -->
					</ul>

				</li>
				<li class="account">

					<a href="admin/account.html" class=" exp">
						<span>Tài khoản</span>
						<strong>1</strong>
					</a>

					<ul class="sub">
						<!-- <li>
							<a href="admin/admin.html">
								Ban quản trị </a>
						</li>
						<li>
							<a href="admin/admin_group.html">
								Nhóm quản trị </a>
						</li>-->
						<li> 
							<a href="<?php echo base_url()?>admin/user.html">
								Thành viên </a>
						</li>
					</ul>

				</li>
				<!-- <li class="support">

					<a href="admin/support.html" class=" exp">
						<span>Hỗ trợ và liên hệ</span>
						<strong>2</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="admin/support.html">
								Hỗ trợ </a>
						</li>
						<li>
							<a href="admin/contact.html">
								Liên hệ </a>
						</li>
					</ul>

				</li> -->
				<!-- <li class="content">

					<a href="admin/content.html" class=" exp">
						<span>Nội dung</span>
						<strong>4</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="admin/slide.html">
								Slide </a>
						</li>
						<li>
							<a href="admin/news.html">
								Tin tức </a>
						</li>
						<li>
							<a href="admin/info.html">
								Trang thông tin </a>
						</li>
						<li>
							<a href="admin/video.html">
								Video </a>
						</li>
					</ul>

				</li> -->

			</ul>

		</div>
		<div class="clear"></div>
	</div>


	<!-- Right side -->
	<div id="rightSide">

		<!-- Account panel top -->

		<div class="topNav">
			<div class="wrapper">
				<div class="welcome">
					<span>Xin chào: <b>admin!</b></span>
				</div>

				<div class="userNav">
					<ul>
						<li><a href="" target="_blank">
								<img style="margin-top:7px;" src="<?php echo public_url() ?>/images/icons/light/home.png" />
								<span>Trang chủ</span>
							</a></li>

						<!-- Logout -->
						<li><a href="<?php echo base_url()?>admin/logout.html">
								<img src="<?php echo public_url() ?>/images/icons/topnav/logout.png" alt="" />
								<span>Đăng xuất</span>
							</a></li>

					</ul>
				</div>

				<div class="clear"></div>
			</div>
		</div>

		<!-- Main content -->

		<!-- Common -->
		<!-- Title area -->
		<div class="titleArea">
			<div class="wrapper">
				<div class="pageTitle">
					<h5>Đơn hàng sản phẩm</h5>
					<span>Quản lý đơn hàng</span>
				</div>

				<div class="horControlB menu_action">
					<ul>
							<!-- 
						<li><a href="admin/product_order.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/list.png" />
								<span>Danh sách</span>
							</a></li> -->
							<!-- 
						<li><a href="">
								<img src="<?php echo public_url() ?>/images/excel.png" />
								<span>Xuất file excel</span>
							</a></li> -->
					</ul>
				</div>

				<div class="clear"></div>
			</div>
		</div>
		<div class="line"></div>

		<!-- Message -->






		<!-- Main content wrapper -->
		<div class="wrapper">

			<div class="widget">
				<div class="title">
					<span class="titleIcon"><img src="<?php echo public_url() ?>/images/icons/tableArrows.png" /></span>
					<h6>Danh sách Đơn hàng sản phẩm</h6>

					<!-- <div class="num f12">Tổng số: <b></b></div> -->
				</div>

				<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
					<thead class="filter">
						<tr>
							<td colspan="9">
								<form class="list_filter form" action="index.php/admin/product_order.html" method="get">
									<table cellpadding="0" cellspacing="0" width="100%">
										<tbody>

											<tr>
												<td class="label" style="width:60px;"><label for="filter_id">Mã số</label></td>
												<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:95px;" /></td>

												<td class="label" style="width:60px;"><label for="filter_type">Đơn hàng</label></td>
												<td class="item">
													<select name="status">
														<option value=""></option>
														<option value='0'>Đợi xử lý</option>
														<option value='1'>Đã gửi hàng</option>
														<option value='2'>Hủy bỏ</option>
													</select>
												</td>

												<td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
												<td class="item"><input name="created" value="" id="filter_created" type="text" class="datepicker" /></td>


												<td colspan='2' style='width:60px'>
													<input type="submit" class="button blueB" value="Lọc" />
													<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product_order.html'; ">
												</td>

											</tr>

											<tr>
												<td class="label" style="width:60px;"><label for="filter_user">Thành viên</label></td>
												<td class="item"><input name="user" value="" id="filter_user" class="tipS" title="Nhập mã thành viên" type="text" /></td>

												<td class="label"><label for="filter_status">Giao dịch</label></td>
												<td class="item">
													<select name="transaction_status">
														<option value=""></option>
														<option value='0'>Đợi xử lý</option>
														<option value='1'>Thành công</option>
														<option value='2'>Hủy bỏ</option>
													</select>
												</td>

												<td class="label"><label for="filter_created_to">Đến ngày</label></td>
												<td class="item"><input name="created_to" value="" id="filter_created_to" type="text" class="datepicker" /></td>

												<td class="label"></td>
												<td class="item"></td>
											</tr>

										</tbody>
									</table>
								</form>
							</td>
						</tr>
					</thead>
					<thead>
						<tr>
							<td style="width:60px;">Mã số</td>
							<td style="width:80px;">Sản phẩm</td>
							<td style="width:80px;">Giá</td>
							<td style="width:50px;">Số lượng</td>
							<td style="width:75px;">Tình trạng</td>
							<td style="width:200px;">Địa Chỉ</td>
							<td style="width:75px;">Ngày tạo</td>
						</tr>
					</thead>

					<tfoot class="auto_check_pages">
						<tr>
							<td colspan="9">

								<div class='pagination'>
									&nbsp;<strong>1</strong>&nbsp;<a href="admin/product_order/index/10">2</a>&nbsp;<a href="admin/product_order/index/10">Trang kế tiếp</a>&nbsp; </div>
							</td>
						</tr>
					</tfoot>
					<tbody class="list_item">
						<?php if ($data !== null && isset($data) && sizeof($data) > 0) {
							foreach ($data as $row) { ?>
								<tr class='row_20'>
									<td class="textC"><?php echo $row["OrderID"] ?></td>
									<td>
										<div class="<?php echo public_url() ?>/image_thumb">
									<img src="<?php echo $row['image_link'] ?>" height="50">
									<div class="clear"></div>
								</div> 
										<a href="product/view/8.html" class="tipS" title="" target="_blank">
											<b><?php echo $row["name_product"] ?></b>
										</a>
									</td>

									<td class="textR">
										<?php echo $row["Price"] ?>
									</td>

									<td class="textC"><?php echo $row["Amount"] ?></td>

									<td class="textC"><?php echo $row["Status"] ?></td>


									<td class="status textC">
										<span class="pending">
											<?php echo $row["DiaChi"] ?> </span>
									</td>

									<td class="status textC">
										<span class="pending">
											<?php echo $row["OrderDate"] ?> </span>
									</td>


								</tr>
						<?php }
						} ?>

					</tbody>

				</table>
			</div>

		</div>
		<div class="clear mt30"></div>

		<!-- Footer -->
		<div id="footer">
			<div class="wrapper">
				<div></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</body>

</html>