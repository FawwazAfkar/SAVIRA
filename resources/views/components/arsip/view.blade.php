@props(['arsip', 'show' => false])
  <!-- Modal -->
<div class="modal fade" id="viewArsip{{ $arsip->id }}" tabindex="-1" aria-hidden="true" data-file-url="{{ route('arsip.view', $arsip->id) }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4">Detail Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row mb-4">
                <div class="col-md-8 modal-table">
                    <div class="row">
                        <div class="col mth">
                            <h5>Instansi</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->instansi->nama_instansi }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Unit Pengolah</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->unit_pengolah }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Jenis Arsip</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->jenis_arsip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Media Simpan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->media }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Sarana Temu Kembali</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->sarana_temu_kembali }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Volume/Jumlah</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->jumlah }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Periode (Kurun Waktu)</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->kurun_waktu }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Retensi/Masa Simpan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->jangka_simpan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Tingkat Keaslian</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->tingkat_perkembangan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Sifat Kerahasiaan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->sifat_kerahasiaan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Lokasi Simpan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->lokasi_simpan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Sarana Simpan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->sarana_simpan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Metode Perlindungan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->metode_perlindungan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Berita Acara</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->berita_acara }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Keterangan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->keterangan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Nama Pendata</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->nama_pendata }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mth">
                            <h5>Waktu Pendataan</h5>
                        </div>
                        <div class="col mtc">
                            <p>{{ $arsip->waktu_pendataan}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <h5>Preview Arsip</h5>
                        <div id="pdf-viewer-view_{{ $arsip->id }}" class="form-control" style="height: 25rem; overflow:auto"></div>
                    </div>
                    <div class="row action">
                        <h5>Aksi</h5>
                        <a class="btn btn-dark btnlink text-center mb-2" href="{{ route('arsip.view', $arsip->id) }}" target="_blank">Lihat Arsip</a>
                        <a class="btn btn-dark btnlink text-center mb-2" href="{{ route('arsip.download', $arsip->id) }}" download>Download</a>
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


{{-- <script>
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
</script> --}}