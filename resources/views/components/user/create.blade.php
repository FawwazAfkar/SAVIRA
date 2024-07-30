@props(['instansi'])
<!-- Modal -->
<div class="modal fade" id="inputUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Tambah User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-md-8">
              <div class="form-floating mb-3 col-12">
                <input id="name" name="name" type="text" class="form-control" placeholder="" required>
                <label for="name" class="form-label">{{ __('Nama') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="email" name="email" type="email" class="form-control" placeholder="" required>
                <label for="email" class="form-label">{{ __('E-Mail') }}</label>
              </div>
              <div class="form-floating mb-3 col-12">
                <input id="password" name="password" type="password" class="form-control" placeholder="" required>
                <label for="password" class="form-label">{{ __('Password') }}</label>
              </div>
              @if(auth()->user()->hasRole('SuperAdmin'))
                <div class="form-floating mb-3 col-12">
                  <select id="role" name="role" class="form-select" required>
                    <option value="" selected disabled>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                  <label for="role" class="form-label">{{ __('Role') }}</label>
                </div>
                <div class="form-floating mb-3 col-12">
                  <select id="instansi_id" name="instansi_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Instansi</option>
                    @foreach($instansi as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_instansi }}</option>
                    @endforeach
                  </select>
                  <label for="instansi" class="form-label">{{ __('Instansi / Unit Kerja') }}</label>
                </div>
              @elseif(auth()->user()->hasRole('Admin')) 
                <div class="form-floating mb-3 col-12">
                  <select id="role" name="role" class="form-select" required>
                    <option value="user" selected>User</option>
                  </select>
                  <label for="role" class="form-label">{{ __('Role') }}</label>
                </div>
                <div class="form-floating mb-3 col-12">
                  <select id="instansi_id" name="instansi_id" class="form-select" required>
                    <option value="{{ auth()->user()->instansi_id }}" selected>{{ auth()->user()->instansi->nama_instansi }}</option>
                  </select>
                  <label for="instansi" class="form-label">{{ __('Instansi / Unit Kerja') }}</label>
                </div>
              @endif
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
  
