<script>
    var orderID;

    function diskusiModal(order_id) {

        orderID = order_id;

        var chat1 = '<div class="row user_';
        var chat2 = '"><span style="width: 30%;" class="badge mt-2 mb-2 badge-color_';
        var chat3 = '">';
        var chat4 = '</span></div><div class="border rounded row"><div class="col"><p class="mt-2 mb-2" id="pesan">';
        var chat5 = '</p></div></div>';

        $('#diskusiModal').modal('show');

        var url = '{{ route('diskusi.show', ':id') }}';
        url = url.replace(':id', order_id);

        $.get(url, function(data) {
            // Clear Ruang Diskusi
            $('#ruang_diskusi').empty();

            if (jQuery.isEmptyObject(data)) {
                $('#ruang_diskusi').append('<h6 class="text-center fw-bold">Belum ada percakapan</h6>');
            }

            $('#id_diskusi').html('Materi ' + order_id);
            for (var i = 0; i < data.length; i++) {
                $('#ruang_diskusi').append(chat1 + data[i].user_id + chat2 + data[i].user['role'] + chat3 +
                    data[i].user['name'] + ' | ' + moment(data[i].created_at.substring(0, 10)).format(
                        'DD-MM-YYYY') + chat4 + data[i]
                    .pesan + chat5);

                $('.user_{{ Auth::user()->id }}').addClass('d-flex justify-content-end');
                $('.badge-color_admin').addClass('text-bg-danger');
                $('.badge-color_guru').addClass('text-bg-success');
                $('.badge-color_murid').addClass('text-bg-primary');
            }
        })
    }

    function kirimPesan() {
        var materi_id = orderID;
        var user_id = {{ Auth::user()->id }};
        var pesan = $('#pesan_diskusi').val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Summernote Validation - Not Allowed if Empty
        var emptyCheck = $('#pesan_diskusi').summernote('code');
        var filteredContent = $(emptyCheck).text().replace(/\s+/g, '');
        console.log(filteredContent.length);
        if ($('#pesan_diskusi').summernote('isEmpty') || filteredContent.length <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Pesan Tidak Boleh Kosong',
                showConfirmButton: true
            });
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '/learning/diskusi',
            dataType: 'json',
            data: {
                materi_id: materi_id,
                user_id: user_id,
                pesan: pesan,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pesan Anda Berhasil Dikirim!',
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#pesan_diskusi').summernote('reset');
                diskusiModal(orderID);

            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Pesan Anda Gagal Dikirim!',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
        });
    }
</script>
