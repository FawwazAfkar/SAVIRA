// Sidebar Toggle Script
document.addEventListener('DOMContentLoaded', (event) => {
    let arrow = document.querySelectorAll(".arrow");
    for (let i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; // selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let navbar = document.querySelector(".navbar");
    let mainContent = document.querySelector(".main-content");

    // Add hover functionality
    sidebar.addEventListener("mouseover", () => {
            sidebar.classList.remove("close");
            mainContent.classList.add("faded-content");
            navbar.classList.remove("sidebar-closed");
        });

    sidebar.addEventListener("mouseout", () => {
            sidebar.classList.add("close");
            mainContent.classList.remove("faded-content");
            navbar.classList.add("sidebar-closed");
    });
});


// Alert before logout
document.querySelector('.logoutbtn a').addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda akan keluar dari sistem!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Keluar!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
        }
    })
});
