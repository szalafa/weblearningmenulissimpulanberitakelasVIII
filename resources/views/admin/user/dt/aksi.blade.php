<div class="text-center">
    <form action="{{ route('user.destroy', Crypt::encrypt($model->id)) }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="btn-group" role="group">
            {{-- <a href="{{ route('user.show', Crypt::encrypt($model->id)) }}" type="button" class="btn btn-primary"
                data-toggle="tooltip" title="Lihat data"><i class="bx bx-show"></i></a> --}}
            <a href="{{ route('user.edit', Crypt::encrypt($model->id)) }}" type="button" class="btn btn-warning"
                data-toggle="tooltip" title="Update data"><i class="bx bx-edit-alt"></i></a>
            <button type="submit" class="btn btn-danger"><i class="bx bx-trash" data-toggle="tooltip"
                    title="Hapus data"></i></button>
        </div>
    </form>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
