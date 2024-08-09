document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.download-kartu').forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();
            var arsipId = this.getAttribute('data-id');
            var instansiId = this.getAttribute('data-instansi-id');
            fetchArsipData(arsipId, instansiId);
        });
    });

    function fetchArsipData(arsipId, instansiId) {
        // Fetch arsip data
        fetch(`/arsip/${arsipId}/data`)
            .then(response => response.json())
            .then(arsipData => {
                // Fetch instansi data
                fetch(`/instansi/${instansiId}/data`)
                    .then(response => response.json())
                    .then(instansiData => {
                        arsipData.instansi_name = instansiData.nama_instansi;
                        generateKartuPendataanPDF(arsipData);
                    })
                    .catch(error => console.error('Error fetching instansi data:', error));
            })
            .catch(error => console.error('Error fetching arsip data:', error));
    }

    function generateKartuPendataanPDF(arsipData) {
        var docDefinition = {
            content: [
                { text: 'PENDATAAN / SURVEI ARSIP VITAL', style: 'header' },
                {
                    table: {
                        widths: ['31%', '2%', '67%'],
                        body: [
                            [{ text: 'Instansi' }, ':', arsipData.instansi_name],
                            [{ text: 'Unit Pengolah' }, ':', arsipData.unit_pengolah],
                            [{ text: 'Jenis Arsip' }, ':', arsipData.jenis_arsip],
                            [{ text: 'Media Simpan' }, ':', arsipData.media],
                            [{ text: 'Sarana Temu Kembali' }, ':', arsipData.sarana_temu_kembali],
                            [{ text: 'Volume / Jumlah' }, ':', arsipData.jumlah],
                            [{ text: 'Periode (Kurun Waktu)' }, ':', arsipData.kurun_waktu],
                            [{ text: 'Retensi / Masa Simpan' }, ':', arsipData.jangka_simpan],
                            [{ text: 'Tingkat Keaslian / Perkembangan' }, ':', arsipData.tingkat_perkembangan],
                            [{ text: 'Sifat Kerahasiaan' }, ':', arsipData.sifat_kerahasiaan],
                            [{ text: 'Lokasi Simpan' }, ':', arsipData.lokasi_simpan],
                            [{ text: 'Sarana Simpan' }, ':', arsipData.sarana_simpan],
                            [{ text: 'Kondisi Arsip' }, ':', arsipData.keterangan],
                            [{ text: 'Nama Pendata' }, ':', arsipData.nama_pendata],
                            [{ text: 'Waktu Pendataan' }, ':', arsipData.waktu_pendataan],
                        ]
                    },
                    margin: [0, 0, 0, 0],
                    style: 'table'
                }
            ],
            styles: {
                header: {
                    alignment: 'center',
                    margin: [0, 0, 0, 5]
                },
                table: {
                    fontSize: 10,
                }
            }
        };

        pdfMake.createPdf(docDefinition).download('Kartu_Pendataan_Arsip.pdf');
    }
});
