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
