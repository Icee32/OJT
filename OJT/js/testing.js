let stars = document.getElementById("stars");
let moon = document.getElementById("moon");
let mountains_behind = document.getElementById("mountains_behind");
let text = document.getElementById("text");
let btn = document.getElementById("btn");
let mountains_front = document.getElementById("mountains_front");
let header = document.querySelector("header");

window.addEventListener("scroll", function() {
    let value = window.scrollY;
    stars.style.left = value * 0.25 + "px";
    moon.style.top = value * 1.05 + "px";
    mountains_behind.style.top = value * 0.5 + "px";
    mountains_front.style.top = value * 0 + "px";
    text.style.marginRight = value * 4 + "px";
    text.style.marginTop = value * 1.5 + "px";
    btn.style.marginTop = value * 1.5 + "px";
    header.style.top = value * 0.5 + "px";
});

let items = document.querySelectorAll(".slider .list .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");
let thumbnails = document.querySelectorAll(".thumbnail .item");

// Configuration
let countItem = items.length;
let itemActive = 0;

// Event next click
next.onclick = function() {
    itemActive = (itemActive + 1) % countItem;
    showSlider();
};

// Event prev click
prev.onclick = function() {
    itemActive = (itemActive - 1 + countItem) % countItem;
    showSlider();
};

// Auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 3000);

function showSlider() {
    // Remove old active class
    let itemActiveOld = document.querySelector(".slider .list .item.active");
    let thumbnailActiveOld = document.querySelector(".thumbnail .item.active");
    itemActiveOld.classList.remove("active");
    thumbnailActiveOld.classList.remove("active");

    // Add active class to new item
    items[itemActive].classList.add("active");
    thumbnails[itemActive].classList.add("active");

    // Center the active thumbnail
    centerActiveThumbnail();

    // Reset auto run slider timer
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 5000);
}

// Function to center the active thumbnail
function centerActiveThumbnail() {
    let thumbnailContainer = document.querySelector(".thumbnail");
    let thumbnailWidth = thumbnails[itemActive].offsetWidth;
    let offset = (thumbnailContainer.offsetWidth - thumbnailWidth) / 2;
    let scrollPosition = itemActive * thumbnailWidth - offset;

    // Handle looping
    if (scrollPosition < 0) {
        scrollPosition = 0;
    } else if (scrollPosition > (thumbnails.length - 1) * thumbnailWidth) {
        scrollPosition = (thumbnails.length - 1) * thumbnailWidth;
    }

    thumbnailContainer.scrollLeft = scrollPosition;
}

// Click thumbnail
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", () => {
        itemActive = index;
        showSlider();
    });
});

// Initial centering of the active thumbnail
centerActiveThumbnail();