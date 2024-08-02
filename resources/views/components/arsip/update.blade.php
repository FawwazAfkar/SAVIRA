@props(['arsip'])
<!-- Update Modal -->
<div class="modal fade" id="updateArsip{{ $arsip->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-file-url="{{ asset('storage/arsipvital/' . $arsip->file) }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Update Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <form class="row g-3" method="POST" action="{{ route('arsip.update', $arsip->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 col-12">
                                <input id="jenis_arsip" name="jenis_arsip" type="text" class="form-control" placeholder="" value="{{ $arsip->jenis_arsip }}" required>
                                <label for="jenis_arsip" class="form-label">{{ __('Jenis Arsip') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="tingkat_perkembangan" name="tingkat_perkembangan" type="text" class="form-control" placeholder="" value="{{ $arsip->tingkat_perkembangan }}" required>
                                <label for="tingkat_perkembangan" class="form-label">{{ __('Tingkat Perkembangan') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="kurun_waktu" name="kurun_waktu" type="text" class="form-control" placeholder="" value="{{ $arsip->kurun_waktu }}" required>
                                <label for="kurun_waktu" class="form-label">{{ __('Kurun Waktu') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="media" name="media" type="text" class="form-control" placeholder="" value="{{ $arsip->media }}" required>
                                <label for="media" class="form-label">{{ __('Media') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="" value="{{ $arsip->jumlah }}" required>
                                <label for="jumlah" class="form-label">{{ __('Jumlah') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="jangka_simpan" name="jangka_simpan" type="text" class="form-control" placeholder="" value="{{ $arsip->jangka_simpan }}" required>
                                <label for="jangka_simpan" class="form-label">{{ __('Jangka Simpan') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="metode_perlindungan" name="metode_perlindungan" type="text" class="form-control" placeholder="" value="{{ $arsip->metode_perlindungan }}" required>
                                <label for="metode_perlindungan" class="form-label">{{ __('Metode Perlindungan') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input id="lokasi_simpan" name="lokasi_simpan" type="text" class="form-control" placeholder="" value="{{ $arsip->lokasi_simpan }}" required>
                                <label for="lokasi_simpan" class="form-label">{{ __('Lokasi Simpan') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 col-12">
                                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="" style="height: 8.3rem">{{ $arsip->keterangan }}</textarea>
                                <label for="keterangan" class="form-label">{{ __('Keterangan') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <input class="form-control" type="file" id="file_update_{{ $arsip->id }}" name="file" accept=".pdf">
                                <label for="file_update_{{ $arsip->id }}" class="form-label">{{ __('Upload Files (PDF)') }}</label>
                            </div>
                            <div class="form-floating mb-3 col-12">
                                <div id="pdf-viewer-update_{{ $arsip->id }}" class="form-control" style="height: 17.5rem; overflow:auto"></div>
                                <label for="file_preview" class="form-label">{{ __('Preview File') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>