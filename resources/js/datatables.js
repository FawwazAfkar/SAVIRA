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
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
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