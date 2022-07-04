var element = document.querySelector(".message-container");
element.scrollTop = element.scrollHeight;

let open = document.querySelector("#open");
let close = document.querySelector(".close");
let panel = document.querySelector(".contact-detail");

open.onclick = function () {
  gsap.set(panel, {
    display: "block",
    x: 300
  });
  gsap.to(panel, 0.5, { x: 0 });
};

close.onclick = function () {
  gsap.to(panel, 0.5, { x: 320 });
};

let openList = document.querySelector(".open-message");
let closeList = document.querySelector(".close-list");
let list = document.querySelector(".message-list");

openList.onclick = function () {
  gsap.set(list, { display: "block", x: -300 });
  gsap.to(list, 0.5, { x: 0});
};

closeList.onclick = function () {
  gsap.to(list, 0.5, {x: -400});
  gsap.to(list, 0, {display: "none", delay: 1});
}