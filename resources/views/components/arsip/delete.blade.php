@props(['arsip'])
<div class="modal fade" id="deleteArsip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Hapus Arsip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('arsip.destroy', $arsip->id) }}">
                    @csrf
                    @method('POST')
                    <div class="p-6">
                        <p class="mt-4">{{ __('Apakah Anda yakin ingin menghapus arsip ini?') }}</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Delete') }}</button>
            </form>
            </div>
      </div>
    </div>
  </div>
