let swiper = new Swiper(".mySwiper", {  
    pagination: {
        el: ".swiper-pagination",
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10,
        },

        1024: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        1536: {
            slidesPerView: 3,
            spaceBetween: 40,
        }
    },
});

document.getElementById("branchPermitOneBtn").onclick = function() {
    document.getElementById("branchPermitOneImg").style.display = "flex";
    document.getElementById("branchPermitTwoImg").style.display = "none";
    document.getElementById("branchPermitThreeImg").style.display = "none";
    document.getElementById("branchPermitFourImg").style.display = "none";
    document.getElementById("branchPermitFiveImg").style.display = "none";
}
document.getElementById("branchPermitTwoBtn").onclick = function() {
    document.getElementById("branchPermitOneImg").style.display = "none";
    document.getElementById("branchPermitTwoImg").style.display = "flex";
    document.getElementById("branchPermitThreeImg").style.display = "none";
    document.getElementById("branchPermitFourImg").style.display = "none";
    document.getElementById("branchPermitFiveImg").style.display = "none";
}
document.getElementById("branchPermitThreeBtn").onclick = function() {
    document.getElementById("branchPermitOneImg").style.display = "none";
    document.getElementById("branchPermitTwoImg").style.display = "none";
    document.getElementById("branchPermitFourImg").style.display = "flex";
    document.getElementById("branchPermitThreeImg").style.display = "none";
    document.getElementById("branchPermitFiveImg").style.display = "none";
}
document.getElementById("branchPermitFourBtn").onclick = function() {
    document.getElementById("branchPermitOneImg").style.display = "none";
    document.getElementById("branchPermitTwoImg").style.display = "none";
    document.getElementById("branchPermitFourImg").style.display = "none";
    document.getElementById("branchPermitThreeImg").style.display = "flex";
    document.getElementById("branchPermitFiveImg").style.display = "none";
}
document.getElementById("branchPermitFiveBtn").onclick = function() {
    document.getElementById("branchPermitOneImg").style.display = "none";
    document.getElementById("branchPermitTwoImg").style.display = "none";
    document.getElementById("branchPermitThreeImg").style.display = "none";
    document.getElementById("branchPermitFourImg").style.display = "none";
    document.getElementById("branchPermitFiveImg").style.display = "flex";
}


