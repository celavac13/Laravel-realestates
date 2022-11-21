$(document).ready(function () {
    $("#likeBtn").click(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

        if (!$(this).hasClass("liked")) {
            $.ajax({
                url:
                    "/realestates/" +
                    $(this).data("realestate") +
                    "/favourites",
                type: "POST",
                data: { _token: CSRF_TOKEN, message: $(".getinfo").val() },
                dataType: "JSON",
                success: function (data) {
                    $("#successMsg").text(data.msg);
                },
            });
            $(this).addClass("liked");
        } else {
            $.ajax({
                url:
                    "/realestates/" +
                    $(this).data("realestate") +
                    "/favourites",
                type: "DELETE",
                data: { _token: CSRF_TOKEN, message: $(".getinfo").val() },
                dataType: "JSON",
                success: function (data) {
                    $("#successMsg").text(data.msg);
                },
            });
            $(this).removeClass("liked");
        }
    });
});
