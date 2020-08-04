function sendCommentOfUser(bool) {
    var url = window.location.href;
    var tenTaiKhoan, noiDung, maSach, comment, rate;

    maSach = (window.location.search).split("=")[1];
    comment = document.getElementsByClassName("comment__new")[0];
    noiDung = comment.getElementsByClassName("comment__new__content")[0].value;
    rate = getUserRate();

    if (bool == false) tenTaiKhoan = comment.getElementsByClassName("comment__new__name")[0].value;
    $.post(url, {
        userName: tenTaiKhoan,
        noiDung: noiDung,
        rate: rate
    }, function() {
        reloadComment();
        reloadRating();

        var position = $('#board_comment').position().top - $('.comment').height() - 30;
        $("html, body").animate({ scrollTop: position }, 500);
    });
}

function reloadComment() {
    $("#board_comment").load(window.location.href + " .comment");
    refreshCommentBox();
}

function refreshCommentBox() {
    if (document.getElementById('name').disabled == false)
        document.getElementById('name').value = null;
    document.getElementById('comment').value = null;
}