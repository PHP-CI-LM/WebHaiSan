$(document).ready(function() {
    /*
     ** Setup listener for edit button
     */
    $('img.edit').on('click', event => {
        var headerBlock = $(event.target).parents('.header')[0];
        var detailBlock = $(headerBlock).next()[0];
        // Get and hidden all span element in this block except password block and username block
        $(detailBlock).find('span.info').each((index, element) => {
            // Check if parent of element is password block or username block to hidden this
            if (0 == $(element).parents('.password').length && 0 == $(element).parents('.username').length && 0 == $(element).parents('.email').length) {
                $(element).addClass('hidden');
            }
        });
        // Enable all input element to edit except fixed input
        $(detailBlock).find('.input').each((index, element) => {
                if (false == $(element).hasClass('fixed'))
                    $(element).removeClass('hidden');
            })
            // Change icon from edit to save, enable icon cancel
        toggleButton(headerBlock, 'edit', false);
        toggleButton(headerBlock, 'save', true);
        toggleButton(headerBlock, 'cancel', true)
    });



    /*
     ** Setup listener for cancel button
     */
    $('img.cancel').on('click', event => {
        var headerBlock = $(event.target).parents('.header')[0];
        var detailBlock = $(headerBlock).next()[0];
        // Disable all input element except fixed input
        $(detailBlock).find('.input').each((index, element) => {
                if (false == $(element).hasClass('fixed'))
                    $(element).addClass('hidden');
            })
            // Get and enable all span element in this block except password block
        $(detailBlock).find('span.info').each((index, element) => {
            $(element).removeClass('hidden');
        });
        // Change icon to edit, hidden all another button
        $(headerBlock).find('img').addClass('hidden');
        toggleButton(headerBlock, 'edit', true);
    })


    /*
     ** Setup listener for save button
     */
    $('img.save').on('click', event => {
        var headerBlock = $(event.target).parents('.header')[0];
        var detailBlock = $(headerBlock).next()[0];
        var isUploadAvatar = false;
        var isUpdateInformation = false;

        // Get all input in detail block
        var inputs = $(detailBlock).find('.input').each((index, element) => {
            // Check if input is file type
            if ('file' == $(element).attr('type')) {
                // Enable flag to upload avatar
                isUploadAvatar = true;
            } else {
                // Enable flag to update information of user
                isUpdateInformation = true;
            }
        });

        // Change button to loading and disable all another button
        $(headerBlock).find('img').addClass('hidden');
        toggleButton(headerBlock, 'loading', true);
        // Start process save
        if (true == isUpdateInformation && false == isUploadAvatar) {
            // Update information of user
            var customerID = $('.cid').val();
            var data = {
                'customerName': $(inputs[0]).val(),
                'sex': $(inputs[1]).val(),
                'address': $(inputs[2]).val(),
                'phone': $(inputs[3]).val()
            }
            sendRequest('user/thong-tin-tai-khoan.html/' + customerID, 'post', data, (response, text) => {
                // Hidden all input and update information of span following with value in input element
                $(detailBlock).find('.input').each((index, element) => {
                    if (false == $(element).hasClass('fixed'))
                        $(element).addClass('hidden');
                });
                $(detailBlock).find('span.info').each((index, element) => {
                    if (0 == $(element).parents('.sex').length) {
                        $(element).text($(element).next('.input').val());
                    } else {
                        if (1 == $(element).next('.input').val()) {
                            $(element).text('Nữ');
                        } else {
                            $(element).text('Nam');
                        }
                    }
                    $(element).removeClass('hidden');
                });
                // Enable button edit and disable all another button
                $(headerBlock).find('img').addClass('hidden');
                toggleButton(headerBlock, 'edit', true);
            }, (request, status, error) => {
                // Enable button error, cancel button and disable all another button
                $(headerBlock).find('img').addClass('hidden');
                toggleButton(headerBlock, 'error', true);
                toggleButton(headerBlock, 'cancel', true);
            });
        } else if (false == isUpdateInformation && true == isUploadAvatar) {
            // Upload avatar of user
            var data = new FormData();
            var customerID = $('.cid').val();
            data.append('avatar', $('input[type="file"]')[0].files[0]);
            sendRequest('user/thong-tin-tai-khoan.html/avatar/' + customerID, 'post', data, (response, text) => {
                var res = JSON.parse(response);
                if (true == res.status) {
                    // Remove class fixed of input
                    $('.avatar .fixed').removeClass('fixed');
                    if (0 < $('.avatar img').length) {
                        // Change src image
                        $('.avatar img').attr('src', res.data.url);
                    } else {
                        // Add new image
                        $('.avatar').append('<span class="info"><img src="' + res.data.url + '" style="max-width: 40px;"></span>');
                    }
                    // Hiddden upload file input
                    $(detailBlock).find('.input').each((index, element) => {
                        $(element).addClass('hidden');
                    });
                    // Enable image
                    $(detailBlock).find('span.info').each((index, element) => {
                        $(element).removeClass('hidden');
                    });
                }
                // Enable edit button and disable all another button
                $(headerBlock).find('img').addClass('hidden');
                toggleButton(headerBlock, 'edit', true);
            }, (request, status, error) => {
                // Enable button error, cancel button and disable all another button
                $(headerBlock).find('img').addClass('hidden');
                toggleButton(headerBlock, 'error', true);
                toggleButton(headerBlock, 'cancel', true);
            })
        }
    });
});


var toggleButton = function(parent, className, isEnable = fasle) {
    var button = $(parent).find('.' + className)[0];
    if (true == isEnable) {
        $(button).removeClass('hidden');
    } else {
        $(button).addClass('hidden');
    }
}


var sendRequest = function(url, method, data, success, error) {
    var base_url = $('.base_url').val();
    $.ajax({
        url: base_url + url,
        method: method,
        contentType: false,
        processData: false,
        data: data,
        success: success,
        error: error
    });
};