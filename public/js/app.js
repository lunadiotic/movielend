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

    form.find(".invalid-feedback").remove();
    form.find(".form-control").removeClass("is-invalid");

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
            var response = xhr.responseJSON;
            if ($.isEmptyObject(response.errors) == false) {
                //Jika objek errors ini bukan kosong maka lakukan perulangan
                $.each(response.errors, function (key, value) {
                    //lakukan perulangan dari setiap error, dan kita letakkan pada element form tertentu
                    $("#" + key) //pilih element form dengan ID yang sudah dibuat, SARAN: SAMAKAN DENGAN NAMA TABEL SERVER AGAR MUDAH UNTUK MENAMPILKAN VALIDASI PER KOLOM
                        .closest(".form-control") //cari class terdekat yang memiliki class "form-group"
                        .addClass("is-invalid") //tambahkan class "has-error" pada class tersebut yang sama dengan form-group
                        .closest(".form-group") // di dalam class form-group
                        .append(
                            `<div class="invalid-feedback">
                            ${value}
                            </div>`
                        ); //menambahkan element span yang berisikan pesan error yang dihasilkan dari server side
                });
            }
        },
    });
});

$("body").on("click", ".btn-delete", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        csrf_token = $('meta[name="csrf-token"]').attr("content");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: csrf_token,
                },
                success: function (response) {
                    $("#datatable").DataTable().ajax.reload();
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                },
                error: function (xhr) {
                    Swal.fire("Oops...", "Something went wrong!", "error");
                },
            });
        }
    });
});
