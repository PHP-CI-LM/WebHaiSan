String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};







//Add product to cart
function addToCart(id, soluong, gia = 0, callback = null) {
    var count = getCookie("countProduct");
    if (count.length == 0)
        count = 1;
    else
        count++;

    setCookie("product" + count, "id:" + id + "-count:" + soluong + "-price:" + gia); //Thêm sp đã mua vào cookie
    setCookie("countProduct", count);
    $(".cart-count").load(document.URL + " #number");
    $("#countInput").load(document.URL + " #count");
    alert('Thêm sản phẩm thành công');
    if (callback != null) callback();
}


//Goto url
function gotoPage(url) {
    document.location.href = url;
}


//Remove product from cart
function removeProductFromCart(row) {
    //Thực hiện xóa sản phẩm
    var id_product = $($(row).parents('tr')[0]).attr('id'); //Lấy ra cookie_name của sản phẩm đó
    var c_name = $($(row).parents('tr')[0]).attr('c-name'); //Lấy ra cookie_name của sản phẩm đó
    var soLuong = getCookie('countProduct') - 1; //Giảm số lượng lần mua trong biến đếm

    $($(row).parents('tr')[0]).remove(); //Xóa sản phẩm hiện trên màn hình
    deleteCookie(c_name);
    setCookie('countProduct', soLuong);

    //Cập nhật lại bảng sách
    refreshTableProduct();

    //Cập nhật lại bảng giá
    refreshTotalPrice();

    //Cập nhật header giỏ hàng
    refreshHeaderButtonCart(soLuong)
}



//Refresh list product in cart
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



//Refresh total price of cart (edit order)
function refreshPricePayment() {
    var totalPrice = getTotalPay();
    $('.total-price label').text(totalPrice.format() + 'đ');
}



//Refresh total price of cart (edit order)
function refreshTotalPricePayment() {
    var totalPrice = getTotalPay();
    var delivery = getDeliveryCharge();
    $('.total-payment span').text((totalPrice + delivery).format() + 'đ');
}



//Refresh total price of cart
function refreshTotalPrice() {
    var totalPrice = getTotalPrice();
    if (totalPrice == 0) {
        $('#button-confirm').find('a').remove();
        $('#button-confirm').append('<a><i class=\"fa fa-money\"></i> <span class=\"content-inner\">Thanh toán</span></a>');
    }
    $("#bill").load(document.URL + " #label, #totalPrice");
}


//Refresh one product row in list products of cart
function refreshRowProduct(inputQuantity) {
    var row = $(inputQuantity).parents('tr')[0];
    var cookie_name = $(row).attr('c-name');
    var id_product = $(row).attr('id');
    var amount = $(inputQuantity).val();
    var price = getPrice(row);
    setProductCount(cookie_name, id_product, amount, price);
    $($(row).parents('.cart-info')).load(document.URL + " table.table");
}


//Refresh amount number in cart icon header bar
function refreshHeaderButtonCart(count) {
    var button = $('.cart-count')[0];
    $(button).find('#number').text(count);
}


//Event after change input quantity
function changeQuantityPayment() {
    refreshPricePayment();
    refreshTotalPricePayment();
}



//Event after change input quantity
function changeQuantity(input) {
    refreshRowProduct(input);
    refreshTotalPrice();
}



function getDeliveryCharge() {
    var price = $('.shiping-price label').text();
    return parseInt(price.substring(0, price.length - 2).replaceAll(',', ''));
}



//Calculate and return total price of all product in cart (edit order)
function getTotalPay() {
    var items = $('.cart-item');
    var totalPrice = 0;
    if (items.length > 0) {
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var count = $($(item).find('input')[0]).val();
            var price = $($(item).children('.price')[0]).text();
            price = parseInt(price.substring(0, price.length - 1).replaceAll(',', ''));
            totalPrice = totalPrice + price * count;
        }
    }
    return totalPrice;
}



//Calculate and return total price of all product in cart
function getTotalPrice() {
    var rowTables = $('tbody tr');
    var totalPrice = 0;
    if (rowTables.length > 0) {
        for (var i = 0; i < rowTables.length; i++) {
            totalPrice = totalPrice + getPrice(rowTables[i]);
        }
    }
    return totalPrice;
}


//Get price of product in row of list product
function getPrice(row) {
    var input = $(row).find('.quantity input').val();
    var gia = $(row).find('.price').text();
    gia = parseInt(gia.substring(0, gia.length - 4).replaceAll(',', ''));
    return input * gia;
}



//Finding index of cookie name with product have maSanPham
function findIndexWithIDProduct(maSanPham) {
    var cookies = getListCookie();
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        let id_product = ((cookie.split("=")[1]).split("-")[0]).split(":")[1];
        if (id_product == maSanPham) return i;
    }
    return false;
}


//Finding index of cookie name with product have cookie_name
function findIndexWithCookieName(cookie_name) {
    var cookies = getListCookie();
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        let c_name = cookie.split("=")[0].trim();
        if (c_name == cookie_name) return i;
    }
    return false;
}


//Get info of product in cookie by index in cookie
function getProductInfo(index) {
    return getCookieAt(index);
}


//Get id of product in cookie by index in cookie
function getProductId(index) {
    var info = getProductInfo(index);
    if (info != null) {
        return info.split("-")[0].split(":")[1];
    }
}


//Get count of product in cookie by index in cookie
function getProductCount(index) {
    var info = getProductInfo(index);
    if (info != null) {
        return info.split("-")[1].split(":")[1];
    }
}


//Update info of product in cookie by index of it in cookie
function setProductInfo(index, info) {
    var cname = getNameCookieAt(index);
    insertCookieAt(cname, info, index);
}


//Update amount of product in cookie by index of it in cookie
function setProductCount(cookie_name, maSanPham, soLuong, gia = 0) {
    var newInfo = "id:" + maSanPham + "-" + "count:" + soLuong + "-" + "price:" + gia;
    var count = getCookie("countProduct");

    // alert(cookie_name);
    deleteCookie("countProduct");
    setProductInfo(findIndexWithCookieName(cookie_name), newInfo);
    setCookie("countProduct", count);
}