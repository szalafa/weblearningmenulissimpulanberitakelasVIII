@if ($model->status == 0)
    <a href="{{ route('updateStatus', $model->id) }}">
        <span class="badge text-bg-danger">Belum Dicek</span>
    </a>
@else
    <span class="badge text-bg-success">Sudah Dicek</span>
@endif
