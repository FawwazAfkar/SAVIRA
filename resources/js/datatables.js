import { auto } from '@popperjs/core';
import { logoBase64 } from './constant.js';

// Data table for User's Table
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

// Data table for Instansi's Table
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
                "<'row' <'col-md-6'B> <'col-md-6' <'row' <'col-12'f> <'col-12 mb-3 d-flex justify-content-end' <'column-filter'> > > > >" +
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
                    title: '',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    },
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var downrows = 4;
                        var clRow = $('row', sheet);

                        clRow.each(function () {
                            var attr = $(this).attr('r');
                            var ind = parseInt(attr);
                            ind = ind + downrows;
                            $(this).attr("r", ind);
                        });

                        $('row c ', sheet).each(function () {
                            var attr = $(this).attr('r');
                            var pre = attr.substring(0, 1);
                            var ind = attr.substring(1, attr.length);
                            ind = parseInt(ind) + downrows;
                            $(this).attr("r", pre + ind);
                        });

                        function Addrow(index, data) {
                            var row = '<row r="' + index + '">';
                            for (var i = 0; i < data.length; i++) {
                                var key = data[i].k;
                                var value = data[i].v;
                                row += '<c t="inlineStr" r="' + key + index + '" s="51">';
                                row += '<is>';
                                row += '<t>' + value + '</t>';
                                row += '</is>';
                                row += '</c>';
                            }
                            row += '</row>';
                            return row;
                        }

                        var rows = [];
                        rows.push(Addrow(1, [{ k: 'A', v: 'DAFTAR ARSIP VITAL' }]));
                        rows.push(Addrow(2, [{ k: 'A', v: instansi.toUpperCase() }]));
                        rows.push(Addrow(3, [{ k: 'A', v: '' }]));
                        rows.push(Addrow(4, [{ k: 'A', v: 'Unit Pengolah : ' }]));

                        sheet.childNodes[0].childNodes[1].innerHTML = rows.join('') + sheet.childNodes[0].childNodes[1].innerHTML;

                        // Merge cells for header
                        function mergeCells(sheet, start, end) {
                            var mergeCells = sheet.getElementsByTagName('mergeCells')[0];
                            var newMergeCell = sheet.createElement('mergeCell');
                            newMergeCell.setAttribute('ref', start + ':' + end);
                            mergeCells.appendChild(newMergeCell);
                        }

                        mergeCells(sheet, 'A1', 'K1');
                        mergeCells(sheet, 'A2', 'K2');
                        mergeCells(sheet, 'A3', 'K3');
                        mergeCells(sheet, 'A4', 'K4');

                        // Styling Header
                        function applystyle(cellRef, styleIndex) {
                            $('c[r="' + cellRef + '"]', sheet).attr('s', styleIndex);
                        }

                        // Adding custom styles to the styles.xml
                        var stylesXml = xlsx.xl['styles.xml'];
                        var styleSheet = $('styleSheet', stylesXml);
                        
                        // Define the new xf style
                        var newXf1 = `
                            <xf numFmtId="0" fontId="2" fillId="0" borderId="0" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
                                <alignment horizontal="center" wrapText="1"/>
                            </xf>`;
                        
                        var newXf2 = `
                            <xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">
                                <alignment horizontal="left" vertical="center" wrapText="1"/>
                            </xf>`;
                        
                        styleSheet.find('cellXfs').append(newXf1);
                        styleSheet.find('cellXfs').append(newXf2);

                        // The new style's index will be the last one in the list
                        var xfHeader = styleSheet.find('cellXfs xf').length - 2;
                        var xfBody = styleSheet.find('cellXfs xf').length - 1;

                        // Apply the new style
                        ['A1', 'A2', 'A3'].forEach(function (cell) {
                            applystyle(cell, xfHeader);
                        });
                        applystyle('A4', 2);

                        // Apply xfBody style to all cells in the sheet
                        clRow = $('row', sheet);
                        clRow.each(function () {
                            var attr = $(this).attr('r');
                            if (parseInt(attr) > 4) {
                                $('c', this).attr('s', xfBody);
                            }
                        })

                        // Add signature box
                        var lastRow = $('row', sheet).last().attr('r');
                        var nextRow = parseInt(lastRow) + 3; // Leave one empty row before the signature box

                        // Content of the signature box
                        var rowsContent = [
                            'Kepala ' + instansi,
                            '',
                            '',
                            '',
                            'Nama',
                            'NIP'
                        ];
    
                        // Create and append the signature box
                        rowsContent.forEach(function (content, index) {
                            var rowIndex = nextRow + index;
                            var row = '<row r="' + rowIndex + '">';

                            if (userRole === 'spadmin') {
                                for (var i = 0; i < 11; i++) {
                                    var colRef = String.fromCharCode(65 + i) + rowIndex;
                                    if (i === 8) {
                                        row += '<c t="inlineStr" r="' + colRef + '" s="51"><is><t>' + content + '</t></is></c>';
                                    } else {
                                        row += '<c t="inlineStr" r="' + colRef + '"><is><t></t></is></c>';
                                    }
                                }
                                row += '</row>';
                                
                                // Append the signature box to the worksheet
                                $('sheetData', sheet).append(row);
    
                                mergeCells(sheet, 'I' + rowIndex, 'K' + rowIndex);
                            } else {
                                for (var i = 0; i < 10; i++) {
                                    var colRef = String.fromCharCode(65 + i) + rowIndex;
                                    if (i === 7) {
                                        row += '<c t="inlineStr" r="' + colRef + '" s="51"><is><t>' + content + '</t></is></c>';
                                    } else {
                                        row += '<c t="inlineStr" r="' + colRef + '"><is><t></t></is></c>';
                                    }
                                }
                                row += '</row>';
                                
                                // Append the signature box to the worksheet
                                $('sheetData', sheet).append(row);
    
                                mergeCells(sheet, 'H' + rowIndex, 'J' + rowIndex);
                            }

                            
                        });
                    }
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
                                    width: '*',
                                    stack: [
                                        { text: 'DAFTAR ARSIP VITAL', fontSize: 16, bold: true, alignment: 'center' },
                                        { text: instansi.toUpperCase(), fontSize: 18, bold: true, alignment: 'center' },
                                    ],
                                }
                            ],
                        });

                        doc.content.splice(1, 0, {
                            columns: [
                                {
                                    stack: [
                                        { text: '\n', fontSize: 12, bold: false, alignment: 'left' },
                                        { text: 'Unit Pengolah : ', fontSize: 12, bold: true, alignment: 'left' },
                                    ],
                                }
                            ]
                        });
                        doc.content.splice(2, 1);

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
            responsive: true,
            scrollX: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],

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
            rowCallback: function(row, data, index) {
                // Update the numbering for each row
                var table = $('#dataarsip').DataTable();
                var pageInfo = table.page.info();
                $('td:eq(0)', row).html(pageInfo.start + index + 1);
            },
            initComplete: function () {
                if (userRole === 'spadmin') {
                    var api = this.api();
                    var column = api.column(10); // Adjust the column index as needed
                    var select = $('<select class="form-select"><option value="">Filter Unit Kerja</option></select>')
                        .appendTo($('.column-filter'))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    var resetButton = $('<button class="btn btn-secondary" type="button">Reset</button>')
                    .appendTo($('.column-filter'))
                    .on('click', function () {
                        select.val(''); // Reset the select element
                        column.search('', true, false).draw(); // Reset the column filter
                    });
        
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                }
            }
        }
    );
});