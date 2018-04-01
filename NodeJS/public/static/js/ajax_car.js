$(document).ready(function () {
    $(".btn-ajax-delete").click(function () {
        id = $(this).attr("data-id");

        $.ajax({
            type: "DELETE",
            url: "/admin",
            data: { id: id }
        })
            .done(function (data) {
                $("#car-" + id).remove();
            });
    })

    $('#exampleModal').appendTo("body");
});
