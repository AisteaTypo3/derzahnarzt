(function () {
  "use strict";

  function animateCounter(node) {
    if (!node || node.dataset.animated === "1") {
      return;
    }

    var rawTarget = (node.dataset.target || "").trim();
    if (!rawTarget) {
      return;
    }

    var suffix = node.dataset.suffix || "";
    var normalized = rawTarget.replace(/,/g, "");
    var target = Number.parseFloat(normalized);

    if (!Number.isFinite(target)) {
      return;
    }

    node.dataset.animated = "1";

    var reducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reducedMotion) {
      node.textContent = rawTarget + suffix;
      return;
    }

    var duration = 1400;
    var startTime = null;
    var isInteger = Number.isInteger(target);

    function frame(timestamp) {
      if (startTime === null) {
        startTime = timestamp;
      }

      var elapsed = timestamp - startTime;
      var progress = Math.min(elapsed / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = target * eased;

      node.textContent = (isInteger ? Math.round(current) : current.toFixed(1)) + (progress >= 1 ? suffix : "");

      if (progress < 1) {
        window.requestAnimationFrame(frame);
      } else {
        node.textContent = rawTarget + suffix;
      }
    }

    node.textContent = "0";
    window.requestAnimationFrame(frame);
  }

  function initTimelineObserver(scope) {
    var items = scope.querySelectorAll(".cv-tl-item");
    if (!items.length) {
      return;
    }

    if (!("IntersectionObserver" in window)) {
      items.forEach(function (item) {
        item.classList.add("visible");
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -40px 0px" }
    );

    items.forEach(function (item) {
      observer.observe(item);
    });
  }

  function initStatsObserver(scope) {
    var statNumbers = scope.querySelectorAll(".cv-stat-num[data-target]");
    if (!statNumbers.length) {
      return;
    }

    if (!("IntersectionObserver" in window)) {
      statNumbers.forEach(animateCounter);
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.35 }
    );

    statNumbers.forEach(function (node) {
      observer.observe(node);
    });
  }

  function initSmoothScroll(scope) {
    var buttons = scope.querySelectorAll(".cv-scroll-hint");
    if (!buttons.length) {
      return;
    }

    buttons.forEach(function (button) {
      button.addEventListener("click", function () {
        var root = button.closest(".cv-profile") || document;
        var target = root.querySelector(".cv-main");
        if (!target) {
          return;
        }

        target.scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      });
    });
  }

  function init(scope) {
    initTimelineObserver(scope);
    initStatsObserver(scope);
    initSmoothScroll(scope);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".cv-profile").forEach(init);
    });
  } else {
    document.querySelectorAll(".cv-profile").forEach(init);
  }
})();
