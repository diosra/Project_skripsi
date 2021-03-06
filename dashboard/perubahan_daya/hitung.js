function hitungbiaya() {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "hitungbiaya.php", // Isi dengan url/path file php yang dituju
        data: { daya_baru: $("#daya_baru").val(), daya_lama: $("#daya").val(), produk_layanan: $("#produk").val(), token: $("#token_a").val() },
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
                    text: 'error'
                })
            }
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            // alert(xhr.responseText);
            // console.log(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Ada data yang masih belum diisi!'
            })
        }
    });
}
$(document).ready(function () {

    $("#btn-hitung").click(function () { // Ketika user mengklik tombol Cari
        hitungbiaya(); // Panggil function search
    });

    $("#daya_baru").keyup(function (event) {
        if (event.keyCode == 13) {
            hitungbiaya();
        }
    });
});