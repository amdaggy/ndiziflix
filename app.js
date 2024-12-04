document.addEventListener("DOMContentLoaded", () => {
    const cart = [];
    const cartCount = document.getElementById("cart-count");
    const cartIcon = document.getElementById("cart-icon");
    const cartTab = document.getElementById("cartTab");
    const listCart = document.getElementById("listCart");
    const closeCart = document.getElementById("closeCart");

    // Add to Cart
    document.querySelectorAll(".addCart").forEach(button => {
        button.addEventListener("click", (e) => {
            const id = e.target.dataset.id;
            const title = e.target.dataset.title;
            const price = e.target.dataset.price;

            const item = cart.find(item => item.id === id);
            if (item) {
                item.quantity++;
            } else {
                cart.push({ id, title, price, quantity: 1 });
            }
            updateCart();
        });
    });

    // Update Cart
    function updateCart() {
        cartCount.innerText = cart.length;
        listCart.innerHTML = '';
        cart.forEach(item => {
            const cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.innerHTML = `
                <p>${item.title} - Ksh ${item.price} x ${item.quantity}</p>
                <button class="removeItem" data-id="${item.id}">Remove</button>
            `;
            listCart.appendChild(cartItem);
        });

        // Remove Item from Cart
        document.querySelectorAll(".removeItem").forEach(button => {
            button.addEventListener("click", (e) => {
                const id = e.target.dataset.id;
                const index = cart.findIndex(item => item.id === id);
                if (index > -1) {
                    cart.splice(index, 1);
                }
                updateCart();
            });
        });
    }

    // Toggle Cart Visibility
    cartIcon.addEventListener("click", () => {
        cartTab.classList.toggle("visible");
    });

    closeCart.addEventListener("click", () => {
        cartTab.classList.remove("visible");
    });

    // Checkout Process (You need to implement the actual checkout functionality)
    document.querySelector(".checkOut").addEventListener("click", () => {
        alert("Checkout functionality to be implemented");
    });
});
