import "./bootstrap";

import "bootstrap";

AOS.init();

const navbar = document.querySelector("#navbar");
const main = document.querySelector("#main");
const footer = document.querySelector("#footer");

function setmainHeight() {
    if (
        main.clientHeight + navbar.clientHeight + footer.clientHeight <
        window.innerHeight
    ) {
        main.style.height = "100vh";
    }
}
setmainHeight();
window.addEventListener(`resize`, setmainHeight());
