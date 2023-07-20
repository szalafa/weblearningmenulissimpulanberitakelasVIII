<div class="modal fade" id="infoHasilAsesmen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Hasil Asesmen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black">
                @foreach ($asesmen as $data)
                    <p class="fw-bold">Soal Nomor {{ $data->order }}</p>
                    {!! $data->soal_asesmen !!}
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
