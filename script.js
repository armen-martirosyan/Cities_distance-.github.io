let short = document.querySelectorAll(".short");
let middle = document.querySelectorAll(".middle");
let long = document.querySelectorAll(".long");
let short_distance = document.querySelector(".short_dis");
let middle_distance = document.querySelector(".middle_dis");
let long_distance = document.querySelector(".long_dis");

short.forEach(function (child) {
    short_distance.appendChild(child);
});
middle.forEach(function (child) {
    middle_distance.appendChild(child);
});
long.forEach(function (child) {
    long_distance.appendChild(child);
});

window.addEventListener('scroll', function () {
    let scroll = document.querySelector(".arrow_up");
    scroll.classList.toggle("active", window.scrollY > 600)
})