// Sidebar Toggle Script
document.addEventListener('DOMContentLoaded', (event) => {

    let sidebar = document.querySelector(".sidebar");
    let navbar = document.querySelector(".navbar");
    let mainContent = document.querySelector(".main-content");

    // let sidebarBtn = document.querySelector(".sidebar-toggle");
    // console.log(sidebarBtn);
    // sidebarBtn.addEventListener("click", ()=>{
    //   sidebar.classList.toggle("close");
    // });

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

//sidebar popup
document.addEventListener('DOMContentLoaded', function() {
    // Check if the user has already seen the pop-up
    if (!localStorage.getItem('sidebarPopupShown')) {
      // Show the pop-up
      var popup = document.getElementById('sidebar-popup');
      popup.style.display = 'block';
  
      // Close the pop-up when the close button is clicked
      var closeBtn = document.querySelector('.popup .close-btn');
      closeBtn.addEventListener('click', function() {
        popup.style.display = 'none';
        // Remember that the user has seen the pop-up
        localStorage.setItem('sidebarPopupShown', 'true');
      });
    }
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
