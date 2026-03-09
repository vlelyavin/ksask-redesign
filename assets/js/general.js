document.addEventListener("DOMContentLoaded", function () {

  // ========================================
  // Slide Menu
  // ========================================
  function initSlideMenu() {
    const slideMenu = document.getElementById("slideMenu");
    const slideMenuOverlay = document.getElementById("slideMenuOverlay");
    const burgerBtn = document.getElementById("burgerBtn");
    const slideMenuClose = document.getElementById("slideMenuClose");

    if (!slideMenu || !burgerBtn) return;

    function toggleMenu() {
      slideMenu.classList.toggle("active");
      slideMenuOverlay.classList.toggle("active");
      burgerBtn.classList.toggle("active");
      document.body.style.overflow = slideMenu.classList.contains("active") ? "hidden" : "";
    }

    function closeMenu() {
      slideMenu.classList.remove("active");
      slideMenuOverlay.classList.remove("active");
      burgerBtn.classList.remove("active");
      document.body.style.overflow = "";
    }

    burgerBtn.addEventListener("click", toggleMenu);
    if (slideMenuOverlay) slideMenuOverlay.addEventListener("click", closeMenu);
    if (slideMenuClose) slideMenuClose.addEventListener("click", closeMenu);

    // Close on Escape
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && slideMenu.classList.contains("active")) {
        closeMenu();
      }
    });

    // Close menu when clicking nav links
    slideMenu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        closeMenu();
      });
    });
  }
  initSlideMenu();

  // ========================================
  // Header Scroll Effect
  // ========================================
  function initHeaderScroll() {
    var header = document.getElementById("header");
    if (!header) return;

    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 100) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }
  initHeaderScroll();

  // ========================================
  // Progress Bar (for single posts)
  // ========================================
  function initProgressBar() {
    var progressBar = document.getElementById("progress-bar");
    if (!progressBar) return;

    window.addEventListener("scroll", function () {
      var scrollTop = window.scrollY || document.documentElement.scrollTop;
      var docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrollPercent = (scrollTop / docHeight) * 100;
      progressBar.style.width = scrollPercent + "%";
    });
  }
  initProgressBar();

  // ========================================
  // Contact Form Popup
  // ========================================
  function initContactForm() {
    var triggers = document.querySelectorAll('[href="#form-popup"]');
    var contactForm = document.querySelector(".contact__form");
    var iconClose = document.querySelector(".contact__form__icon__close");

    if (!contactForm || !iconClose) return;

    triggers.forEach(function (trigger) {
      trigger.addEventListener("click", function (event) {
        event.preventDefault();
        contactForm.classList.add("open");
      });
    });

    iconClose.addEventListener("click", function () {
      contactForm.classList.remove("open");
    });

    document.addEventListener("click", function (event) {
      if (!event.target.href && event.target !== contactForm && !contactForm.contains(event.target)) {
        contactForm.classList.remove("open");
      }
    });
  }
  initContactForm();

  // ========================================
  // Scroll Animations (IntersectionObserver)
  // ========================================
  function initScrollAnimations() {
    if (!("IntersectionObserver" in window)) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("animated");
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px"
    });

    document.querySelectorAll(".animate-on-scroll").forEach(function (el) {
      observer.observe(el);
    });
  }
  initScrollAnimations();

  // ========================================
  // Scroll to Top Button
  // ========================================
  function initScrollTop() {
    var scrollTopBtn = document.getElementById("scrollTop");
    if (!scrollTopBtn) return;

    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 500) {
        scrollTopBtn.classList.add("visible");
      } else {
        scrollTopBtn.classList.remove("visible");
      }
    });

    scrollTopBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
  initScrollTop();

  // ========================================
  // Smooth Scroll for Anchor Links
  // ========================================
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        var href = this.getAttribute("href");
        if (href === "#" || href === "#form-popup") return;

        var target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          var headerOffset = 100;
          var elementPosition = target.getBoundingClientRect().top;
          var offsetPosition = elementPosition + window.pageYOffset - headerOffset;

          window.scrollTo({ top: offsetPosition, behavior: "smooth" });
        }
      });
    });
  }
  initSmoothScroll();

  // ========================================
  // Clients Marquee Slider
  // ========================================
  function initClientsSlider() {
    var track = document.querySelector(".clients-track");
    if (!track) return;

    // Clone children for seamless loop
    var children = track.innerHTML;
    track.innerHTML = children + children;

    var scrollAmount = 0;
    var speed = 0.4;

    function marqueeScroll() {
      scrollAmount += speed;
      track.style.transform = "translateX(-" + scrollAmount + "px)";
      if (scrollAmount >= track.scrollWidth / 2) {
        scrollAmount = 0;
      }
      requestAnimationFrame(marqueeScroll);
    }
    marqueeScroll();
  }
  initClientsSlider();

});
