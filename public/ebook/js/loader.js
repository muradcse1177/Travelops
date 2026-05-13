document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    if (!sidebar) return;

    const currentPath = window.location.pathname.replace(/\/$/, "");

    // ==================================================
    // RESET
    // ==================================================
    sidebar.querySelectorAll(".child").forEach(c => c.style.display = "none");
    sidebar.querySelectorAll(".parent, .child a")
        .forEach(el => el.classList.remove("active-link"));

    // ==================================================
    // PAGE LOAD: ACTIVE STATE (MOST IMPORTANT)
    // ==================================================

    // 1️⃣ child match হলে
    sidebar.querySelectorAll(".child a").forEach(link => {
        const href = link.getAttribute("href");
        if (!href) return;

        const cleanHref = href.replace(window.location.origin, "").replace(/\/$/, "");

        if (cleanHref === currentPath) {
            link.classList.add("active-link");

            const childMenu = link.closest(".child");
            if (childMenu) {
                childMenu.style.display = "block";

                const parent = childMenu.previousElementSibling;
                if (parent) parent.classList.add("active-link");
            }
        }
    });

    // 2️⃣ parent match হলে (যাদের child নেই)
    sidebar.querySelectorAll(".parent[href]").forEach(parent => {
        const href = parent.getAttribute("href");
        if (!href) return;

        const cleanHref = href.replace(window.location.origin, "").replace(/\/$/, "");

        if (cleanHref === currentPath) {
            parent.classList.add("active-link");
        }
    });

    // ==================================================
    // PARENT CLICK (CHILD থাকুক বা না থাকুক)
    // ==================================================
    sidebar.querySelectorAll(".parent").forEach(parent => {

        parent.addEventListener("click", function (e) {

            const child = this.nextElementSibling;
            const hasChild = child && child.classList.contains("child");

            // reset all
            sidebar.querySelectorAll(".parent").forEach(p => p.classList.remove("active-link"));
            sidebar.querySelectorAll(".child").forEach(c => c.style.display = "none");

            // set active
            this.classList.add("active-link");

            // accordion only if child exists
            if (hasChild) {
                e.preventDefault();
                child.style.display = "block";
            }
            // child না থাকলে → page যাবে, active page-load এ থাকবে
        });
    });

    // ==================================================
    // CHILD CLICK
    // ==================================================
    sidebar.querySelectorAll(".child a").forEach(link => {
        link.addEventListener("click", function () {

            sidebar.querySelectorAll(".child a")
                .forEach(a => a.classList.remove("active-link"));

            this.classList.add("active-link");

            const childMenu = this.closest(".child");
            if (!childMenu) return;

            sidebar.querySelectorAll(".child")
                .forEach(c => c.style.display = "none");

            childMenu.style.display = "block";

            sidebar.querySelectorAll(".parent")
                .forEach(p => p.classList.remove("active-link"));

            const parent = childMenu.previousElementSibling;
            if (parent) parent.classList.add("active-link");
        });
    });
    // ----------------------------------
    // LOAD MODAL
    // ----------------------------------
    $("body").append('<div id="tdModalContainer"></div>');
    $("#tdModalContainer").load("includes/td-modal.html", function () {
        setTimeout(function () {
            $('#tdServiceModal').modal('show');
        }, 800);
    });
});


// ==================================================
// MOBILE SIDEBAR TOGGLE
// ==================================================
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar) sidebar.classList.toggle("active");
}


// ==================================================
// SIDEBAR SEARCH (SAFE)
// parent কখনো hide হবে না
// ==================================================
function searchBook() {
    const input = document.getElementById("searchInput");
    if (!input) return;

    const val = input.value.toLowerCase();

    document.querySelectorAll("#sidebar .child a").forEach(link => {
        link.style.display = link.textContent.toLowerCase().includes(val)
            ? ""
            : "none";
    });
}
