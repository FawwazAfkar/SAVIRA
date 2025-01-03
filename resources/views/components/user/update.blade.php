@props(['instansis','user'])
<!-- Modal -->
<div class="modal fade" id="updateUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4">Update User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mt-3">
          <form class="row g-3" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-8">
              <div class="mb-3 col-12">
                <label for="name" class="form-label ms-1 fs-5">{{ __('Nama') }}</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="" value="{{ $user->name }}" required>
              </div>
              <div class="mb-3 col-12">
                <label for="email" class="form-label ms-1 fs-5">{{ __('E-Mail') }}</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="" value="{{ $user->email }}" required>
              </div>
              <div class="mb-3 col-12">
                <label for="password" class="form-label ms-1 fs-5">{{ __('Password') }}</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="">
                <span id="passwordHelpBlock" class="form-text text-muted fs-6 ms-1">
                  Kosongkan jika tidak ingin mengganti password. Password minimal memiliki 8 karakter.
                </span>
              </div>
              @if(auth()->user()->hasRole('SuperAdmin'))
                <div class="mb-3 col-12">
                  <label for="role" class="form-label ms-1 fs-5">{{ __('Role') }}</label>
                  <select id="role" name="role" class="form-select" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                  </select>
                </div>
                <div class="mb-3 col-12">
                  <label for="instansi" class="form-label ms-1 fs-5">{{ __('Instansi / Unit Kerja') }}</label>
                  <select id="instansi_id" name="instansi_id" class="form-select" required>
                    @foreach($instansis as $instansi)
                      <option value="{{ $instansi->id }}" {{ $user->instansi_id == $instansi->id ? 'selected' : '' }}>{{ $instansi->nama_instansi }}</option>
                    @endforeach
                  </select>
                </div>
              @elseif(auth()->user()->hasRole('Admin'))
                <div class="mb-3 col-12">
                  <label for="role" class="form-label ms-1 fs-5">{{ __('Role') }}</label>
                  <select id="role" name="role" class="form-select" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                  </select>
                </div>
                <div class="mb-3 col-12">
                  <label for="instansi" class="form-label ms-1 fs-5">{{ __('Instansi / Unit Kerja') }}</label>
                  <select id="instansi_id" name="instansi_id" class="form-select" required>
                    <option value="{{ $user->instansi_id }}" selected>{{ $user->instansi->nama_instansi }}</option>
                  </select>
                </div>
              @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">{{ __('Batal') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
