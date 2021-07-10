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
        success: function (response) { // Ketika proses pengiriman berhasil
            if (response.status == "success") { // Jika isi dari array status adalah success// set textbox dengan id nama
                $("#noregtampil").val(response.no_registrasi); // set textbox dengan id nama
                $("#nama").val(response.nama); // set textbox dengan id nama
                $("#alamat").val(response.alamat); // set textbox dengan id jenis kelamin
                $("#nohp").val(response.nohp);
                $("#notelp").val(response.notelp);
                $("#email").val(response.email);
                $("#daya").val(response.daya);
                $("#ktp").val(response.ktp);
            } else { // Jika isi dari array status adalah failed
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'ID Pelanggan Tidak Ditemukan!'
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