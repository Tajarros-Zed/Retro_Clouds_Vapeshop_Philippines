//Podkits section
const podkits = document.querySelectorAll('.podkits');
const podkitButtons = document.querySelectorAll('.podkit-buttons');
const popupProduct = document.querySelector('.popup-product-bg');
const popupName = document.querySelector('.popup-name');
const popupPrice = document.querySelector('.popup-price');
const popupFlavors = document.querySelector('.popup-flavors');
const popupImage = document.querySelector('.popup-img');
const description = document.querySelector('.description');
const popupAdd = document.querySelector('.popup-add');
const popupMinus = document.querySelector('.popup-minus');
const popupQuantity = document.querySelector('.popup-quantity');
const buyNow = document.querySelector('.buy-now');
const addToCart = document.querySelector('.add-to-cart');
const popupButtons = document.querySelector('.popup-buttons');
let maxQuantity = 0;
let productName = "";

// products.forEach(product => {
//     if(product[3] == e.target.value) {
//         popupImage.src = "./assets/catalog/" + product[6];
//         description.innerHTML = product[7];
//     }
// });

popupAdd.addEventListener('click', (e) => {
    if(popupQuantity.innerHTML > 0 && maxQuantity > 0 && parseInt(popupQuantity.innerHTML) < maxQuantity) {
        popupQuantity.innerHTML = parseInt(popupQuantity.innerHTML)+1;
    }
});

popupMinus.addEventListener('click', (e) => {
    if(popupQuantity.innerHTML > 0 && maxQuantity > 0 && parseInt(popupQuantity.innerHTML) > 1) {
        popupQuantity.innerHTML = parseInt(popupQuantity.innerHTML)-1;
    }
});

popupProduct.addEventListener('click', (e) => {
    if(e.target == popupProduct)
    popupProduct.style.display = 'none';
});

//add click listener on each podkitButtons
podkitButtons.forEach((button, index) => {
    button.addEventListener('click', (e) => {
        hideAllPodkits();
        let podkitStart = 0 + (4*(index));
        for(x = podkitStart; x < podkitStart+4; x++) {
            try {
                podkits[x].className = "flex podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]";
            } catch(e) {

            }
        }
    });
});

function hideAllPodkits() {
    podkits.forEach((podkit) => {
        podkit.className = 'hidden podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]';
    });
}

//Disposables section
const disposables = document.querySelectorAll('.disposables');
const disposableButtons = document.querySelectorAll('.disposable-buttons');

//add click listener on each disposableButtons
disposableButtons.forEach((button, index) => {
    button.addEventListener('click', (e) => {
        hideAllDisposables();
        let disposableStart = 0 + (4*(index));
        for(x = disposableStart; x < disposableStart+4; x++) {
            try {
                disposables[x].className = "flex podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]";
            } catch(e) {

            }
        }
    });
});

function hideAllDisposables() {
    disposables.forEach((disposable) => {
        disposable.className = "hidden podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]";
    });
}

//Juices section
const juices = document.querySelectorAll('.juices');
const juiceButtons = document.querySelectorAll('.juice-buttons');

//add click listener on each juiceButtons
juiceButtons.forEach((button, index) => {
    button.addEventListener('click', (e) => {
        hideAllJuices();
        let juiceStart = 0 + (4*(index));
        for(x = juiceStart; x < juiceStart+4; x++) {
            try {
                juices[x].className = "flex podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]";
            } catch(e) {

            }
        }
    });
});

function hideAllJuices() {
    juices.forEach((juice) => {
        juice.className = "hidden podkits w-full h-full flex items-center justify-center flex-col border border-[#33FCFF]";
    });
}

function showPopupProduct(name, price, flavors, img, stock) {
    productName = name;
    popupFlavors.innerHTML = "";
    popupProduct.style.display = 'flex';
    popupName.innerHTML = name;
    popupPrice.innerHTML = price;
    popupImage.src = "./assets/catalog/" + img;
    maxQuantity = stock;
    if(maxQuantity > 0) {
        popupQuantity.innerHTML = 1;
        popupMinus.className = "popup-minus cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
        popupAdd.className = "popup-add cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
        popupButtons.className = "flex popup-buttons w-full items-start justify-start px-6 py-4 gap-2 flex-wrap";
    } else {
        popupQuantity.innerHTML = "OUT OF STOCK";
        popupMinus.className = "hidden popup-minus cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
        popupAdd.className = "hidden popup-add cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
        popupButtons.className = "hidden popup-buttons w-full items-start justify-start px-6 py-4 gap-2 flex-wrap";
    }

    products.forEach(product => {
        if(product[1] == name) {
            // description.innerHTML = product[7];
        }
    });
    
    flavors.forEach(element => {
        const flavor = document.createElement('option');
        
        products.forEach(product => {
            if(product[0] == element && product[1] == name) {
                if(product[3] == "N/A" || product[3] == "NULL") {
                    flavor.innerHTML = product[4];
                    flavor.value = product[4];
                } else {
                    flavor.innerHTML = product[3];
                    flavor.value = product[3];
                }
            }
        });
        flavor.className = "text-[#FF1695]";

        popupFlavors.appendChild(flavor);
    });
}

popupProduct.addEventListener('click', (e) => {
    products.forEach(product => {
        if(product[3] == e.target.value || product[4] == e.target.value && product[1] == productName) {
            popupImage.src = "./assets/catalog/" + product[6];
            // description.innerHTML = product[7];
            maxQuantity = product[8];
            if(maxQuantity > 0) {
                popupQuantity.innerHTML = 1;
                popupMinus.className = "popup-minus cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
                popupAdd.className = "popup-add cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
                popupButtons.className = "flex popup-buttons w-full items-start justify-start px-6 py-4 gap-2 flex-wrap";
            } else {
                popupQuantity.innerHTML = "OUT OF STOCK";
                popupMinus.className = "hidden popup-minus cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
                popupAdd.className = "hidden popup-add cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold";
                popupButtons.className = "hidden popup-buttons w-full items-start justify-start px-6 py-4 gap-2 flex-wrap";
            }
        }
    });
});

// function changeFlavor(value) {
//     if(product[3] == value || product[4] == value) {
//         popupImage.src = "./assets/catalog/" + product[6];
//         // description.innerHTML = product[7];
//         maxQuantity = product[8];
//         popupQuantity.innerHTML = 1;
//     }
// }