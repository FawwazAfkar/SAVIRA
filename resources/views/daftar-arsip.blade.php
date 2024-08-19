@extends('layouts.app')


@section('content')
<div class="custom-container">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 m-2">
                <div class="d-flex justify-content-between text-center">
                    <h2 class="text-xl text-start me-2 font-semibold leading-tight">{{ __('DAFTAR ARSIP VITAL') }}</h2>
                    @can('createArsips')
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#inputArsip">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah Arsip</span>
                    </button>
                    @endcan
                </div>
            </div>

            {{-- Call Modal --}}
            <x-arsip.create />

            {{-- Call Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Arsip Vital Table --}}
            <table id="dataarsip" class="table table-responsive table-bordered table-striped display align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="jenis-arsip">Jenis Arsip</th>
                        <th>Tingkat Perkembangan</th>
                        <th class="text-start">Kurun Waktu</th>
                        <th>Media</th>
                        <th id="jumlah">Jumlah</th>
                        <th>Jangka Simpan</th>
                        <th>Metode Perlindungan</th>
                        <th>Lokasi Simpan</th>
                        <th class="keterangan">Keterangan</th>
                        @hasrole('SuperAdmin')<th class="instansi">Unit Kerja</th>@endhasrole
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($arsips as $arsip)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $arsip->jenis_arsip }}</td>
                            <td>{{ $arsip->tingkat_perkembangan }}</td>
                            <td class="text-center">{{ $arsip->kurun_waktu }}</td>
                            <td>{{ $arsip->media }}</td>
                            <td>{{ $arsip->jumlah }}</td>
                            <td>{{ $arsip->jangka_simpan }}</td>
                            <td>{{ $arsip->metode_perlindungan }}</td>
                            <td>{{ $arsip->lokasi_simpan }}</td>
                            <td>{{ $arsip->keterangan }}</td>
                            @hasrole('SuperAdmin')<td>{{ $arsip->instansi->nama_instansi }}</td>@endhasrole
                            <td class="align-middle">
                                <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewArsip{{ $arsip->id }}"><i class='bx bx-info-circle'></i></button>
                                    @can('editArsips')
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateArsip{{ $arsip->id }}"><i class='bx bx-edit'></i></button>
                                    @endcan
                                    @can('deleteArsips')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteArsip{{ $arsip->id }}"><i class='bx bx-trash'></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-arsip.update :arsip="$arsip"/>
                        <x-arsip.delete :arsip="$arsip"/>
                        <x-arsip.view :arsip="$arsip" :show="false"/>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="jenis-arsip">Jenis Arsip</th>
                        <th>Tingkat Perkembangan</th>
                        <th class="text-start">Kurun Waktu</th>
                        <th>Media</th>
                        <th id="jumlah">Jumlah</th>
                        <th>Jangka Simpan</th>
                        <th>Metode Perlindungan</th>
                        <th>Lokasi Simpan</th>
                        <th class="keterangan">Keterangan</th>
                        @hasrole('SuperAdmin')<th class="instansi">Unit Kerja</th>@endhasrole
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{{-- Send role for filtering (Super Admin only) --}}
<script>
    var userRole = "{{ Auth::user()->role }}";
    var instansi = "{{ Auth::user()->instansi->nama_instansi }}";
</script>
@endsection
