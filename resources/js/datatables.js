$(document).ready(function() {
    $('#data').DataTable(
        {
            dom:
                "<'row align-items-center justify-content-between'<'col-md-6 mb-3'B><'col-md-3 mb-3'f>>" + // Top left: Buttons | Top right: Search
                "<'row'<'col-12 mb-3'tr>>" +                                        // Table
                "<'row'<'col-md-6 mb-3'<'d-flex justify-content-start'l>><'col-md-6 mb-3'<'d-flex justify-content-end'p>>", // Bottom left: Page length | Bottom right: Pagination
            buttons: [
                {   
                    // Custom Copy button ft. SweetAlert2
                    text: 'Salin',
                    className: 'btn btn-secondary',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData({
                            columns: config.exportOptions.columns
                        });

                        var header = data.header.join('\t') + '\n';
                        var body = data.body.map(function(row) {
                            return row.join('\t');
                        }).join('\n');

                        var clipboardData = header + body;

                        var $temp = $('<textarea>').appendTo('body');
                        $temp.val(clipboardData).select();
                        document.execCommand('copy');
                        $temp.remove()
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil disalin',
                        });
                    },
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    className: 'btn btn-info',
                    titleAttr: 'Export to CSV',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    titleAttr: 'Export to Excel',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    titleAttr: 'Export to PDF',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                    },
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 10;
                        var tableBody = doc.content[1].table.body;
                        var rowCount = tableBody.length;
                        var columnCount = tableBody[0].length;
                        doc.content[1].margin = [0, 0, 0, 0];
                        doc.content[1].table.widths = Array(columnCount).fill('*');
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell, index) {
                                if (index !== 1) {
                                    cell.alignment = 'center';
                                }
                            });
                        });
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-warning',
                    titleAttr: 'Print table',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Kolom',
                    className: 'btn btn-secondary',
                    titleAttr: 'Toggle column visibility'
                }
            ],
            info: false,
            ordering: true,

            searchClass: 'form-control',

            language: {
                search: '<span class="visually-hidden"></span> _INPUT_',
                searchPlaceholder: "Cari...",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ditemukan entri yang cocok",
                emptyTable: "Tidak ada data yang tersedia",
                buttons :
                {
                    copyTitle: 'Salin ke clipboard',
                    copySuccess: {
                        _: '%d baris disalin',
                        1: '1 baris disalin'
                    }
                }
            },

            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            scrollX: true,
        }
    );
});


