const images = document.querySelectorAll(".retro_clouds_carousel_img");
const container = document.querySelector(".retro_clouds_carousel");
const totalImages = images.length;
let imageIndex = 0;
let interval = 0;

for (let i = 0; i < totalImages; i++) {
    const button = document.createElement("button");
    button.classList.add("retro_clouds_carousel_button");
    container.appendChild(button);
}

const buttons = document.querySelectorAll(".retro_clouds_carousel_button");

buttons.forEach((button, index) => {
    button.addEventListener("click", (e) => {
        e.preventDefault
        imageIndex = index;
        updateSlider();
        resetInterval();
    });
});

function updateSlider() {
    images.forEach((image) => {
        image.classList.remove("image-active");
    });
    buttons.forEach((button) => {
        button.classList.remove("btn-active");
    });
    images[imageIndex].classList.add("image-active");
    buttons[imageIndex].classList.add("btn-active");
}

function nextImage() {
    imageIndex++;
    if (imageIndex > totalImages - 1) {
        imageIndex = 0;
    }
    updateSlider();
}

function autoPlay() {
    interval = setInterval(nextImage, 3000);
}

function resetInterval() {
    clearInterval(interval);
    autoPlay();
}

updateSlider();
autoPlay();
console.log(podkitButtons.length);

// JavaScript Count Down Deals of the Day