document.querySelectorAll(".sidebar-submenu").forEach((e) => {
  e.querySelector(".sidebar-menu-dropdown").onclick = (event) => {
    event.preventDefault();
    e.querySelector(".sidebar-menu-dropdown .dropdown-icon").classList.toggle(
      "active"
    );

    let dropdown_content = e.querySelector(".sidebar-menu-dropdown-content");
    let dropdown_content_lis = dropdown_content.querySelectorAll("li");

    let active_height =
      dropdown_content_lis[0].clientHeight * dropdown_content_lis.length;

    dropdown_content.classList.toggle("active");

    dropdown_content.style.height = dropdown_content.classList.contains(
      "active"
    )
      ? active_height + "px"
      : "0";
  };
});

let category_options = {
  series: [44, 55, 41, 17],
  labels: ["Cloths", "Devices", "Bags", "Watches"],
  chart: {
    type: "donut",
  },
  colors: ["#6ab04c", "#2980b9", "#f39c12", "#d35400"],
};

let category_chart = new ApexCharts(
  document.querySelector("#category-chart"),
  category_options
);
category_chart.render();

let customer_options = {
  series: [
    {
      name: "Store Customers",
      data: [40, 70, 20, 90, 36, 80, 30, 91, 60],
    },
    {
      name: "Online Customers",
      data: [20, 30, 10, 20, 16, 40, 20, 51, 10],
    },
  ],
  colors: ["#6ab04c", "#2980b9"],
  chart: {
    height: 350,
    type: "line",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
  },
  legend: {
    position: "top",
  },
};

let customer_chart = new ApexCharts(
  document.querySelector("#customer-chart"),
  customer_options
);
customer_chart.render();

setDarkChart = (dark) => {
  let theme = {
    theme: {
      mode: dark ? "dark" : "light",
    },
  };

  customer_chart.updateOptions(theme);
  category_chart.updateOptions(theme);
};

// DARK MODE TOGGLE
let darkmode_toggle = document.querySelector("#darkmode-toggle");

darkmode_toggle.onclick = (e) => {
  e.preventDefault();
  document.querySelector("body").classList.toggle("dark");
  darkmode_toggle.querySelector(".darkmode-switch").classList.toggle("active");
  setDarkChart(document.querySelector("body").classList.contains("dark"));
};

let overlay = document.querySelector(".overlay");
let sidebar = document.querySelector(".sidebar");

document.querySelector("#mobile-toggle").onclick = () => {
  sidebar.classList.toggle("active");
  overlay.classList.toggle("active");
};

document.querySelector("#sidebar-close").onclick = () => {
  sidebar.classList.toggle("active");
  overlay.classList.toggle("active");
};
function switchpage() {
  const currenLocation = location.href;
  const menuItem = document.querySelectorAll(".sidebar-menu li a");
  const menuLenght = menuItem.length;
  for (let i = 0; i < menuLenght; i++) {
    if (menuItem[i].href === currenLocation) {
      menuItem[i].className = "active";
    }
  }
}
switchpage();

$(document).ready(function () {
  var max_fields = 30; //maximum input boxes allowed
  var wrapper = $(".box-wrap"); //Fields wrapper
  var add_button = $(".add_field"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function (e) {
    //on add input button click
    e.preventDefault();
    if (x < max_fields) {
      //max input box allowed
      x++; //text box increment
      $(wrapper).append(
        '<div class="box"><div class="form-group"><label for="">Tiêu đề buổi học</label> <input type="text" placeholder="Nhập tên khóa học" name="lessonName' +
          x +
          '"/></div><div class="form-group"><label for="">Chi tiết buổi học</label><input type="text" placeholder="Nhập thông tin giới thiệu khóa học" name="lessonDesc' +
          x +
          '"/></div><a href="#" class="remove_field">Xóa ô này</a></div>'
      ); // add input boxes.
    } else {
      alert("Quá nhiều trường được thêm");
    }
  });

  $(wrapper).on("click", ".remove_field", function (e) {
    //user click on remove text
    e.preventDefault();
    $(this).parent("div").remove();
    x--;
  });
});
function submit() {
  document.getElementById("form1").submit();
}
// let textarea = document.querySelectorAll(".textarea");
// let unlock = document.getElementsByClassName("unlock");
// for (let u = 0; u < unlock.length; u++) {
//   unlock[u].addEventListener("click", function () {
//     for (let i = 0; i < textarea.length; i++) {
//       textarea[i].disabled = false;
//     }
//     //     unlock.innerHTML =
//     //   '<a href="javascript:;" class="action-box__edit" name="update';
//     // onclick = 'submit();">Sửa</a>';
//   });
// }
// unlock.innerHTML =
//   '<a href="javascript:;" class="action-box__edit" name="update';
// onclick = 'submit();">Sửa</a>';
// ===========CUT SPACE HTML NAME================
let lessonName = document.querySelectorAll(".lessonName");
for (let i = 0; i < lessonName.length; i++) {
  lessonName[i].setAttribute("name", lessonName[i].getAttribute("name").trim());
}
// ===========CUT SPACE HTML NAME================
let lessonDesc = document.querySelectorAll(".lessonDesc");
for (let i = 0; i < lessonDesc.length; i++) {
  lessonDesc[i].setAttribute("name", lessonDesc[i].getAttribute("name").trim());
}
