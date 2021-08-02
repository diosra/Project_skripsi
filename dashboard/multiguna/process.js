function search() {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "search.php", // Isi dengan url/path file php yang dituju
        data: { id_pelanggan: $("#id_pelanggan").val() }, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            if (response.status == "success") {
                $("#ktp").val(response.ktp);
                $("#idpelanggan").val(response.idpel);
                $("#nama").val(response.nama);
                $("#alamat").val(response.alamat);
                $("#nohp").val(response.nohp);
                $("#notelp").val(response.notelp);
                $("#email").val(response.email);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'ID Pelanggan Tidak Ditemukan!'
                }).then((result) => {
                    $('#id_pelanggan').val("");
                })
            }
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.responseText);
        }
    });
}
$(document).ready(function () {

    $("#btn-search").click(function () { // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });

    $("#id_pelanggan").keyup(function (event) { // Ketika user menekan tombol di keyboard
        if (event.keyCode == 13) { // Jika user menekan tombol ENTER
            search(); // Panggil function search
        }
    });
});