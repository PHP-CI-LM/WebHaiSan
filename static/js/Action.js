String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};







//Add product to cart
function addToCart(id, soluong, gia) {
    var count = getCookie("countProduct");
    if (count.length == 0)
        count = 1;
    else
        count++;

    setCookie("product" + count, "id:" + id + "-count:" + soluong); //Thêm sp đã mua vào cookie
    setCookie("countProduct", count);
    $(".cart-count").load(document.URL + " #number");
    $("#countInput").load(document.URL + " #count");
}


//Goto url
function gotoPage(url) {
    document.location.href = url;
}

function removeProductFromCart(row) {
    //Thực hiện xóa sách
    var index = $(row).attr('id');
    $(row).parent().remove(); //Xóa sách hiện trên màn hình
    deleteCookie(getNameCookieAt(index));
    var soLuong = getCookie('countProduct') - 1; //Giảm số lượng lần mua trong biến đếm
    setCookie('countProduct', soLuong);

    //Cập nhật lại bảng sách
    refreshTableProduct();

    //Cập nhật lại bảng giá
    refreshTablePrice();

    //Cập nhật header giỏ hàng
    refreshHeaderButtonCart(soLuong)
}

function refreshTableProduct() {
    var rowTables = $('.row-table');
    if (rowTables.length > 0) {
        for (var i = 0; i < rowTables.length; i++) {
            var deleteProduct = $(rowTables[i]).find('.deleteProduct');
            var input = $(rowTables[i]).find('input');
            $(deleteProduct).attr('id', i);
            $(input).attr('id', i);
        }
    } else {
        $('.table-modify').append('<p class="error">Giỏ hàng trống</p>');
    }
}

function refreshTablePrice(inputQuantity) {
    var row = $($($(inputQuantity)).parent()).parent();
    var id_product = $(row).attr('id');
    var totalPrice = getTotalPrice();
    setProductCount(id_product, inputQuantity);
    if (totalPrice == 0) {
        $('#button-confirm').find('a').remove();
        $('#button-confirm').append('<a><i class=\"fa fa-money\"></i> <span class=\"content-inner\">Thanh toán</span></a>');
    }
    $("#bill").load(document.URL + " #label, #totalPrice");
}

function refreshHeaderButtonCart(count) {
    var button = $('.cart-count')[0];
    $(button).find('#number').text(count);
}

function updateProductInCart(index, input) {
    setProductCount(index, input);
    refreshTablePrice();
}

function getTotalPrice() {
    var rowTables = $('tbody tr');
    var totalPrice = 0;
    if (rowTables.length > 0) {
        for (var i = 1; i < rowTables.length; i++) {
            totalPrice = totalPrice + getPrice(rowTables[i]);
        }
    }
    return totalPrice;
}

function getPrice(row) {
    var input = $(row).find('.quantity input').val();
    var gia = $(row).find('.price').text();
    gia = parseInt(gia.substring(0, gia.length - 4).replaceAll(',', ''));
    return input * gia;
}

function findIndexOfCookie(maSanPham) {
    var cookies = getListCookie();
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        let id_product = ((cookie.split("=")[1]).split("-")[0]).split(":")[1];
        if (id_product == maSanPham) return i;
    }
    return false;
}

//Lấy thông tin của cuốn sách nằm ở vị trí index
function getProductInfo(index) {
    return getCookieAt(index);
}

//Lấy mã của sản phẩm nằm ở vị trí index
function getProductId(index) {
    var info = getProductInfo(index);
    if (info != null) {
        return info.split("-")[0].split(":")[1];
    }
}

//Lấy số lượng của cuốn sách nằm ở vị trí index
function getProductCount(index) {
    var info = getProductInfo(index);
    if (info != null) {
        return info.split("-")[1].split(":")[1];
    }
}

//Cập nhật lại thông tin sản phẩm ở vị trí index
function setProductInfo(index, info) {
    var cname = getNameCookieAt(index);
    insertCookieAt(cname, info, index);
}

//Cập nhật lại số lượng sản phẩm ở vị trí index
function setProductCount(maSanPham, input) {
    var soLuong = input.value;
    var newInfo = "id:" + maSanPham + "-" + "count:" + soLuong;
    var count = getCookie("countProduct");
    deleteCookie("countProduct");
    setProductInfo(findIndexOfCookie(maSanPham), newInfo);
    setCookie("countProduct", count);
}