<!-- Modal -->
<div class="modal fade" id="inputArsip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Tambah Arsip</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('arsip.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-6">
              <div class="form-floating mb-3 col-12">
                <input id="jenis_arsip" name="jenis_arsip" type="text" class="form-control" placeholder="" required>
                <label for="jenis_arsip" class="form-label">{{ __('Jenis Arsip') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="tingkat_perkembangan" name="tingkat_perkembangan" type="text" class="form-control" placeholder="" required>
                <label for="tingkat_perkembangan" class="form-label">{{ __('Tingkat Perkembangan') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="kurun_waktu" name="kurun_waktu" type="text" class="form-control" placeholder="" required>
                <label for="kurun_waktu" class="form-label">{{ __('Kurun Waktu') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="media" name="media" type="text" class="form-control" placeholder="" required>
                <label for="media" class="form-label">{{ __('Media') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="" required>
                <label for="jumlah" class="form-label">{{ __('Jumlah') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="jangka_simpan" name="jangka_simpan" type="text" class="form-control" placeholder="" required>
                <label for="jangka_simpan" class="form-label">{{ __('Jangka Simpan') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="metode_perlindungan" name="metode_perlindungan" type="text" class="form-control" placeholder="" required>
                <label for="metode_perlindungan" class="form-label">{{ __('Metode Perlindungan') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="lokasi_simpan" name="lokasi_simpan" type="text" class="form-control" placeholder="" required>
                <label for="lokasi_simpan" class="form-label">{{ __('Lokasi Simpan') }}</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 col-12">
                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="" style="height: 8.3rem"></textarea>
                <label for="keterangan" class="form-label">{{ __('Keterangan') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input class="form-control" type="file" id="file" name="file" required>
                <label for="file" class="form-label">{{ __('Upload Files (PDF)') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <iframe id="viewer" class="form-control" style="height: 17.5rem;"></iframe>
                <label for="file_preview" class="form-label">{{ __('Preview File') }}</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- JavaScript for File Preview -->
  <script>
    document.getElementById('file').addEventListener('change', function(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
  
      reader.onload = function(e) {
        var previewContainer = document.getElementById('viewer');
        previewContainer.src = '';
  
        if (file.type === 'application/pdf') {
          previewContainer.src = e.target.result;
        } else {
          alert('File type not supported for preview.');
        }
      };
  
      reader.readAsDataURL(file);
    });
  </script>
    