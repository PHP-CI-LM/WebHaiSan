<?php
function findChildren($comments, $nodeId = null)
{
	$size = sizeof($comments);
	$children = [];
	for ($i = 0; $i < $size; $i++) {
		if ($comments[$i]['id_reply'] == $nodeId) {
			array_push($children, $comments[$i]);
		}
	}
	return $children;
}

function drawTree($user, $comments, $comment, $product, $isReply, $level = 0)
{
	// Start tree
	if ($isReply == false) {
		echo '<ul class="comments-list">';
	} else {
		echo '<ul class="comments-list comment-reply">';
	}
	$level += 1;
	echo '<li class="comment" product-id="' . $product['id_product'] . '">';
	echo '<div class="comment-info">';
	echo '<span class="avatar">';
	if ($comment['avatar'] == null) {
		echo '<img src="' . base_url() . 'static/image/others/icon.svg" loading="lazy" data-src="' . base_url() . 'static/image/others/icon.svg" alt="Avatar">';
	} else {
		echo '<img src="' . base_url() . 'static/image/avatar/' . $comment['avatar'] . '" loading="lazy" data-src="' . base_url() . 'static/image/avatar/' . $comment['avatar'] . '" alt="Avatar" style="max-width: 40px; border-radius: 50%">';
	}
	echo '</span>';
	echo '<span class="content">';
	echo '<span class="info">';
	echo '<span class="name">' . $comment['name'];
	echo '<span class="time">' . $comment['time'] . '</span></span>';
	if ($user != null) {
		if ($user == $comment['AccountID']) {
			echo '<span class="detail"><i onclick="toggleDetailComment(this)" class="fa fa-ellipsis-h"></i>';
			echo '<ul class="hidden list-detail">';
			echo '<li><a id="editComment" href="">Chỉnh sửa</a></li>';
			echo '<li><a id="deleteComment" href="">Xóa</a></li>';
			echo '</ul>';
			echo '</span>';
		}
	}
	echo '</span>';
	echo '<span class="comment-content"><input cmid="' . $comment['id'] . '" class="edit-input" value="';
	echo $comment['content'];
	echo '" disabled/>';
	echo '</span>';
	if ($level < 2) {
		echo '<span class="feedback">';
		echo '<span class="reply"><a href="javascript:void(0)" onclick="showInput(this)">Trả lời</a></span>';
		echo '</span>';
		echo '</span>';
	}
	echo '</div>';
	// Draw children
	if ($level < 2) {
		$children = findChildren($comments, $comment['id']);
		$sizeChildren = sizeof($children);
		for ($i = 0; $i < $sizeChildren; $i++) {
			drawTree($user, $comments, $children[$i], $product, true, $level);
		}
	}
	// End tree
	echo '</li>';
	echo '<span class="reply-input hidden">';
	echo '<input type="text" placeholder="Nhập bình luận..." name="content" value="" reply-id="' . $comment['id'] . '" autocomplete="off"/>';
	echo '<input type="submit" value="Gửi" />';
	echo '</span>';
	echo '</ul>';
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo app_title() ?> - Thông tin chi tiết</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.min.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleView.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/BEM_Style.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/comment.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/ActionBook.min.js"></script>

</head>

<body>
	<!-- Phần header cho trang Web -->
	<?php require_once "comp/Header.php" ?>

	<div class="container-fluid" id="content" style="margin-left: 0; margin-right: 0;">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-top: 10px; margin-bottom: 5px;">
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
							</span>
						</a> <span><i class="fa fa-angle-right"></i></span>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() . "category/" . vn_to_str($product["name_category"]) . ".html" ?>"> <span itemprop="name" style="text-transform: capitalize"><?php echo $product["name_category"] ?>
							</span>
						</a> <span><i class="fa fa-angle-right"></i></span>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">
								<?php
								if ($product != null) {
									echo $product["name_product"];
								}
								?>
							</strong></a>
						<meta itemprop="position" content="3">
					</li>
				</ul>
			</div>
		</div>

		<div class="row" style="padding-left: 3rem; padding-right: 3rem;">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<article>
					<div class="board flex-board f-column">
						<div class="thumbnail">
							<?php
							if ($product != null) {
								echo "<img src=\"" . base_url() . "images/" . $product["DuongDan"] . "\" loading=\"lazy\" data-src=\"" . base_url() . "images/" . $product["DuongDan"] . "\" id=\"zoom-image\" style=\"content: url('" . base_url() . "images/" . $product["DuongDan"] . "');\">";
							}
							?>
						</div>
						<div style="padding-left: 2rem">
							<div id="info">
								<?php
								if ($product == null) {
									echo "<p class=\"error\">Sản phẩm không tồn tại</p>";
								} else {
									echo "<ul>";
									echo "<li>";
									echo "<div class=\"row\">";
									echo "<div class=\"col-xs-12\"><span style=\"font-size: 1.85rem; font-weight: 600\">" . $product["name_product"] . "</span></div></div></li>";
									echo "<li>";
									echo "<div class=\"row\">";
									echo "<div class=\"col-xs-12\">";
									echo "<span style=\"color: #d83808; font-size: 2.2rem; line-height: 1.5rem; margin-top: 15px;\">" . number_format((int) (($product["price"] * (100 - $product["discount"])) / 100)) . "đ";
									echo "<p style=\"display: block;color: #333; font-size: 1.35rem; margin-top: 15px;\">Giá gốc: <span style=\"font-weight: 700; text-decoration: line-through;\">" . number_format($product["price"]) . "đ</span></p>";
									echo "<p style=\"display: block;color: #333; font-size: 1.35rem; margin-top: 0px;\">Khuyến mãi: <span style=\"color: #00c4ff; font-weight: 700\">" . number_format((int) (($product["price"] * $product["discount"]) / 100)) . "đ (" . $product["discount"] . "%)</span></p>";
									echo "</span></div></div></li>";
									echo "<li>";
									echo "<div class=\"row\">";
									echo "<div class=\"col-xs-12\">";
									echo "<span>";
									echo "Nguồn gốc: " . $product["name_origin"];
									echo "</span></div>";
									echo "<div class=\"col-xs-12\">";
									echo "<span>";
									if (strlen($product["descript"]) > 0)
										echo $product["descript"];
									else
										echo "Đang cập nhật nội dung";
									echo "</span></div>";
									echo "<div class=\"col-xs-12\">";
									echo "<p style=\"display: block;\">";
									echo "Trọng lượng: " . $product["size"] . " " . $product["name_unit"];
									echo "</p>";
									if ($product["isDeliveredInDay"]) {
										echo "<p>";
										echo "Sản phẩm được giao trong ngày cho mọi tỉnh thành!" . "<a href=\"\" title=\"Xem chi tiết\" ></a>";
										echo "</p>";
									}
									echo "</div></div></li>";
								}
								?>
							</div>

							<div class="row" style="margin-top: 20px; margin-left: 6.5rem;">
								<span style="font-weight: 500; margin-right: 2rem;">Khối lượng (kg): </span>
								<div id="countInput" style="text-align: center;display: inline-block;">
									<input type="number" name="quantity" min="0.5" max="100" value="1" id="count" step="0.1" style="font-size: 1.5rem;padding: 0.6rem;">
								</div>
							</div>
							<div class="row" style="padding: 1rem 2rem;">
								<div class="col-xs-6" style="text-align: center">
									<div class="button-modify">
										<?php
										if ($product != null) {
											echo "<div class=\"button-rect forest\" style=\"width: 100%\" onclick='addToCart(\"" . $product["id_product"] . "\", getNumberBuy());'>";
											echo "<i class=\"fa fa-cart-plus\"></i>";
											echo "<span class=\"content content-inner\">Cho vào giỏ</span></div>";
										}
										?>
									</div>
								</div>
								<div class="col-xs-6" style="text-align: center">
									<div class="button-modify">
										<?php
										if ($product != null) {
											echo "<div class=\"button-rect danger\" style=\"width: 100%\" onclick='buyNow(\"" . $product["id_product"] . "\", getNumberBuy());'>";
											echo "<i class=\"fa fa-money\"></i>";
											echo "<span class=\"content content-inner\">Mua ngay</span></div>";
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>

			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="board mini-board">
					<div class="title">Sản phẩm tương tự</div>
					<ul class="content" style="overflow-y: scroll">
						<?php
						if ($similarProducts != null && sizeof($similarProducts) > 0) {
							$length = sizeof($similarProducts);
							foreach ($similarProducts as $sproduct) {
								echo '<a href="' . vn_to_str($sproduct["name_product"] . "-" . substr("00000" . $sproduct["id_product"], strlen("00000" . $sproduct["id_product"]) - 5, 5)) . ".html\">";
								echo "<li class=\"item\"><img src=\"" . base_url() . "images/" . $sproduct["DuongDan"] . "\" loading=\"lazy\" data-src=\"" . base_url() . "images/" . $sproduct["DuongDan"] . "\"></img> <span>" . $sproduct["name_product"];
								echo "</span></li></a>";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="board" id="board_comment" style="width: 98%; margin-left: 5px;">
						<p class="board__title">Đánh giá</p>
						<form action="<?php echo base_url(); ?>/comment.html" class="comment-form" product-id="<?php echo $product['id_product'] ?>">
							<div class="comments-container">
								<?php
								if (sizeof($comments) > 0 && $product != null) {
									$parentNodes = findChildren($comments);
									foreach ($parentNodes as $node) {
										drawTree($this->session->tempdata('user'), $comments, $node, $product, false);
									}
								}
								?>
							</div>
							<span class="comment-all">
								<input type="text" placeholder="Nhập bình luận..." name="content" value="" reply-id="-1" autocomplete="off" />
								<input type="submit" value="Gửi" />
							</span>
						</form>
					</div>
				</div>
			</div>
			<input class="hidden base_url" value="<?php echo base_url() ?>" />
		</div>
		<div id="open-modal" class="modal-window">
			<div>
				<span class="modal-close"><i class="fa fa-close"></i></span>
				<h1>Thông báo</h1>
				<div class="content">
					<img src="<?php echo base_url() ?>static/image/gif/loading.gif" loading="lazy" data-src="<?php echo base_url() ?>static/image/gif/loading.gif">
					<span class="label">Đang gửi bình luận</span>
				</div>
			</div>
		</div>
	</div>

	<?php require_once("comp/Footer.php") ?>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/ActionModal.min.js"></script>

	<script type="text/javascript">
		var inputFocused = null;
		var isEdited = false;

		function editComment(idComment, content) {
			showModal('Đang cập nhật bình luận');
			$.ajax({
				url: '<?= base_url() ?>comment/edit-comment',
				method: 'post',
				data: {
					'id_comment': idComment,
					'content': content
				},
				success: res => {
					let data = JSON.parse(JSON.stringify(res));
					if (typeof data == 'string' || data instanceof String) {
						data = JSON.parse(res);
					}
					if (true == data['status']) {
						alert('Chỉnh sửa bình luận thành công');
						window.location.reload();
					} else {
						hideModal();
						alert(data['message']);
					}
				}
			});
		}

		function deleteComment(idComment) {
			showModal('Đang xóa bình luận');
			$.ajax({
				url: '<?= base_url() ?>comment/remove-comment',
				method: 'post',
				data: {
					'id_comment': idComment
				},
				success: res => {
					let data = JSON.parse(JSON.stringify(res));
					if (typeof data == 'string' || data instanceof String) {
						data = JSON.parse(res);
					}
					if (true == data['status']) {
						alert('Xoá bình luận thành công');
						window.location.reload();
					} else {
						hideModal();
						alert(data['message']);
					}
				}
			});
		}

		function toggleDetailComment(element) {
			if ($(element).siblings('ul').length > 0) {
				var detail = $(element).siblings('ul');
				$(detail).toggleClass('hidden');
			}
		}

		$(document).ready(function() {
			let max_height = $('.board').height() - 2 * $('.board .title').height();

			$('.board ul.content').css({
				"max-height": max_height
			});


			$('body').on('click', event => {
				if (isEdited == true) {
					if (inputFocused != null) {
						var cmid = $(inputFocused).attr('cmid');
						var content = $(inputFocused).val();
						editComment(cmid, content);
						$(inputFocused).prop('disabled', 'true');
					}
					isEdited = false;
				}
			});

			$('.comment-info .info .detail ul li').on('click', event => {
				if ($(event.target).parents('.list-detail').hasClass('hidden') == false) {
					$(event.target).parents('.list-detail').addClass('hidden');
				}
			});

			$('.comment-info .info .detail ul li a').on('click', event => {
				event.preventDefault();
				var id = $(event.target).attr('id');
				if (id == 'editComment') {
					var content = $($(event.target).parents('.content')[0]).find('.comment-content')[0];
					var input = $(content).find('input')[0];
					var value = $(input).val();
					if (null != inputFocused) {
						$(inputFocused).attr('disabled', true);
					}
					$(input).attr('disabled', false);
					$(input).focus();
					$(input).val('');
					$(input).val(value);
					inputFocused = input;
				} else if (id == 'deleteComment') {
					var content = $($(event.target).parents('.content')[0]).find('.comment-content')[0];
					var input = $(content).find('input')[0];
					var id = $(input).attr('cmid');
					deleteComment(id);
				}
			})

			$('.edit-input').on('keydown', event => {
				isEdited = true;
				if (event.which == 13) {
					var cmid = $(event.target).attr('cmid');
					var content = $(event.target).val();
					editComment(cmid, content);
					$(inputFocused).prop('disabled', 'true');
				}
			});

			$('.comment-form').submit(function(event) {
				event.preventDefault();
				// List all input in comment box
				var id = $($('form')[1]).attr('product-id');
				var content = $('span.focus input[type="text"]').val();
				var replyId = $('span.focus input[type="text"]').attr('reply-id');
				if (content == undefined) {
					content = $('.comment-all input[type="text"]').val();
					replyId = $('.comment-all input[type="text"]').attr('reply-id');
				}
				if (content.length > 0) {
					showModal("Đang thêm bình luận");
					$.ajax($('.base_url').val() + '/comment', {
						type: 'post',
						data: {
							'content': content,
							'product-id': id,
							'reply-id': replyId
						},
						success: function(res, textStatus, xhr) {
							if (xhr.status == 200) { // Request success
								$('.comment-form').load(window.location.href + ' .comments-container, .comment-all');
								hideModal();
								alert(res.message);
							}
						}
					});
				}
			});
		});

		function getNumberBuy() {
			return $('input[type="number"]').val();
		}

		function showInput(element) {
			if ($('span.focus').length > 0) {
				$('span.focus').removeClass('focus');
			}
			$($($(element).parents('li.comment')[0]).siblings('.reply-input')[0]).addClass('focus');
			if ($('span.focus').hasClass('hidden')) {
				$('.comments-container li.comment').siblings('.reply-input').addClass('hidden');
				$('span.focus').removeClass('hidden');
			} else {
				$('.comments-container li.comment').siblings('.reply-input').addClass('hidden');
			}
		}
	</script>
	</ul>

</html>