@props(['arsip', 'show' => false])
  <!-- Modal -->
<div class="modal fade" id="viewArsip{{ $arsip->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Detail Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-5 d-flex align-items-center justify-content-center">
                        <embed id="viewer" src="{{ asset('storage/arsipvital/'.$arsip->file) }}" type="application/pdf" class="object-fit-cover" style="width: 100%; height:100%">
                        {{--
                        <iframe src="{{ asset('storage/arsipvital/'.$arsip->file) }}" id="viewer" class="" style="height: 30rem;"></iframe>
                        {{-- <div style="overflow: hidden; width: 80%; height: 100%;">
                            <embed src="{{ asset('storage/arsipvital/'.$arsip->file) }}" type="application/pdf" class="img-fluid" style="height: 100%; width: 100%;">
                        </div> 
                        --}}
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col ">
                                <h5>Jenis Arsip</h5>
                                <p>{{ $arsip->jenis_arsip }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Kurun Waktu</h5>
                                <p>{{ $arsip->kurun_waktu }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Jumlah</h5>
                                <p>{{ $arsip->jumlah }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Metode Perlindungan</h5>
                                <p>{{ $arsip->metode_perlindungan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Keterangan</h5>
                                <p>{{ $arsip->keterangan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Aksi</h5>
                                <a class="btn btn-dark btnlink text-center mb-2" href="{{ asset('/storage/arsipvital/'.$arsip->file) }}" target="_blank">Lihat Arsip</a>
                                <a class="btn btn-dark btnlink text-center mb-2" href="{{ asset('/storage/arsipvital/'.$arsip->file) }}" download>Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col ">
                                <h5>Tingkat Perkembangan</h5>
                                <p>{{ $arsip->tingkat_perkembangan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Jangka Simpan</h5>
                                <p>{{ $arsip->jangka_simpan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Lokasi Simpan</h5>
                                <p>{{ $arsip->lokasi_simpan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <h5>Waktu Update</h5>
                                <p><small class="text-body-secondary">{{ $arsip->updated_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<script>
    $(document).ready(function() {
        const viewer = document.getElementById('viewer');
        viewer.onload = function() {
            const pdf = viewer.contentDocument;
            const page = pdf.querySelector('.page');
            const viewport = page.getClientRects()[0];
            const scale = viewer.clientHeight / viewport.height;
            page.style.transform = `scale(${scale})`;
        };
    });
</script>