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
    let sidebarBtn = document.querySelector(".bx-menu");
    let navbar = document.querySelector(".navbar");
    let mainContent = document.querySelector(".main-content");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        navbar.classList.toggle("sidebar-closed"); 
    });

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
