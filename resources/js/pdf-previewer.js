document.addEventListener('DOMContentLoaded', function() {
    // Check if pdfjsLib is loaded
    if (typeof pdfjsLib === 'undefined') {
        console.error('PDF.js library is not loaded.');
        return;
    }

    function renderPDF(pdfData, container) {
        var loadingTask = pdfjsLib.getDocument({ data: pdfData });
        
        loadingTask.promise.then(function(pdf) {
            // Clear existing content
            container.innerHTML = '';

            // Render all pages
            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(function(page) {
                    var scale = container.clientWidth / page.getViewport({ scale: 1.1 }).width;
                    var viewport = page.getViewport({ scale: scale });
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;
                    container.appendChild(canvas);

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function() {
                        console.log('Page ' + pageNum + ' rendered');
                    });
                });
            }
        }, function(reason) {
            console.error('Gagal memuat PDF!', reason);
        });
    }

    // Handle file selection for input
    document.getElementById('file').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var pdfViewer = document.getElementById('pdf-viewer-input');

        if (file && file.type === 'application/pdf') {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                renderPDF(e.target.result, pdfViewer);
            };

            reader.readAsArrayBuffer(file);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Maaf, file yang diupload harus berformat PDF!',
            });
        }
    });

    // Handle file selection for update by identifying the file ID
    document.querySelectorAll('input[id^="file_update_"]').forEach(input => {
        input.addEventListener('change', function(event) {
            var file = event.target.files[0];
            var fileId = event.target.id.split('_').pop(); // Extract ID from input
            var pdfViewer = document.getElementById('pdf-viewer-update_' + fileId);

            if (file && file.type === 'application/pdf') {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    renderPDF(e.target.result, pdfViewer);
                };

                reader.readAsArrayBuffer(file);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Maaf, file yang diupload harus berformat PDF!',
                });
            }
        });
    });

    // Initial preview of the current file when the modal is shown
    document.addEventListener('shown.bs.modal', function(event) {
        var modal = event.target;
        var fileId = modal.id.split('updateArsip').pop();
        var pdfViewer = document.getElementById('pdf-viewer-update_' + fileId);
        var currentFileUrl = modal.dataset.fileUrl;

        if (pdfViewer && currentFileUrl) {
            fetch(currentFileUrl)
                .then(response => response.arrayBuffer())
                .then(pdfData => {
                    renderPDF(pdfData, pdfViewer);
                });
        }
    });
});
