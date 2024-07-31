@extends('layouts.app')


@section('content')
<div class="custom-container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR ARSIP VITAL') }}</h2>
                    @can('createArsips')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputArsip">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah Arsip</span>
                    </button>
                    @endcan
                </div>
            </div>

            {{-- DataTables --}}
            <script>
                $(document).ready(function() {
                    $('#data').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Aksi)
                                }
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Aksi)
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Aksi)
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Aksi)
                                }
                            },
                            {
                                extend: 'pdf',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Aksi)
                                },
                                customize: function (doc) {
                                    doc.defaultStyle.fontSize = 8; // Change the default font size for the table content
                                    doc.styles.tableHeader.fontSize = 10; // Change the font size for table headers
                                    doc.content[1].table.widths = [
                                        '3%',   // No
                                        '20%',  // Jenis Arsip
                                        '10%',  // Tingkat Perkembangan
                                        '10%',  // Kurun Waktu
                                        '5%',  // Media
                                        '7%',  // Jumlah
                                        '5%',  // Jangka Simpan
                                        '10%',  // Metode Perlindungan
                                        '5%',  // Lokasi Simpan
                                        '13%',  // Keterangan
                                        '12%'   // Instansi
                                    ];

                                     // Center align the "No" column
                                    doc.content[1].table.body.forEach(function(row) {
                                        row[0].alignment = 'center';
                                        row[2].alignment = 'center';
                                        row[3].alignment = 'center';
                                        row[4].alignment = 'center';
                                        row[5].alignment = 'center';
                                        row[6].alignment = 'center';
                                        row[7].alignment = 'center';
                                        row[8].alignment = 'center';
                                    });

                                }
                            },

                            {
                                extend: 'colvis',
                                text: 'Column Visibility',
                                columns: ':not(:last-child)' // Exclude the last column (Aksi)
                            }
                        ],
                        scrollX: true
                    });
                });
            </script>

            <x-arsip.create />

            {{-- call alert --}}
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
            
            <table id="data" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Arsip</th>
                        <th>Tingkat Perkembangan</th>
                        <th>Kurun Waktu</th>
                        <th>Media</th>
                        <th>Jumlah</th>
                        <th>Jangka Simpan</th>
                        <th>Metode Perlindungan</th>
                        <th>Lokasi Simpan</th>
                        <th>Keterangan</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($arsips as $arsip)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $arsip->jenis_arsip }}</td>
                            <td>{{ $arsip->tingkat_perkembangan }}</td>
                            <td>{{ $arsip->kurun_waktu }}</td>
                            <td>{{ $arsip->media }}</td>
                            <td>{{ $arsip->jumlah }}</td>
                            <td>{{ $arsip->jangka_simpan }}</td>
                            <td>{{ $arsip->metode_perlindungan }}</td>
                            <td>{{ $arsip->lokasi_simpan }}</td>
                            <td>{{ $arsip->keterangan }}</td>
                            <td>{{ $arsip->instansi->nama_instansi }}</td>
                            <td>
                                <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-between">
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
                        <x-arsip.view :arsip="$arsip" :show="false"/>
                        <x-arsip.update :arsip="$arsip"/>
                        <x-arsip.delete :arsip="$arsip"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
