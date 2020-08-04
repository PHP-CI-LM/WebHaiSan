function showModal() {
    $(".modal-window").css({
        "display": "block"
    });
}

function show_modal(label) {
    alert(label);
    if (0 < label.length) {
        changeModalLabel(label);
    }
    $(".modal-window").css({
        "display": "block"
    });
}

function showModal(label, enableClose) {
    if (0 < label.length) {
        changeModalLabel(label);
    }
    if (true == enableClose) {
        enableCloseButton();
    } else {
        disableCloseButton();
    }
    $(".modal-window").css({
        "display": "block"
    });
}

function hideModal() {
    $(".modal-window").css({
        "display": "none"
    });
}

function changeModalLabel(content) {
    $(".modal-window .content span.label").text(content);
}

function disableCloseButton() {
    $(".modal-close").css({
        "display": "none"
    });
}

function enableCloseButton() {
    $(".modal-close").css({
        "display": "block"
    });
}