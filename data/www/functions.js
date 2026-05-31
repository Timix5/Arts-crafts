function setLang(lang) {
localStorage.setItem("lang", lang);
location.href = "/" + lang + "/";
}
let lastScroll = 0;
const header = document.querySelector("header");
const nav = document.querySelector("nav");

const threshold = 5; // minimalen premik

window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;

    // vedno pokaži na vrhu
    if (document.body.classList.contains("menu-open")) return;

    else if (currentScroll <= 0) {
        header.classList.remove("hideHeader");
        nav.classList.remove("hideHeader");
        return;
    }

    // če scroll dol
    if (currentScroll > lastScroll + threshold) {
        header.classList.add("hideHeader");
        nav.classList.add("hideHeader");
    }

    // če scroll gor
    else if (currentScroll < lastScroll - threshold) {
        header.classList.remove("hideHeader");
        nav.classList.remove("hideHeader");
    }

    lastScroll = currentScroll;
});
const topBar = document.querySelector("#topBar");
const offset = topBar.offsetHeight;
const selected = document.querySelector(".selected");

document.querySelector("main").style.marginTop = offset + "px";

document.getElementById("year").textContent = new Date().getFullYear();

const hamburger = document.getElementById("hamburger");
const meni = document.getElementById("meni");

function toggleMenu() {
    meni.classList.toggle("active");
    hamburger.classList.toggle("active");
    document.body.classList.toggle("menu-open");
}

hamburger.addEventListener("click", toggleMenu);
selected.addEventListener("click", () => {
    if (document.body.classList.contains("menu-open")) {toggleMenu()}
});

const breakpoint = 1080; // enako kot v CSS

window.addEventListener("resize", () => {
    if (window.innerWidth >= breakpoint) {
        // zapri meni, če je odprt
        meni.classList.remove("active");
        hamburger.classList.remove("active");
        document.body.classList.remove("menu-open");
    }
});

if (window.location.pathname.endsWith("narocilo") || window.location.pathname.endsWith("narocilo.php")) {

    let stanje = 0;

    const slike = [
        document.getElementById("slika1"),
        document.getElementById("slika2"),
        document.getElementById("slika3"),
        document.getElementById("slika4")
    ];

    const set0 = ["/pic/1-pencil.jpg", "/pic/2-pencil.jpg", "/pic/3-pencil.jpg", "/pic/4-pencil.jpg"];
    const set1 = ["/pic/placeholder.png", "/pic/placeholder.png", "/pic/placeholder.png", "/pic/placeholder.png"];

    function posodobiSlike() {
    const aktivniSet = stanje === 0 ? set0 : set1;

    slike.forEach((img, i) => {
        img.classList.add("fade-out");

        setTimeout(() => {
            img.src = aktivniSet[i];
            setTimeout(() =>{
                img.classList.remove("fade-out");
            }, 200);
        }, 1000); // mora biti enako kot CSS transition
    });
}

    posodobiSlike();

    setInterval(() => {
        stanje = stanje === 0 ? 1 : 0;

        posodobiSlike();
    }, 10000);
}