// Data table for Arsip Vital's Table
$(document).ready(function() {
    $('#dataarsip').DataTable(
        {
            dom:
                "<'row align-items-center justify-content-between'<'col-md-6 mb-3'B><'col-md-3 mb-3'f>>" + // Top left: Buttons | Top right: Search
                "<'row'<'col-12 mb-3'tr>>" +                                        // Table
                "<'row'<'col-md-6 mb-3'<'d-flex justify-content-start'l>><'col-md-6 mb-3'<'d-flex justify-content-end'p>>", // Bottom left: Page length | Bottom right: Pagination
            buttons: [
                {   
                    // Custom Copy button ft. SweetAlert2
                    text: 'Salin',
                    className: 'btn btn-secondary',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData({
                            columns: config.exportOptions.columns
                        });

                        var header = data.header.join('\t') + '\n';
                        var body = data.body.map(function(row) {
                            return row.join('\t');
                        }).join('\n');

                        var clipboardData = header + body;

                        var $temp = $('<textarea>').appendTo('body');
                        $temp.val(clipboardData).select();
                        document.execCommand('copy');
                        $temp.remove()
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil disalin',
                        });
                    },
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    },
                    action: function (e, dt, button, config) {
                        // Manually copy data to clipboard
                        var data = dt.buttons.exportData({
                            columns: config.exportOptions.columns
                        });

                        var header = data.header.join('\t') + '\n';
                        var body = data.body.map(function(row) {
                            return row.join('\t');
                        }).join('\n');

                        var clipboardData = header + body;

                        var $temp = $('<textarea>').appendTo('body');
                        $temp.val(clipboardData).select();
                        document.execCommand('copy');
                        $temp.remove();



                        // Trigger SweetAlert2 notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Tersalin!',
                            text: 'Data berhasil disalin ke clipboard.',
                            timer: 3000,
                            showConfirmButton: true,
                            confirmButtonColor: 'blue'
                        });
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    className: 'btn btn-info',
                    titleAttr: 'Export to CSV',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    titleAttr: 'Export to Excel',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    titleAttr: 'Export to PDF',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Daftar Arsip',
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                        //delete title "Data Arsip" from exported pdf
                        title: ':null'
                    },
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 10;
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

                        var tableBody = doc.content[1].table.body;
                        var rowCount = tableBody.length;
                        var columnCount = tableBody[0].length;
                        doc.content[1].margin = [0, 0, 0, 0];
                        doc.content[1].table.widths = Array(columnCount).fill('*');
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell, index) {
                                if (index !== 1) {
                                    cell.alignment = 'center';
                                }
                            });
                        });
                        doc.content.splice(0, 0, {
                            columns: [
                                {
                                    stack: [
                                        { text: 'PEMERINTAH KABUPATEN BANYUMAS', fontSize: 14, bold: true, alignment: 'center' },
                                        { text: 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH', fontSize: 16, bold: true, alignment: 'center' },
                                        { text: 'Jalan Jenderal Gatot Subroto Nomor.85, Purwokerto, Banyumas, Kode Pos 53116', fontSize: 10, alignment: 'center' },
                                        { text: 'Telepon (0281) 636115, Faksimile (0281) 636225', fontSize: 10, alignment: 'center' },
                                        { text: 'Website : www.dinarpus.banyumaskab.go.id, E-mail : arpusdabanyumas@gmail.com', fontSize: 10, alignment: 'center', color: 'blue' }
                                    ],
                                    margin: [0, 0, 0, 5] // Margin bawah setelah kop
                                }
                            ],
                            columnGap: 10 // Jarak antara logo dan teks
                        });
                        // Garis bawah pertama
                        doc.content.splice(1, 0, {
                            canvas: [{
                                type: 'line',
                                x1: 0,
                                y1: 0,
                                x2: 841 - 80, // Mengatur panjang garis agar mencapai tepi kertas lanskap
                                y2: 0,
                                lineWidth: 1.5 // Tebal garis pertama
                            }]
                        });

                        // Garis bawah kedua
                        doc.content.splice(2, 0, {
                            canvas: [{
                                type: 'line',
                                x1: 0,
                                y1: 2, // Jarak antara garis pertama dan kedua
                                x2: 841 - 80, // Mengatur panjang garis agar mencapai tepi kertas lanskap
                                y2: 2,
                                lineWidth: 0.75 // Tebal garis kedua lebih tipis
                            }],
                            margin: [0, 0, 0, 12] // Margin bawah untuk memberi ruang sebelum tabel dimulai
                        });

                        //menghapus judul "Data Arsip" dari pdf
                        doc.content.splice(3, 1);
                        
                        // Mengatur posisi teks di tengah sel
                        doc.styles.tableBodyEven = { alignment: 'center' };
                        doc.styles.tableBodyOdd = { alignment: 'center' };
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-warning',
                    titleAttr: 'Print table',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Kolom',
                    className: 'btn btn-secondary',
                    titleAttr: 'Toggle column visibility'
                }
            ],
            info: false,
            ordering: true,

            searchClass: 'form-control',

            language: {
                search: '<span class="visually-hidden"></span> _INPUT_',
                searchPlaceholder: "Cari...",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ditemukan entri yang cocok",
                emptyTable: "Tidak ada data yang tersedia",
                buttons :
                {
                    copyTitle: 'Salin ke clipboard',
                    copySuccess: {
                        _: '%d baris disalin',
                        1: '1 baris disalin'
                    }
                }
            },

            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            scrollX: true,
        }
    );
});