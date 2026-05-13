/* =====================================================
   Trip Designer eBook – GLOBAL SCRIPT (FINAL FIX)
   Left Click ENABLED
   Right Click / Copy / Print DISABLED
   NO HTML CHANGE REQUIRED
   ===================================================== */

(function () {

    console.log("Trip Designer Security Active");

    /* ===============================
       SIDEBAR TOGGLE (MOBILE)
       =============================== */
    window.toggleSidebar = function () {
        const sidebar = document.getElementById("sidebar");
        if (sidebar) sidebar.classList.toggle("active");
    };


    /* ===============================
       SEARCH SYSTEM (SAFE)
       =============================== */
    window.searchBook = function () {

        const input = document.getElementById("searchInput");
        const content = document.getElementById("content");
        if (!input || !content) return;

        const text = input.value.toLowerCase();

        // Remove old highlights
        document.querySelectorAll(".highlight").forEach(el => {
            el.replaceWith(el.textContent);
        });

        if (!text) return;

        const walker = document.createTreeWalker(
            content,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );

        const regex = new RegExp(text, "gi");
        let node;

        while ((node = walker.nextNode())) {
            if (node.nodeValue.match(regex)) {
                const span = document.createElement("span");
                span.innerHTML = node.nodeValue.replace(regex, m =>
                    `<span class="highlight">${m}</span>`
                );
                node.parentNode.replaceChild(span, node);
            }
        }
    };


    /* ===============================
       🔒 SECURITY CORE (NO OVERLAY)
       =============================== */

    function block(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
    }

    function enableSecurity() {

        /* RIGHT CLICK ONLY */
        document.addEventListener("contextmenu", block, true);

        /* BLOCK RIGHT MOUSE BUTTON ONLY */
        document.addEventListener("mousedown", function (e) {
            if (e.button === 2) block(e);
        }, true);

        /* DISABLE TEXT SELECTION */
        document.addEventListener("selectstart", function (e) {
            e.preventDefault();
        }, true);

        /* DISABLE COPY / CUT */
        document.addEventListener("copy", e => e.preventDefault(), true);
        document.addEventListener("cut", e => e.preventDefault(), true);

        /* KEYBOARD SHORTCUT BLOCK */
        document.addEventListener("keydown", function (e) {

            const k = e.key.toLowerCase();

            if (
                (e.ctrlKey && ["c", "u", "s", "p", "a"].includes(k)) ||
                e.key === "F12" ||
                (e.ctrlKey && e.shiftKey && ["i", "j", "c"].includes(k))
            ) {
                block(e);
            }
        }, true);

        /* PRINT BLOCK */
        window.addEventListener("beforeprint", function () {
            document.body.innerHTML =
                "<h2 style='text-align:center;margin-top:60px;'>Printing Disabled</h2>";
        });
    }

    /* INIT AFTER LOAD */
    if (document.readyState === "complete") {
        enableSecurity();
    } else {
        window.addEventListener("load", enableSecurity);
    }

})();
window.searchBook = function () {

    const input = document.getElementById("searchInput");
    const content = document.getElementById("content");
    if (!input || !content) return;

    const keyword = input.value.trim().toLowerCase();
    if (!keyword) return;

    // সব paragraph, li, div এর text নিয়ে কাজ করবে
    const elements = content.querySelectorAll(
        "p, li, h1, h2, h3, h4, h5, h6, div"
    );

    let found = false;

    elements.forEach(el => {
        if (!found && el.textContent.toLowerCase().includes(keyword)) {
            found = true;

            // Scroll to matched content
            el.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

            // Temporary visual focus (NOT highlight text)
            el.style.outline = "3px solid #04107C";
            el.style.background = "#eef2ff";

            setTimeout(() => {
                el.style.outline = "";
                el.style.background = "";
            }, 2000);
        }
    });
};

