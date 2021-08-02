function search() {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "hitungbiaya.php", // Isi dengan url/path file php yang dituju
        data: { daya: $("#daya").val(), produk_layanan: $("#produk").val(), token: $("#token_a").val() },
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) { // Ketika proses pengiriman berhasil
            if (response.status == "success") {
                $("#biaya").val(response.biaya);;
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'ID Pelanggan Tidak Ditemukan!'
                })
            }
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            // alert(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Ada data yang masih belum diisi!'
            })
        }
    });
}
$(document).ready(function () {

    $("#btn-search").click(function () { // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });

    $("#id_pelanggan").keyup(function (event) {
        if (event.keyCode == 13) {
            search();
        }
    });
});