@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('hasil.asesmen') }}

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered materi_dt">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="50%">Nama</th>
                        <th width="15%">Jawaban Asesmen 1</th>
                        <th width="15%">Jawaban Asesmen 2</th>
                        <th width="15%">Jawaban Asesmen 3</th>
                        <th width="15%">Jawaban Asesmen 4</th>
                        <th width="15%">Jawaban Asesmen 5</th>
                        <th width="15%">Dikirim Tanggal</th>
                        <th width="15%">Status</th>
                    </tr>
                </thead>
                <tbody class="text-center"></tbody>
            </table>
        </div>
    </div>

    @include('admin.asesmen.modal.info_hasil')
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            var table = $('.materi_dt').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('hasil-asesmen.index-table') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'username',
                        name: 'user_id',
                    },
                    {
                        data: 'jawaban_asesmen_1',
                        name: 'jawaban_asesmen_1',
                    },
                    {
                        data: 'jawaban_asesmen_2',
                        name: 'jawaban_asesmen_2',
                    },
                    {
                        data: 'jawaban_asesmen_3',
                        name: 'jawaban_asesmen_3',
                    },
                    {
                        data: 'jawaban_asesmen_4',
                        name: 'jawaban_asesmen_4',
                    },
                    {
                        data: 'jawaban_asesmen_5',
                        name: 'jawaban_asesmen_5',
                    },
                    {
                        data: 'created_date',
                        name: 'created_at',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    }
                ],
                // "scrollX": true,
            });
        });
    </script>
@endsection
