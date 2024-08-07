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
                    var viewport = page.getViewport({ scale: 1.1 });
                    var scale = container.clientWidth / viewport.width;
                    var highResScale = scale * 3;
                    var highResViewport = page.getViewport({ scale: highResScale });

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.width = highResViewport.width;
                    canvas.height = highResViewport.height;
                    container.appendChild(canvas);

                    var renderContext = {
                        canvasContext: context,
                        viewport: highResViewport,
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function() {
                        console.log('Page ' + pageNum + ' rendered');
                    });

                    canvas.style.width = '100%';
                    canvas.style.height = 'auto';
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

        if(file) {
            if (file.type === 'application/pdf') {
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
        } else {
            pdfViewer.innerHTML = '';
        }
        
    });

    // Handle file selection for update by identifying the file ID
    document.querySelectorAll('input[id^="file_update_"]').forEach(input => {
        input.addEventListener('change', function(event) {
            var file = event.target.files[0];
            var fileId = event.target.id.split('_').pop(); // Extract ID from input
            var pdfViewer = document.getElementById('pdf-viewer-update_' + fileId);

            if (file) {
                if (file.type === 'application/pdf') {
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
            }else {
                pdfViewer.innerHTML = '';
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

    // Preview of the current file when the modal is shown
    document.addEventListener('shown.bs.modal', function(event) {
        var modal = event.target;
        var fileId = modal.id.split('viewArsip').pop();
        var pdfViewer = document.getElementById('pdf-viewer-view_' + fileId);
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
