// Add JavaScript to toggle navigation on mobile
document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('nav');

    burger.addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        nav.classList.toggle('active');
        document.body.classList.toggle('nav-open');
    });
});

// Video Modal
document.addEventListener("DOMContentLoaded", () => {
    const triggers = document.querySelectorAll('a.btn-primary[href$=".mp4"]');
    if (!triggers.length) return;

    const modal = document.createElement("div");
    modal.className = "video-modal";
    modal.innerHTML = `
    <div class="video-modal__overlay"></div>
    <div class="video-modal__content">
      <button class="video-modal__close" type="button" aria-label="Schließen">&times;</button>
      <video class="video-modal__video" controls playsinline></video>
    </div>
  `;
    document.body.appendChild(modal);

    const overlay = modal.querySelector(".video-modal__overlay");
    const closeBtn = modal.querySelector(".video-modal__close");
    const video = modal.querySelector(".video-modal__video");

    const openModal = (src) => {
        video.src = src;
        video.load();
        modal.classList.add("is-active");

        const playPromise = video.play();
        if (playPromise && typeof playPromise.catch === "function") {
            playPromise.catch(() => {});
        }
    };

    const closeModal = () => {
        modal.classList.remove("is-active");
        video.pause();
        video.removeAttribute("src");
        video.load();
    };

    triggers.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            openModal(link.href);
        });
    });

    overlay.addEventListener("click", closeModal);
    closeBtn.addEventListener("click", closeModal);

    document.addEventListener("keydown", e => {
        if (e.key === "Escape" && modal.classList.contains("is-active")) {
            closeModal();
        }
    });
});

// Dropdown Navigation
document.addEventListener("DOMContentLoaded", () => {
    const MOBILE_BP = window.matchMedia("(max-width: 992px)");
    const nav = document.querySelector("header.header nav");
    if (!nav) return;

    const dropdownLis = Array.from(nav.querySelectorAll("li")).filter(li =>
        li.querySelector(":scope > ul.nav-dropdown")
    );

    dropdownLis.forEach(li => li.classList.add("has-dropdown"));

    const ARROW_HITAREA = 60; // px rechts, "Pfeilbereich" zum Aufklappen

    const setOpen = (li, open) => {
        const link = li.querySelector(":scope > a");
        const dropdown = li.querySelector(":scope > ul.nav-dropdown");
        if (!link || !dropdown) return;

        li.classList.toggle("is-open", open);
        link.setAttribute("aria-expanded", String(open));
        dropdown.hidden = !open;
        dropdown.classList.toggle("active", open);
    };

    // Event-Listener nur einmal binden
    dropdownLis.forEach(li => {
        const link = li.querySelector(":scope > a");
        if (!link) return;

        link.addEventListener("click", (e) => {
            // Nur auf Mobile reagieren
            if (!MOBILE_BP.matches) return;

            const rect = link.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const clickedArrowZone = clickX > rect.width - ARROW_HITAREA;

            // NUR im Pfeil-Bereich: Dropdown togglen + Navigation verhindern
            if (clickedArrowZone) {
                e.preventDefault();
                const isCurrentlyOpen = li.classList.contains("is-open");
                setOpen(li, !isCurrentlyOpen);
            }
            // Ansonsten: Link navigiert normal
        });
    });

    const setupMobile = () => {
        // Alle Dropdowns initial schließen
        dropdownLis.forEach(li => setOpen(li, false));
    };

    const teardownDesktop = () => {
        dropdownLis.forEach(li => {
            const link = li.querySelector(":scope > a");
            const dropdown = li.querySelector(":scope > ul.nav-dropdown");
            if (!link || !dropdown) return;

            li.classList.remove("is-open");
            link.removeAttribute("aria-expanded");
            dropdown.hidden = false;
            dropdown.classList.remove("active");
        });
    };

    const apply = () => {
        if (MOBILE_BP.matches) {
            setupMobile();
        } else {
            teardownDesktop();
        }
    };

    apply();
    MOBILE_BP.addEventListener?.("change", apply);
});
