// header colors
let headerr = document.querySelector('nav');
let naav = document.querySelectorAll('.nav-link');
let navBrand = document.querySelector('.navbar-brand');
document.addEventListener('scroll', () => {
var scroll_position = window.scrollY;
if (scroll_position > 200) {
    headerr.style.backgroundColor = '#fff';
    navBrand.classList.add("anav");
    naav.forEach(element => {
        element.classList.add("anav");
    });
    } else {
    headerr.style.backgroundColor = 'transparent';
    navBrand.classList.remove("anav");
    naav.forEach(element => {
        element.classList.remove("anav");
    });
}
});
naav.forEach(e => {
    e.addEventListener('click' , () => {
        naav.forEach(ele => {
            ele.classList.remove("active");
        });
        e.classList.add("active");
    });
});
(function() {
    "use strict";
    /* Easy selector helper function */
    const select = (el, all = false) => {
    el = el.trim()
    if (all) {
        return [...document.querySelectorAll(el)]
    } else {
        return document.querySelector(el)
    }
    }
    /* Easy event listener function */
    const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
        if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
        } else {
        selectEl.addEventListener(type, listener)
        }
    }}
    /* Easy on scroll event listener */
    const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
    }
    /* Back to top button */
    let backtotop = select('.back-to-top')
    if (backtotop) {
    const toggleBacktotop = () => {
        if (window.scrollY > 100) {
        backtotop.classList.add('active')
        } else {
        backtotop.classList.remove('active')
        }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
    }
/* Preloader */
let preloader = select('#preloader');
if (preloader) {
    window.addEventListener('load', () => {
    preloader.remove()
    });
}
})()
