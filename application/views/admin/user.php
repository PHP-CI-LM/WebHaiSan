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
	<?php require("comp/nav.php") ?>


	<!-- Right side -->
	<div id="rightSide">

		<!-- Account panel top -->
		<?php require("comp/topNav.php") ?>

		<!-- Main content -->
		<!-- Common view -->
		<!-- Title area -->
		<div class="titleArea">
			<div class="wrapper">
				<div class="pageTitle">
					<h5>Thành viên</h5>
					<span>Quản lý thành viên</span>
				</div>

				<div class="horControlB menu_action">
					<ul>
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
					<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
					<h6>Danh sách Thành viên</h6>
					<!-- <div class="num f12">Tổng số: <b>0</b></div> -->
				</div>

				<form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form" name="filter">
					<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
						<thead>
							<tr>
								<td style="width:10px;"><img src="<?php echo public_url() ?>/images/icons/tableArrows.png" /></td>
								<td style="width:45px;">Mã số</td>
								<td style="width:200px;">Tên</td>
								<td style="width:45px;">Giới tính</td>
								<td style="width:100px;">Điện thoại</td>
								<td style="width:300px;">Địa chỉ</td>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan="7">
									<div class='pagination'>
									</div>
								</td>
							</tr>
						</tfoot>
						<tbody>
							<!-- Filter -->
							<?php
							if ($data == !null && isset($data) && sizeof($data) > 0)
								foreach ($data as $row) {
									?>
								<tr>
									<td><input type="checkbox" name="id[]" value="16" /></td>

									<td class="textC"><?php echo $row['CustomerID'] ?></td>
									<td><span title="" class="tipS">
											<?php echo $row['CustomerName'] ?> </span></td>
									<td><span title="" class="tipS">
											<?php echo $row['Sex'] ?></span></td>
									<td>
										<?php echo $row['Phone'] ?></td>
									<td>
										<?php echo $row['Address'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</form>
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