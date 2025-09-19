// Ambil semua menu
const menuItems = document.querySelectorAll(".menu li");

// Event klik untuk ubah active menu
menuItems.forEach(item => {
    item.addEventListener("click", () => {
        document.querySelector(".menu li.active")?.classList.remove("active");
        item.classList.add("active");
    });
});
