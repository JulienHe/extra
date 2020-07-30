$(document).ready(function () {
    $('.button.is-small.is-info').on('click', function (e) {
        e.preventDefault();
        var num = $(this).data('order');
        updateEntry(num, $(this))
    })
});

function updateEntry(order, button) {
    $.ajax({
        type: "POST",
        url: 'changeWinner.php',
        data: { orderNumber: order },
        success: function (response) {
            console.log(response);

            // user is logged in successfully in the back-end
            // let's redirect
            if (response == "1") {
                console.log($(button));
                $(button).attr('disabled', true);
                $(button).removeClass('is-info');

            }
            else if (response == "0") {
                $('.notification.is-danger').addClass('visible');
            }
        }
    });
}