// Mobile sidebar toggle for responsive layout
document.addEventListener("DOMContentLoaded", function () {
    const mobileSidebar = document.getElementById("mobile-sidebar");
    const overlay = document.getElementById("mobile-overlay");
    const toggleButton = document.getElementById("mobile-menu-button");

    function openSidebar() {
        if (!mobileSidebar) return;
        mobileSidebar.classList.remove("-translate-x-full");
        mobileSidebar.classList.add("translate-x-0");
        if (overlay) overlay.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    }

    function closeSidebar() {
        if (!mobileSidebar) return;
        mobileSidebar.classList.remove("translate-x-0");
        mobileSidebar.classList.add("-translate-x-full");
        if (overlay) overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    if (toggleButton) {
        toggleButton.addEventListener("click", function () {
            if (mobileSidebar.classList.contains("-translate-x-full")) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });
    }

    if (overlay) {
        overlay.addEventListener("click", closeSidebar);
    }

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeSidebar();
    });
});
