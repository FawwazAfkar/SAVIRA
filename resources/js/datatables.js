import { auto } from '@popperjs/core';
import { logoBase64 } from './constant.js';

$(document).ready(function() {
    var today = new Date();
    var formattedDate = today.getFullYear() + 
        ('0' + (today.getMonth() + 1)).slice(-2) + 
        ('0' + today.getDate()).slice(-2);

    $('#datauser').DataTable(
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
                            title: 'Tersalin!',
                            text: 'Data berhasil disalin ke clipboard.',
                            timer: 1300,
                            showConfirmButton: false
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
                    filename: 'SAVIRA_Data_Pengguna_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Pengguna - ' + formattedDate,   // Set the title with date
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    filename: 'SAVIRA_Data_Pengguna_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Pengguna - ' + formattedDate,   // Set the title with date
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    filename: 'SAVIRA_Data_Pengguna_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Pengguna - ' + formattedDate,   // Set the title with date
                    orientation: 'portrait',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                    },
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 10;
                        doc.styles.tableHeader.fontSize = 12;
                        var tableBody = doc.content[1].table.body;
                        var rowCount = tableBody.length;
                        var columnCount = tableBody[0].length;
                        doc.content[1].margin = [0, 0, 0, 0];
                        doc.content[1].table.widths = auto;
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell, index) {
                                if (index !== 1 && index !== 4) {
                                    cell.alignment = 'center';
                                }
                            });
                        });

                        //styling header with color
                        doc.content[1].table.headerRows = 1;
                        doc.content[1].table.body[0].forEach(function(header) {
                            header.fillColor = 'lightblue';
                        });
                        //add vertical and horizontal line between each columns and rows
                        doc.content[1].layout = 'lightHorizontalLines';
                        doc.content[1].layout = 'lightVerticalLines';

                        //mengatur teks pada sel agar berada di tengah secara vertikal
                        doc.content[1].table.body.forEach(function(row) {
                            row.forEach(function(cell) {
                                cell.margin = [0, 5, 0, 5];
                            });
                        });

                        // Mengatur warna row ganjil dan genap
                        doc.styles.tableHeader = { alignment: 'center' };
                        doc.styles.tableBodyOdd = { fillColor: 'lightgrey' };
                        doc.styles.tableBodyEven = { fillColor: '#ffffff' };
                        var rowCount = doc.content[1].table.body.length;
                        for (var i = 1; i < rowCount; i++) {
                            doc.content[1].table.body[i].forEach(function(cell) {
                                cell.fillColor = (i % 2 === 0) ? 'lightgrey' : '#ffffff';
                            });
                        }

                        doc.content.splice(0, 0, {
                            columns: [
                                {   
                                    width: '15%',
                                    image: logoBase64,
                                    fit: [100, 100],
                                    margin: [0, 0, 0, 0] // margins(ltrb)
                                },
                                {   
                                    width: '*',
                                    stack: [
                                        { text: '\n', fontSize: 20, bold: true, alignment: 'center' },
                                        { text: 'PEMERINTAH KABUPATEN BANYUMAS', fontSize: 14, bold: true, alignment: 'center' },
                                        { text: 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH', fontSize: 16, bold: true, alignment: 'center' },
                                        { text: 'Jalan Jenderal Gatot Subroto Nomor.85, Purwokerto, Banyumas, Kode Pos 53116', fontSize: 10, alignment: 'center' },
                                        { text: 'Telepon (0281) 636115, Faksimile (0281) 636225', fontSize: 10, alignment: 'center' },
                                        { text: 'Website : www.dinarpus.banyumaskab.go.id, E-mail : arpusdabanyumas@gmail.com', fontSize: 10, alignment: 'center', color: 'blue' }
                                    ],
                                    margin: [0, 0, 20, 5] // Margin bawah setelah kop
                                }
                            ],
                            columnGap: 5 // Jarak antara logo dan teks
                        });
                        // Garis bawah pertama
                        doc.content.splice(1, 0, {
                            canvas: [{
                                type: 'line',
                                x1: 0,
                                y1: 0,
                                x2: 595 - 80, // Mengatur panjang garis agar mencapai tepi kertas potrait
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
                                x2: 595 - 80, // Mengatur panjang garis agar mencapai tepi kertas lanskap
                                y2: 2,
                                lineWidth: 0.75 // Tebal garis kedua lebih tipis
                            }],
                            margin: [0, 0, 0, 12] // Margin bawah untuk memberi ruang sebelum tabel dimulai
                        });

                        //menghapus judul "Data Arsip" dari pdf
                        doc.content.splice(3, 1);
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

$(document).ready(function() {
    var today = new Date();
    var formattedDate = today.getFullYear() + 
        ('0' + (today.getMonth() + 1)).slice(-2) + 
        ('0' + today.getDate()).slice(-2);

    $('#datainstansi').DataTable(
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
                            title: 'Tersalin!',
                            text: 'Data berhasil disalin ke clipboard.',
                            timer: 1300,
                            showConfirmButton: false
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
                    filename: 'SAVIRA_Data_Unit_Kerja_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Unit Kerja - ' + formattedDate,   // Set the title with date
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    filename: 'SAVIRA_Data_Unit_Kerja_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Unit Kerja - ' + formattedDate,   // Set the title with date
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
                    filename: 'SAVIRA_Data_Unit_Kerja_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Unit Kerja - ' + formattedDate,   // Set the title with date
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                    },
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 10;
                        doc.styles.tableHeader.fontSize = 12;
                        var tableBody = doc.content[1].table.body;
                        var rowCount = tableBody.length;
                        var columnCount = tableBody[0].length;
                        doc.content[1].margin = [0, 0, 0, 0];
                        doc.content[1].table.widths = ['10%', '90%'];
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell, index) {
                                if (index !== 1) {
                                    cell.alignment = 'center';
                                }
                            });
                        });

                        //styling header with color
                        doc.content[1].table.headerRows = 1;
                        doc.content[1].table.body[0].forEach(function(header) {
                            header.fillColor = 'lightblue';
                        });

                        //mengatur teks pada sel agar berada di tengah secara vertikal
                        doc.content[1].table.body.forEach(function(row) {
                            row.forEach(function(cell) {
                                cell.margin = [0, 5, 0, 5];
                            }
                        )});

                        //add vertical and horizontal line between each columns and rows
                        doc.content[1].layout = 'lightHorizontalLines';
                        doc.content[1].layout = 'lightVerticalLines';

                        // Mengatur warna row ganjil dan genap
                        doc.styles.tableHeader = { alignment: 'center' };
                        doc.styles.tableBodyOdd = { fillColor: 'lightgrey' };
                        doc.styles.tableBodyEven = { fillColor: '#ffffff' };
                        var rowCount = doc.content[1].table.body.length;
                        for (var i = 1; i < rowCount; i++) {
                            doc.content[1].table.body[i].forEach(function(cell) {
                                cell.fillColor = (i % 2 === 0) ? 'lightgrey' : '#ffffff';
                            });
                        }

                        doc.content.splice(0, 0, {
                            columns: [
                                {   
                                    width: '15%',
                                    image: logoBase64,
                                    fit: [100, 100],
                                    margin: [0, 0, 0, 0] // margins(ltrb)
                                },
                                {   
                                    width: '*',
                                    stack: [
                                        { text: '\n', fontSize: 20, bold: true, alignment: 'center' },
                                        { text: 'PEMERINTAH KABUPATEN BANYUMAS', fontSize: 14, bold: true, alignment: 'center' },
                                        { text: 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH', fontSize: 16, bold: true, alignment: 'center' },
                                        { text: 'Jalan Jenderal Gatot Subroto Nomor.85, Purwokerto, Banyumas, Kode Pos 53116', fontSize: 10, alignment: 'center' },
                                        { text: 'Telepon (0281) 636115, Faksimile (0281) 636225', fontSize: 10, alignment: 'center' },
                                        { text: 'Website : www.dinarpus.banyumaskab.go.id, E-mail : arpusdabanyumas@gmail.com', fontSize: 10, alignment: 'center', color: 'blue' }
                                    ],
                                    margin: [0, 0, 20, 5] // Margin bawah setelah kop
                                }
                            ],
                            columnGap: 5 // Jarak antara logo dan teks
                        });
                        // Garis bawah pertama
                        doc.content.splice(1, 0, {
                            canvas: [{
                                type: 'line',
                                x1: 0,
                                y1: 0,
                                x2: 595 - 80, // Mengatur panjang garis agar mencapai tepi kertas potrait
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
                                x2: 595 - 80, // Mengatur panjang garis agar mencapai tepi kertas lanskap
                                y2: 2,
                                lineWidth: 0.75 // Tebal garis kedua lebih tipis
                            }],
                            margin: [0, 0, 0, 12] // Margin bawah untuk memberi ruang sebelum tabel dimulai
                        });

                        //menghapus judul "Data Instansi" dari pdf
                        doc.content.splice(3, 1);
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
    var today = new Date();
    var formattedDate = today.getFullYear() + 
        ('0' + (today.getMonth() + 1)).slice(-2) + 
        ('0' + today.getDate()).slice(-2);
        
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
                        });
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    className: 'btn btn-info',
                    filename: 'SAVIRA_Data_Arsip_Vital_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Arsip Vital - ' + formattedDate,   // Set the title with date
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    filename: 'SAVIRA_Data_Arsip_Vital_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Arsip Vital - ' + formattedDate,   // Set the title with date
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    },
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    filename: 'SAVIRA_Data_Arsip_Vital_' + formattedDate,  // Set the filename with date
                    title: 'SAVIRA Data Arsip Vital - ' + formattedDate,   // Set the title with date
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                    },
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 10;
                        doc.styles.tableHeader.fontSize = 12;
                        doc.content[1].table.widths = auto;

                        //styling header with color
                        doc.content[1].table.headerRows = 1;
                        doc.content[1].table.body[0].forEach(function(header) {
                            header.fillColor = 'lightblue';
                        });
                        //add vertical and horizontal line between each columns and rows
                        doc.content[1].layout = 'lightHorizontalLines';
                        doc.content[1].layout = 'lightVerticalLines';

                        var tableBody = doc.content[1].table.body;
                        var rowCount = tableBody.length;
                        var columnCount = tableBody[0].length;
                        doc.content[1].margin = [0, 0, 0, 0];
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell, index) {
                                cell.margin = [0, 5, 0, 5];
                            });
                        });

                        // Mengatur warna row ganjil dan genap
                        doc.styles.tableHeader = { alignment: 'center' };
                        doc.styles.tableBodyOdd = { fillColor: 'lightgrey' };
                        doc.styles.tableBodyEven = { fillColor: '#ffffff' };
                        var rowCount = doc.content[1].table.body.length;
                        for (var i = 1; i < rowCount; i++) {
                            doc.content[1].table.body[i].forEach(function(cell) {
                                cell.fillColor = (i % 2 === 0) ? 'lightgrey' : '#ffffff';
                            });
                        }

                        // Base64-encoded logo image
                        doc.content.splice(0, 0, {
                            columns: [
                                {   
                                    width: '20%',
                                    image: logoBase64,
                                    fit: [120, 120],
                                    margin: [50, 0, 0, 0] // margins(ltrb)
                                },
                                {   
                                    width: '*',
                                    stack: [
                                        { text: '\n', fontSize: 20, bold: true, alignment: 'center' },
                                        { text: 'PEMERINTAH KABUPATEN BANYUMAS', fontSize: 16, bold: true, alignment: 'center' },
                                        { text: 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH', fontSize: 18, bold: true, alignment: 'center' },
                                        { text: 'Jalan Jenderal Gatot Subroto Nomor.85, Purwokerto, Banyumas, Kode Pos 53116', fontSize: 11, alignment: 'center' },
                                        { text: 'Telepon (0281) 636115, Faksimile (0281) 636225', fontSize: 11, alignment: 'center' },
                                        { text: 'Website : www.dinarpus.banyumaskab.go.id, E-mail : arpusdabanyumas@gmail.com', fontSize: 11, alignment: 'center', color: 'blue' }
                                    ],
                                    margin: [0, 0, 20, 0] // Margin bawah setelah kop
                                }
                            ],
                            columnGap: 0 // Jarak antara logo dan teks
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