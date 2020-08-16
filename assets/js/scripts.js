$(document).ready(function () {
    $('.datatables').dataTable({
        "language": {
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        }
    });


});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    readURL(this);
})

$('.image').on('change', function () {
    console.log('ok');
    readURL(this);
})




// $('.jumlah_pertanyaan').on('change', function () {
//     var jumlah = $(this).val();
//     console.log(jumlah);
//     $.ajax({
//         url: 'http://localhost/pengaduan/admin/kuesioner/get_jumlah',
//         type: "post",
//         data: { jumlah: jumlah },
//         success: function (data) {
//             $('.pertanyaan').html(data);

//         }
//     })
// })

$(document).ready(function () {
    var i = $('input[name="jumlah_pertanyaan"]').val();
    console.log(i);
    $(document).on('click', '#btn_tambah', function () {
        i++;
        $('input[name="jumlah_pertanyaan"]').val(i);
        $('.pertanyaan').append(' <div class="row justify-content-center" id="row_' + i + '"><div class="col-6 shadow"><div class="form-group d-flex flex-row mt-3"><input  type="text" name="pertanyaan[]" id="' + i + '" class="form-control" placeholder="isi pertanyaan"><button id="' + i + '" type="button" class="btn btn-sm btn-danger btn_hapus"><i class="fas fa-times"></i></button></div></div></div>')
    })

})


$(document).ready(function () {

    $(document).on('click', '.btn_hapus', function () {
        var id = $(this).attr('id');

        $('#row_' + id + '').remove();
    })

})


$(document).ready(function () {
    $('#pengaduan').on('change', function () {
        var kd_pengaduan = $(this).val();
        console.log(kd_pengaduan);

        $.ajax({
            url: 'http://localhost/pengaduan/admin/laporan/ajax_table_pertanyaan',
            type: "post",
            data: { kd_pengaduan: kd_pengaduan },
            success: function (data) {
                $('.table_pertanyaan').html(data);


            }
        })
    })
})


$(document).on('click', '#grafik', function () {
    var kd_pertanyaan = $(this).data('kd_pertanyaan');
    var kd_pengaduan = $(this).data('kd_pengaduan');
    console.log(kd_pertanyaan);

    $.ajax({
        url: 'http://localhost/pengaduan/admin/laporan/ajax_grafik',
        type: "post",
        data: { kd_pertanyaan: kd_pertanyaan, kd_pengaduan: kd_pengaduan },
        success: function (data) {
            $('#tampil_grafik').html(data);
            $('#modalGrafik').modal('show');


        }
    })

});


$(document).ready(function () {
    $('#pengaduan_saran').on('change', function () {
        kd_pengaduan = $(this).val();
        $.ajax({
            url: 'http://localhost/pengaduan/admin/laporan/ajax_saran',
            type: "post",
            data: { kd_pengaduan: kd_pengaduan },
            success: function (data) {
                $('#saran').html(data);



            }
        })

    })

})

$(document).ready(function () {
    $('#pengaduan_kabag').on('change', function () {
        var kd_pengaduan = $(this).val();
        console.log(kd_pengaduan);

        $.ajax({
            url: 'http://localhost/pengaduan/kabag/laporan/ajax_table_pertanyaan',
            type: "post",
            data: { kd_pengaduan: kd_pengaduan },
            success: function (data) {
                $('.table_pertanyaan').html(data);


            }
        })
    })
})


$(document).on('click', '#grafik_kabag', function () {
    var kd_pertanyaan = $(this).data('kd_pertanyaan');
    var kd_pengaduan = $(this).data('kd_pengaduan');
    console.log(kd_pertanyaan);

    $.ajax({
        url: 'http://localhost/pengaduan/kabag/laporan/ajax_grafik',
        type: "post",
        data: { kd_pertanyaan: kd_pertanyaan, kd_pengaduan: kd_pengaduan },
        success: function (data) {
            $('#tampil_grafik').html(data);
            $('#modalGrafik').modal('show');


        }
    })

});


$(document).ready(function () {
    $('#pengaduan_saran_kabag').on('change', function () {
        kd_pengaduan = $(this).val();
        $.ajax({
            url: 'http://localhost/pengaduan/kabag/laporan/ajax_saran',
            type: "post",
            data: { kd_pengaduan: kd_pengaduan },
            success: function (data) {
                $('#saran').html(data);



            }
        })

    })

})






