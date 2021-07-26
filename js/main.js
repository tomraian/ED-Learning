//=================Replace To SVG=================\\

$(document).ready(function () {
  $(window).on("load", function () {
    $(".svg").svgToInline();
  });
});

//=================back to top=================\\
function backToTop() {
  let button = document.querySelector("footer a.back-to-top");
  button.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: "smooth",
    });
  });
}
backToTop();
//=================menu Fixed =================\\
// function menuFixed() {
//   let menu = document.querySelector("header");
//   window.addEventListener("scroll", () => {
//     window.pageYOffset >= 120
//       ? menu.classList.add("active")
//       : menu.classList.remove("active");
//   });
// }
// menuFixed();
//=================toggle Menu=================\\

const toggleMenu = () => {
  let hamburger = document.querySelector("header .hamburger");
  let menu = document.querySelector("header nav.nav");
  let main = document.querySelector("main");
  let overlay = document.querySelector("header .overlay");
  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    window.scrollTo({
      top: 0,
      left: 0,
    });
    menu.classList.toggle("show-is-menu");
    main.classList.toggle("translate");
    overlay.classList.toggle("active");
    document.body.classList.toggle("hidden");
  });
  overlay.addEventListener("click", () => {
    menu.classList.remove("show-is-menu");
    main.classList.remove("translate");
    overlay.classList.remove("active");
    document.body.classList.remove("hidden");
    hamburger.classList.remove("active");
  });
};
toggleMenu();

//=================Show modal=================\\c
const modals = () => {
  let btnShow = document.querySelectorAll(".btn-modal");
  let btnClosed = document.querySelectorAll(".modal .close ");
  let modalVideo = document.querySelector(".modal-difference");
  btnShow.forEach((e) => {
    e.addEventListener("click", (el) => {
      el.preventDefault();
      let attribute = e.getAttribute("data-toggle");
      let modal = document.querySelector("#" + attribute);
      modal.classList.add("active");
      document.body.style.overflow = "hidden";
    });
  });
  function closedModal() {
    let modalItem = document.querySelectorAll(".modal");
    modalItem.forEach((e) => {
      e.classList.remove("active");
      document.body.style.overflow = "inherit";
    });
  }
  btnClosed.forEach((close) => {
    close.addEventListener("click", () => {
      closedModal();
    });
  });
  window.addEventListener("keydown", (e) => {
    if (e.keyCode === 27) {
      closedModal();
    }
  });
};
modals();

//=================faq accordion=================\\
function innitAccordion(accordion) {
  let id = accordion.getAttribute("id");
  let idd = "#" + id;
  let buttons = document.querySelectorAll(
    idd + " " + ".accordion-item .accordion-title"
  );
  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      button.parentElement.classList.contains("active")
        ? button.parentElement.classList.remove("active")
        : buttons.forEach((btn) => {
            btn.parentElement.classList.remove("active");
            button.parentElement.classList.add("active");
          });
    });
  });
}
const accordions = document.querySelectorAll(".accordion-wrap");
accordions.forEach((accordion) => innitAccordion(accordion));

//=================Carousel=================\\
const carousel = {
  init: function () {
    this.testermonialCarousel();
    this.galleryCarousel();
  },
  testermonialCarousel: function () {
    var elem = document.querySelector(".testimonial-item .images ");
    var imgs = document.querySelectorAll(".testimonial-item .images img");
    // var docStyle = document.documentElement.style;
    // var transformProp =
    //   typeof docStyle.transform == "string" ? "transform" : "WebkitTransform";
    var flkty = new Flickity(elem, {
      contain: true,
      wrapAround: true,
      freeScroll: false,
      cellAlign: "center",
      lazyLoad: 2,
      imagesLoaded: true,
      prevNextButtons: false,
      pageDots: false,
      on: {
        ready: function () {},
        change: function (index) {
          var content = document.querySelectorAll(".testimonial .content");
          content.forEach(function (e) {
            e.classList.remove("active");
          });
          document
            .querySelector(".testimonial .content.ct-" + (index + 1))
            .classList.add("active");
        },
      },
    });
    // flkty.on("scroll", function (event, progress) {
    //   flkty.slides.forEach(function (slide, i) {
    //     var img = imgs[i];
    //     var x = ((slide.target + flkty.x) * -1) / 2;
    //     img.style.transform = "translateX( " + x + "px)";
    //   });
    // });
  },
  galleryCarousel: function () {
    let elem = document.querySelector(".gallery-section .list");
    let progressBar = document.querySelector(
      ".gallery-section .controls .timeline .process"
    );
    let flkty = new Flickity(elem, {
      // options
      ontain: true,
      wrapAround: false,
      freeScroll: true,
      cellAlign: "left",
      imagesLoaded: true,
      prevNextButtons: false,
      pageDots: false,
      freeScroll: true,
    });
    flkty.on("scroll", function (progress) {
      progressBar.style.width = progress * 100 + "%";
    });
  },
};
carousel.init();
