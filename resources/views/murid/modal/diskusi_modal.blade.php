<div class="modal fade" id="diskusiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ruang Diskusi <span id="id_diskusi"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" id="ruang_diskusi">
                    {{-- Foreach Data --}}
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <textarea class="form-control w-100" id="pesan_diskusi"></textarea>
                        </form>
                    </div>
                    <div class="col-12 mt-3 text-end">
                        <button type="button" class="btn btn-primary" onclick="kirimPesan()">Kirim Pesan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
