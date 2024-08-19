@props(['arsip', 'show' => false])
<!-- Modal -->
<div class="modal fade" id="viewArsip{{ $arsip->id }}" tabindex="-1" aria-hidden="true" data-file-url="{{ route('arsip.view', $arsip->id) }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4">Informasi Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row g-2 mb-4">
                <div class="col-md-8 mt-2 ms-2">
                <h5><b>Detail Pendataan Arsip</b></h5>
                <div class="mtable">
                    <div class="mtr">
                        <div class="mth">
                            Instansi
                        </div>
                        <div class="mtd">
                            {{ $arsip->instansi->nama_instansi }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Unit Pengolah
                        </div>
                        <div class="mtd">
                            {{ $arsip->unit_pengolah }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Jenis Arsip
                        </div>
                        <div class="mtd">
                            {{ $arsip->jenis_arsip }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Media Simpan
                        </div>
                        <div class="mtd">
                            {{ $arsip->media }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Sarana Temu Kembali
                        </div>
                        <div class="mtd">
                            {{ $arsip->sarana_temu_kembali }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Volume/Jumlah
                        </div>
                        <div class="mtd">
                            {{ $arsip->jumlah }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Periode (Kurun Waktu)
                        </div>
                        <div class="mtd">
                            {{ $arsip->kurun_waktu }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Retensi/Masa Simpan
                        </div>
                        <div class="mtd">
                            {{ $arsip->jangka_simpan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Tingkat Keaslian
                        </div>
                        <div class="mtd">
                            {{ $arsip->tingkat_perkembangan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Sifat Kerahasiaan
                        </div>
                        <div class="mtd">
                            {{ $arsip->sifat_kerahasiaan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Lokasi Simpan
                        </div>
                        <div class="mtd">
                            {{ $arsip->lokasi_simpan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Sarana Simpan
                        </div>
                        <div class="mtd">
                            {{ $arsip->sarana_simpan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Metode Perlindungan
                        </div>
                        <div class="mtd">
                            {{ $arsip->metode_perlindungan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Berita Acara
                        </div>
                        <div class="mtd">
                            {{ $arsip->berita_acara }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Keterangan
                        </div>
                        <div class="mtd">
                            {{ $arsip->keterangan }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Nama Pendata
                        </div>
                        <div class="mtd">
                            {{ $arsip->nama_pendata }}
                        </div>
                    </div>
                    <div class="mtr">
                        <div class="mth">
                            Waktu Pendataan
                        </div>
                        <div class="mtd">
                            {{ $arsip->waktu_pendataan}}
                        </div>
                    </div>
                </div>
                </div>
                <div class="col m-3">
                    <div class="row">
                        <h5><b> Preview Arsip </b></h5>
                        <div id="pdf-viewer-view_{{ $arsip->id }}" class="form-control" style="height: 25rem; overflow:auto"></div>
                    </div>
                    <div class="row mt-4 ">
                        <h5><b> Aksi </b></h5>
                        <a class="btn btn-dark btnlink text-center mb-2" href="{{ route('arsip.view', $arsip->id) }}" target="_blank">Lihat Arsip</a>
                        <a class="btn btn-dark btnlink text-center mb-2" href="{{ route('arsip.download', $arsip->id) }}" download>Download Arsip</a>
                        <a class="btn btn-dark btnlink text-center mb-2 download-kartu" href="#" data-id="{{ $arsip->id }}" data-instansi-id="{{ $arsip->instansi_id }}">Download Kartu Pendataan</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
