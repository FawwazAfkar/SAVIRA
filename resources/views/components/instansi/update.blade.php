@props(['instansi'])
<!-- Update Modal <<<Instansi is the same as Unit Kerja>>> -->
<div class="modal fade" id="updateInstansi{{ $instansi->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4">Update Unit Kerja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <form class="row g-3" method="POST" action="{{ route('instansi.update', $instansi->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 col-12">
                                <label for="nama_instansi" class="form-label ms-1 fs-5">{{ __('Nama Unit Kerja') }}</label>
                                <input id="nama_instansi" name="nama_instansi" type="text" class="form-control" placeholder="" value="{{ $instansi->nama_instansi }}" required>
                            </div>
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
