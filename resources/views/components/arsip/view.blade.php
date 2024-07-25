@props(['arsip', 'show' => false])
  <!-- Modal -->
<div class="modal fade" id="viewArsip{{ $arsip->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Detail Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-0">
                    <div class="col-3 m-1 d-flex align-items-center justify-content-center">
                        <embed src="{{ ($arsip->file) }}" type="application/pdf" class="img-fluid" style="height: 80%"></embed>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5>Jenis Arsip</h5>
                                <p>{{ $arsip->jenis_arsip }}</p>
                            </div>
                            <div class="col">
                                <h5>Tingkat Perkembangan</h5>
                                <p>{{ $arsip->tingkat_perkembangan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Kurun Waktu</h5>
                                <p>{{ $arsip->kurun_waktu }}</p>
                            </div>
                            <div class="col">
                                <h5>Media</h5>
                                <p>{{ 'Kertas' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Jumlah</h5>
                                <p>{{ $arsip->jumlah }}</p>
                            </div>
                            <div class="col">
                                <h5>Jangka Simpan</h5>
                                <p>{{ $arsip->jangka_simpan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Metode Perlindungan</h5>
                                <p>{{ $arsip->metode_perlindungan }}</p>
                            </div>
                            <div class="col">
                                <h5>Lokasi Simpan</h5>
                                <p>{{ $arsip->lokasi_simpan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Keterangan</h5>
                                <p>{{ $arsip->keterangan }}</p>
                            </div>
                            <div class="col">
                                <h5>Waktu Update</h5>
                                <p><small class="text-body-secondary">{{ $arsip->updated_at }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Aksi</h5>
                                <button class="btn btn-dark m-1">
                                    <a href="{{ asset($arsip->file_path) }}" target="_blank">Lihat Arsip</a>
                                </button>
                                <button class="btn btn-dark m-1">
                                    <a href="{{ asset($arsip->file_path) }}" download>Download</a>
                                </button>
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