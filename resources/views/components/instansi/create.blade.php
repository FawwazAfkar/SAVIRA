<!-- Modal <<<instansi is the same as unit kerja>>> -->
<div class="modal fade" id="inputInstansi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Tambah Unit Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('instansi.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-6">
              <div class="form-floating mb-3 col-12">
                <input id="nama_instansi" name="nama_instansi" type="text" class="form-control" placeholder="" required>
                <label for="nama_instansi" class="form-label">{{ __('Nama Unit Kerja') }}</label>
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
  
    