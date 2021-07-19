$("body").on("click", ".modal-show", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"), //mengambil route create untuk menampilkan form
        title = me.attr("title");

    $("#modal-title").text(title);
    $("#modal-btn-save").text(me.hasClass("edit") ? "Update" : "Create");

    $.ajax({
        url: url, //url dari route di simpan dari attribut href ke variabel url
        dataType: "html", //data yang dikeluarkan berupa html / form input berupa tag html
        success: function (response) {
            $("#modal-body").html(response);
        },
    });

    $("#modal").modal("show");
});

$("#modal-btn-save").on("click", function (event) {
    event.preventDefault();

    var form = $("#modal-body form"),
        url = form.attr("action"),
        method = $("input[name=_method]").val();

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            form.trigger("reset"); //Clear Form
            $("#modal").modal("hide"); //Hide modal
            $("#datatable").DataTable().ajax.reload();
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "Data has been saved!",
            });
        },
        error: function (xhr) {
            var errors = xhr.responseJSON;
            console.log(errors);
        },
    });
});
