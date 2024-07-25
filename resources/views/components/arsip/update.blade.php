  @props(['arsip'])
  <!-- Modal -->
  <div class="modal fade" id="updateArsip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Update Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('arsip.update', $arsip->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col p-8">
                            <div class="mt-4">
                                <label for="jenis_arsip" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Jenis Arsip') }}
                                </label>
                                <input id="jenis_arsip" name="jenis_arsip" type="text" class="mt-1 block w-full" value="{{ $arsip->jenis_arsip }}" required>
                            </div>
                            
                            <div class="mt-4">
                                <label for="tingkat_perkembangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Tingkat Perkembangan') }}
                                </label>
                                <input id="tingkat_perkembangan" name="tingkat_perkembangan" type="text" class="mt-1 block w-full" value="{{ $arsip->tingkat_perkembangan }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="kurun_waktu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Kurun Waktu') }}
                                </label>
                                <input id="kurun_waktu" name="kurun_waktu" type="text" class="mt-1 block w-full" value="{{ $arsip->kurun_waktu }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="media" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Media') }}
                                </label>
                                <input id="media" name="media" type="text" class="mt-1 block w-full" value="{{ $arsip->media }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Jumlah') }}
                                </label>
                                <input id="jumlah" name="jumlah" type="text" class="mt-1 block w-full" value="{{ $arsip->jumlah }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="jangka_simpan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Jangka Simpan') }}
                                </label>
                                <input id="jangka_simpan" name="jangka_simpan" type="text" class="mt-1 block w-full" value="{{ $arsip->jangka_simpan }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="metode_perlindungan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Metode Perlindungan') }}
                                </label>
                                <input id="metode_perlindungan" name="metode_perlindungan" type="text" class="mt-1 block w-full" value="{{ $arsip->metode_perlindungan }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="lokasi_simpan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Lokasi Simpan') }}
                                </label>
                                <input id="lokasi_simpan" name="lokasi_simpan" type="text" class="mt-1 block w-full" value="{{ $arsip->lokasi_simpan }}" required>
                            </div>
                
                            <div class="mt-4">
                                <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Keterangan') }}</label>
                                <textarea id="keterangan" name="keterangan" class="mt-1 block w-full">{{ $arsip->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="col p-8">
                            <div id="filePreview" class="mb-4">
                                <embed src="{{ asset($arsip->file) }}" type="application/pdf" style="width: 100%; height: 50vh;" class="embed-responsive"/>
                            </div>
                            <div class="mt-4">
                                <label for="file">{{ __('Upload Files (PDF)') }}</label>
                                <input class="form-control mt-1 block w-full" type="file" id="file" name="file" accept="application/pdf">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            </form>
            </div>
      </div>
    </div>
  </div>
