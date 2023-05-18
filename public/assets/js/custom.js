var $ = jQuery;
var table = "";

var isRTL = JSON.parse(localStorage.getItem("isRTL"));
if (isRTL) {
    var linkDefault = document.getElementById("style-default");
    var userLinkDefault = document.getElementById("user-style-default");
    linkDefault.setAttribute("disabled", true);
    userLinkDefault.setAttribute("disabled", true);
    document.querySelector("html").setAttribute("dir", "rtl");
} else {
    var linkRTL = document.getElementById("style-rtl");
    var userLinkRTL = document.getElementById("user-style-rtl");
    linkRTL.setAttribute("disabled", true);
    userLinkRTL.setAttribute("disabled", true);
}

var isFluid = JSON.parse(localStorage.getItem("isFluid"));
if (isFluid) {
    var container = document.querySelector("[data-layout]");
    container.classList.remove("container");
    container.classList.add("container-fluid");
}
var navbarStyle = localStorage.getItem("navbarStyle");
if (navbarStyle && navbarStyle !== "transparent") {
    document
        .querySelector(".navbar-vertical")
        .classList.add(`navbar-${navbarStyle}`);
}

$(document).ready(function () {
    setDefaults();
    navLinkHover();
    handleDataTables();
    handleResponsiveNavBtn();
    autoExpandAfterClickedLink();
});

function setDefaults() {
    $(document).find(".collapse").addClass("d-none");
    setAriaExpanded();
}

function setAriaExpanded() {
    $(document)
        .find(".collapse")
        .each(function () {
            let id = $(this).attr("id");
            $(document).find(`[href="#${id}"]`).attr("aria-expanded", "false");
        });
}

function navLinkHover() {
    $(document).on("click", ".nav-link", function () {
        var id = $(this).attr("href");
        $(document).find(`${id}`).toggleClass("d-none");
        let hasDone = $(document).find(`${id}`).hasClass("d-none");
        if (hasDone == true) {
            $(this).attr("aria-expanded", "false");
        } else {
            $(this).attr("aria-expanded", "true");
        }
    });
}
$(document).on("click", ".userProfile", function () {
    $(document)
        .find(`[aria-labelledby="navbarDropdownUser"]`)
        .toggleClass("show");
});

function handleDataTables() {
    table = $(".customDataTable").DataTable({ responsive: true });
}

function handleResponsiveNavBtn() {
    $(document).on("click", ".navbarVerticalCollapse", function () {
        $(document).find(".navbar-collapse").toggleClass("d-none");
    });
}

function autoExpandAfterClickedLink() {
    $(document).on("click", ".nav-link-text", function () {
        var href = $(this).closest("a").attr("href");
        sessionStorage.setItem("clickAbleLink", href);
        autoExpandAfterClickedLink();
    });
    var clickAbleLink = sessionStorage.getItem("clickAbleLink");
    if (clickAbleLink) {
        $(".nav-link").each(function () {
            $(this).removeClass("active");
            if (clickAbleLink == $(this).attr("href")) {
                $(this).addClass("active");
                $(this).parent().parent().removeClass();
                $(this).parent().parent().addClass("nav false collapse show");
            }
        });
        $(".single-link").each(function () {
            $(this).removeClass("active");
            if (clickAbleLink == $(this).attr("href")) {
                $(this).addClass("active");
            }
        });
    }
}
