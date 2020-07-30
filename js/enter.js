$(document).ready(function () {
    $('#orderform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'addorder.php',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.add == "1") {
                    $('.notification.is-primary').addClass('visible');
                }
                else if(jsonData.add == "0") {
                    $('.notification.is-danger').addClass('visible');
                }
                window.setTimeout(function(){
                    $('.notification.visible').removeClass('visible');
                }, 2000)
            }
        });
    });
});