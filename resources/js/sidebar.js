// Sidebar Toggle Script
document.addEventListener('DOMContentLoaded', (event) => {
    // let sidebar = document.querySelector(".sidebar");
    // let sidebarBtn = document.querySelector(".bx-menu");
    // console.log(sidebarBtn);
    // sidebarBtn.addEventListener("click", ()=>{
    //   sidebar.classList.toggle("close");
    // });

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
        text: "Anda akan keluar dari SAVIRA!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
        }
    })
});
