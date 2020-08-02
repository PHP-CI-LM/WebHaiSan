<div class="vertical_menu none-hidden">
    <div id="mb_verticle_menu" class="menu-quick-select">
        <div class="title_block">
            <span>Danh mục sản phẩm</span>
        </div>
        <div id="menuverti" class="block_content navbar_menuvertical">
            <ul class="nav_verticalmenu">
                <?php if (isset($categories) && sizeof($categories) > 0) {
                    foreach ($categories as $key => $category) {
                        echo '<li class="level0">';
                        echo '<a href="'. base_url() .'category/'. $category['url'] .'">';
                        echo '<img class="icon-menu" src="'. base_url() .'static/image/icon/' . $category['thumbnail'] .'" alt="'. $category['name_category'] .'">';
                        echo '<span>'. $category['name_category'] .'</span>';
                        echo '</a></li>';
                    }
                } 
                ?>
            </ul>
        </div>
    </div>
</div>