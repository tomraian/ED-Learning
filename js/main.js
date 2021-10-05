//=================Replace To SVG=================\\
console.log(
  "%c Ba mẹ bạn đã biết bạn bị gay chưa? %c",
  'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:24px;color:#00bbee;-webkit-text-fill-color:#00bbee;-webkit-text-stroke: 1px #00bbee;',
  "font-size:12px;color:#999999;"
);

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
  function closedMenu() {
    menu.classList.remove("show-is-menu");
    main.classList.remove("translate");
    overlay.classList.remove("active");
    document.body.classList.remove("hidden");
    hamburger.classList.remove("active");
  }
  overlay.addEventListener("click", () => {
    closedMenu();
  });
  window.addEventListener("keydown", (e) => {
    if (e.keyCode === 27) {
      closedMenu();
    }
  });
};
toggleMenu();

function switchPages() {
  let currenLocation = location.href;
  let menuItems = document.querySelectorAll(
    "header  nav.nav ul.menu-list li a "
  );
  menuItems.forEach((elem) => {
    if (elem.href === currenLocation) {
      elem.addEventListener("click", () => {
        if (elem.classList.contains("active")) {
          elem.className = "";
        }
      });
      elem.className = "active";
    }
  });
}
switchPages();
//=================Show modal=================\\
const modals = () => {
  let btnShow = document.querySelectorAll(".btn-modal");
  let btnClosed = document.querySelectorAll(".modal .close ");
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
    let modalItem = document.querySelectorAll(".modal-main");
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
// modal difference

//=================modal difference=================\\
// const modalDifference = function () {
//   let button = document.querySelector(".video-difference ");
//   let attribute = button.getAttribute("data-video");
//   let buttonClosed = document.querySelector("#modal-difference .close");
//   button.addEventListener("click", () => {
//     document.querySelector("#modal-difference").classList.add("active");
//     // document
//     //   .querySelector("#modal-difference video source")
//     //   .play();
//     HTMLVideoElement.play();
//   });
//   buttonClosed.addEventListener("click", () => {
//     document.querySelector("#modal-difference").classList.remove("active");
//     HTMLVideoElement.pause();
//   });
// };
// modalDifference();
//================= accordion=================\\
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
// function validationForm() {
//   let error = document.querySelectorAll("#form-registration p.mes-error");
//   let input = document.querySelectorAll(
//     "#form-registration input.input-validation"
//   );

//   let btnSubmit = document.querySelector("#form-registration .btn-submit");
//   input.forEach((inputElement) => {
//     // console.log();
//     btnSubmit.addEventListener("click", (e) => {
//       e.stopPropagation();
//       inputElement.value == ""
//         ? inputElement.nextElementSibling.classList.add("active")
//         : inputElement.nextElementSibling.classList.remove("active");
//       e.preventDefault();
//     });
//     inputElement.addEventListener("click", (e) => {
//       inputElement.nextElementSibling.classList.remove("active");
//     });
//   });
// }
// validationForm();

//=================Carousel=================\\

function testermonialCarousel() {
  var elem = document.querySelector(".testimonial-item .images ");
  var imgs = document.querySelectorAll(".testimonial-item .images img");
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
}
testermonialCarousel();
function galleryCarousel() {
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
    progress = Math.max(0.05, Math.min(1, progress));
    progressBar.style.width = progress * 100 + "%";
  });
}
galleryCarousel();
//=================course details=================\\
function courseDetails() {
  let button = document.querySelector(
    "#course-details .info .bottom .details h3"
  );
  let sectionDetails = document.querySelector(
    "#course-details .banner-section"
  );
  button.addEventListener("click", () => {
    window.scrollTo({
      top: sectionDetails.scrollHeight,
      behavior: "smooth",
    });
  });
}
courseDetails();

const headCourseDetails = function () {
  window.addEventListener("scroll", () => {
    window.pageYOffset >= 200
      ? document.querySelector("header .headtop").classList.add("active")
      : document.querySelector("header .headtop").classList.remove("active");
    let progressBar = document.querySelector(
      "header .headtop .headtop-progress"
    );
    let totalHeight = document.body.scrollHeight - window.innerHeight;
    let progress = (window.pageYOffset / totalHeight) * 100;
    progressBar.style.width = progress + "%";
  });
};
headCourseDetails();
