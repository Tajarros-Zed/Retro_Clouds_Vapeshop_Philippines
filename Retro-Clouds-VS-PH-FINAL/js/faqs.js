document.querySelectorAll(".accordions").forEach((faqs) => {
    faqs.querySelector(".faqs_title").addEventListener("click", () => {
        faqs.classList.toggle("read");
    });
});
