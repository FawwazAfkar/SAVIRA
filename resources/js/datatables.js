$(document).ready(function() {
    $('#data').DataTable(
        {
            dom:
                "<'row align-items-center justify-content-between'<'col-md-6 mb-3'B><'col-md-3 mb-3'f>>" + // Top left: Buttons | Top right: Search
                "<'row'<'col-12 mb-3'tr>>" +                                        // Table
                "<'row'<'col-md-6 mb-3'<'d-flex justify-content-start'l>><'col-md-6 mb-3'<'d-flex justify-content-end'p>>", // Bottom left: Page length | Bottom right: Pagination
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: 'Salin',
                    className: 'btn btn-primary',
                    titleAttr: 'Copy to clipboard',
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

            language: {
                search: '<span class="visually-hidden">Search:</span> _INPUT_',
                searchPlaceholder: "Cari...",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ditemukan entri yang cocok",
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