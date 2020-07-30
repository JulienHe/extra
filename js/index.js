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
                    console.log('Helooooooo');
                    location.href = `/wheel.php?order=${$('#orderNumber').val()}`;
                }
                else if(jsonData.success == "2") {
                    console.log('Do no exist');
                }
                else {
                    console.log('Aie');
                }
            }
        });
    });
});