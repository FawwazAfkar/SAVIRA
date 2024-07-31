@extends('layouts.app')


@section('content')
<div class="container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR USER') }}</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputUser">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah User</span>
                    </button>
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
                                        '5%',   // No
                                        '10%',  // Jenis Arsip
                                        '10%',
                                        '5%',
                                        '20%'
                                    ];

                                     // Center align the "No" column
                                    doc.content[1].table.body.forEach(function(row) {
                                        row[0].alignment = 'center';
                                        row[3].alignment = 'center';
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

            <x-user.create :instansi="$instansis"/>

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
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Role</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->instansi->nama_instansi }}</td>
                            <td>
                                <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-start">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUser{{ $user->id }}"><i class='bx bx-edit'></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"><i class='bx bx-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-user.update :instansis="$instansis" :user="$user"/>
                        <x-user.delete :user="$user"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
