@if ($model->role == 'admin')
    <span class="badge text-bg-danger">{{ $model->role }}</span>
@elseif ($model->role == 'guru')
    <span class="badge text-bg-warning">{{ $model->role }}</span>
@else
    <span class="badge text-bg-primary">{{ $model->role }}</span>
@endif
