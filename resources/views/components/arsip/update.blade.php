@props(['arsip'])
<!-- Update Modal -->
<div class="modal fade" id="updateArsip{{ $arsip->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-file-url="{{ route('arsip.view', $arsip->id) }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4">Update Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <form class="row g-3" method="POST" action="{{ route('arsip.update', $arsip->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 col-12">
                                <label for="jenis_arsip" class="form-label ms-1 fs-5">{{ __('Jenis Arsip') }}</label>
                                <input id="jenis_arsip" name="jenis_arsip" type="text" class="form-control" placeholder="" value="{{ $arsip->jenis_arsip }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="tingkat_perkembangan" class="form-label ms-1 fs-5">{{ __('Tingkat Perkembangan') }}</label>
                                <input id="tingkat_perkembangan" name="tingkat_perkembangan" type="text" class="form-control" placeholder="" value="{{ $arsip->tingkat_perkembangan }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="kurun_waktu" class="form-label ms-1 fs-5">{{ __('Kurun Waktu') }}</label>
                                <input id="kurun_waktu" name="kurun_waktu" type="text" class="form-control" placeholder="" value="{{ $arsip->kurun_waktu }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="media" class="form-label ms-1 fs-5">{{ __('Media') }}</label>
                                <input id="media" name="media" type="text" class="form-control" placeholder="" value="{{ $arsip->media }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="jumlah" class="form-label ms-1 fs-5">{{ __('Jumlah') }}</label>
                                <input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="" value="{{ $arsip->jumlah }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="jangka_simpan" class="form-label ms-1 fs-5">{{ __('Jangka Simpan') }}</label>
                                <input id="jangka_simpan" name="jangka_simpan" type="text" class="form-control" placeholder="" value="{{ $arsip->jangka_simpan }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="metode_perlindungan" class="form-label ms-1 fs-5">{{ __('Metode Perlindungan') }}</label>
                                <input id="metode_perlindungan" name="metode_perlindungan" type="text" class="form-control" placeholder="" value="{{ $arsip->metode_perlindungan }}" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="lokasi_simpan" class="form-label ms-1 fs-5">{{ __('Lokasi Simpan') }}</label>
                                <input id="lokasi_simpan" name="lokasi_simpan" type="text" class="form-control" placeholder="" value="{{ $arsip->lokasi_simpan }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 col-12">
                              <label for="unit_pengolah" class="form-label ms-1 fs-5">{{ __('Unit Pengolah') }}</label>
                              <input id="unit_pengolah" name="unit_pengolah" type="text" class="form-control" placeholder="" value="{{ $arsip->unit_pengolah }}" required>
                            </div>
                            <div class="mb-3 col-12">
                              <label for="sarana_temu_kembali" class="form-label ms-1 fs-5">{{ __('Sarana Temu Kembali') }}</label>
                              <input id="sarana_temu_kembali" name="sarana_temu_kembali" type="text" class="form-control" placeholder="" value="{{ $arsip->sarana_temu_kembali }}" required>
                            </div>
                            <div class="mb-3 col-12">
                              <label for="sifat_kerahasiaan" class="form-label ms-1 fs-5">{{ __('Sifat Kerahasiaan') }}</label>
                              <input id="sifat_kerahasiaan" name="sifat_kerahasiaan" type="text" class="form-control" placeholder="" value="{{ $arsip->sifat_kerahasiaan }}" required>
                            </div>
                            <div class="mb-3 col-12">
                              <label for="sarana_simpan" class="form-label ms-1 fs-5">{{ __('Sarana Simpan') }}</label>
                              <input id="sarana_simpan" name="sarana_simpan" type="text" class="form-control" placeholder="" value="{{ $arsip->sarana_simpan }}" required>
                            </div>
                            <div class="mb-3 col-12">
                              <label for="nama_pendata" class="form-label ms-1 fs-5">{{ __('Nama Pendata') }}</label>
                              <input id="nama_pendata" name="nama_pendata" type="text" class="form-control" placeholder="" value="{{ $arsip->nama_pendata }}" required>
                            </div>
                            <div class="mb-3 col-12">
                              <label for="berita_acara" class="form-label ms-1 fs-5">{{ __('Berita Acara') }}</label>
                              <input id="berita_acara" name="berita_acara" type="text" class="form-control" placeholder="" value="{{ $arsip->berita_acara }}">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="keterangan" class="form-label ms-1 fs-5">{{ __('Keterangan') }}</label>
                                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="" style="height: 8rem">{{ $arsip->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 col-12">
                                <label for="file_update_{{ $arsip->id }}" class="form-label ms-1 fs-5">{{ __('Upload File (PDF)') }}</label>
                                <input class="form-control" type="file" id="file_update_{{ $arsip->id }}" name="file" accept=".pdf">
                                <p class="form-text text-muted fs-6 ms-1">
                                    Kosongkan jika tidak ingin mengganti file.<br> File yang diupload harus berformat PDF berukuran kurang dari 50MB.
                                </p>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="file_preview" class="form-label ms-1 fs-5">{{ __('Preview File') }}</label>
                                <div id="pdf-viewer-update_{{ $arsip->id }}" class="form-control" style="height: 17.5rem; overflow:auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>