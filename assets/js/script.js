$(document).ready(function() {

    $(".button-add").click(function() {
        var product = {
            action : "add",
            id : $(this).data("product-id"),
            price : $(this).data("product-price")
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/custom-cart/ajaxController.php",
            data: product,
            success: function(response) {
                location.reload();
            }
    
        });
    });

    $(".button-delete").click(function() {
        var product = {
            action : "remove",
            id : $(this).data("product-id")
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/custom-cart/ajaxController.php",
            data: product,
            success: function(response) {
                location.reload();
            }
    
        });
    });
});

function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float

        seconds = (diff % 60) | 0;


        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent =   seconds;

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            start = Date.now() + 1000;
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var thirtymin = 30,
        display = document.querySelector('#time');
    startTimer(thirtymin, display);
};
