function search() {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "pelayanan_penyambungan/permohonan_yanbung/search.php", // Isi dengan url/path file php yang dituju
        data: { no_petugas_survey: $("#petsur").val() }, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            if (response.status == "success") {
                $("#id_petugas_survey").val(response.id_survey);
                $("#nama").val(response.nama);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Petugas Survey Tidak Ditemukan!'
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