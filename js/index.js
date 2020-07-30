$(document).ready(function () {
    $('#orderform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'checkOrder.php',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1") {
                    location.href = `/wheel.php?order=${$('#orderNumber').val()}`;
                }
                else if(jsonData.success == "2") {
                    $('.notification.is-danger').addClass('visible');
                    window.setTimeout(function(){
                        $('.notification.visible').removeClass('visible');
                    }, 2000)
                }
                else {
                    console.log('Aie');
                }
            }
        });
    });
});