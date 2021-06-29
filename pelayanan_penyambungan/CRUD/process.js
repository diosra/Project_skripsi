function search() {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "pelayanan_penyambungan/CRUD/search.php", // Isi dengan url/path file php yang dituju
        data: { no_registrasi: $("#no_registrasi").val() }, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            if (response.status == "success") {
                $("#no_reg").val(response.id_pelanggan);
                $("#identitas").val(response.identitas);
                $("#nama").val(response.nama);
                $("#alamat").val(response.alamat);
                $("#email").val(response.email);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Nomor Registrasi Tidak Ditemukan!'
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
        console.log('=== DEBUG ===');
    });

    $("#id_pelanggan").keyup(function (event) { // Ketika user menekan tombol di keyboard
        if (event.keyCode == 13) { // Jika user menekan tombol ENTER
            search(); // Panggil function search
        }
    });
});