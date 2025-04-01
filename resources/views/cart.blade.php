<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
        }
        #cart-container {
            background-color: rgba(0, 0, 0, 0.95);
            border: 2px solid #ff0000;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.4);
            padding: 20px;
            backdrop-filter: blur(5px);
        }
        #cart-container table th {
            color: #ff0000;
            font-weight: bold;
        }
        #cart-container table td {
            color: #ffffff !important;
        }
        .media-heading {
            color: #ff0000 !important;
            font-weight: bold;
        }
        .btn-default {
            background-color: #000000;
            border-color: #ff0000;
            color: #ffffff;
        }
        .form-control {
            color: #ffffff;
            background-color: #000000;
        }
        .table-hover tbody tr {
            transition: all 0.3s ease;
            background-color: #000000;
        }
        .table-hover tbody tr:hover {
            box-shadow: 0 0 10px #ff0000;
            transform: translateY(-2px);
            background-color: #1a0000;
        }
        /* Estilos para todos los botones */
        .btn {
            color: #ffffff !important;
            background-color: #000000 !important;
            border: 1px solid #ff0000;
            transition: all 0.3s ease;
        }
        .btn-primary, .btn-danger, .btn-success {
            border-color: #ff0000;
        }
        .btn-primary:hover, .btn-danger:hover, .btn-success:hover, .btn-default:hover {
            background-color: #ff0000 !important;
            color: #000000 !important;
        }
        /* Estilos responsivos */
        .quantity-control {
            max-width: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            background-color: #ffffff;
            margin: 0 auto;
            padding: 4px;
            transition: all 0.2s ease-in-out;
        }
        .quantity-control .input-group-btn {
            display: flex;
            flex: 1;
            justify-content: space-between;
            align-items: center;
        }
        .quantity-control .input-group-btn .btn {
            border-radius: 6px;
            border: none;
            padding: 0.35rem 0.6rem;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa !important;
            font-weight: bold;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            min-width: 32px;
            color: #333 !important;
            margin: 0 2px;
        }
        .quantity-control .form-control {
            text-align: center;
            flex: 1 1 auto;
            width: 40px;
            padding: 0.25rem 0;
            border: none;
            border-left: 1px solid #f0f0f0;
            border-right: 1px solid #f0f0f0;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.95rem;
            background-color: white;
            color: #333 !important;
            margin: 0 4px;
        }
        @media (max-width: 767px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
            .table-responsive {
                border: none;
            }
            #cart-container table th,
            #cart-container table td {
                font-size: 0.9rem;
            }
            .media-heading {
                font-size: 0.9rem !important;
            }
            .quantity-control {
                max-width: 90px;
            }
            .btn-sm {
                padding: 0.2rem 0.6rem;
                font-size: 0.75rem;
            }
            .form-control-sm {
                padding: 0.25rem 0.7rem;
                font-size: 0.75rem;
            }
        }
        @media (max-width: 575px) {
            .media-left img {
                width: 60px !important;
            }
            .media-heading {
                font-size: 0.8rem !important;
            }
            #cart-container table th,
            #cart-container table td {
                padding: 0.5rem;
            }
        }
    </style>
    <div class="container" style="margin-top: 120px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-12">
                <h1 class="wow bounceIn">Carrito de Compras</h2>
                <hr>
                <div id="cart-container" class="cart-container" style="background-color: rgba(0, 0, 0, 0.95); border-radius: 8px; border: 2px solid #ff0000; box-shadow: 0 0 20px rgba(255, 0, 0, 0.4); padding: 25px; margin-bottom: 30px;">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                <!-- Los items del carrito se cargarán aquí dinámicamente -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-12 mb-3">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-danger mb-2 mb-md-0" onclick="clearCart()"><i class="fa fa-trash"></i> Vaciar Carrito</button>
                                <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 text-md-right">
                            <div class="well" style="background-color: #000000; padding: 15px; border-radius: 5px; border: 1px solid #ff0000; box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);">
                                <h4 style="margin-top: 0;">Resumen del Pedido</h4>
                                <hr style="margin: 10px 0;">
                                <p style="font-size: 18px; font-weight: bold; color: #ffffff;">Total: $<span id="cart-total" style="color: #ff0000;">0.00</span></p>
                                <button class="btn btn-success btn-block" onclick="checkout()"><i class="fa fa-credit-card"></i> Proceder al Pago</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="empty-cart" style="display: none;" class="cart-container text-center" style="background-color: rgba(0, 0, 0, 0.95); border-radius: 8px; border: 2px solid #ff0000; box-shadow: 0 0 20px rgba(255, 0, 0, 0.4); padding: 25px; margin-bottom: 30px;">
                    <div class="alert alert-info">
                        <h4 class="mb-2"><i class="fa fa-info-circle"></i> Tu carrito está vacío</h4>
                        <p>No hay productos en tu carrito de compras.</p>
                        <a href="/" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Ir a comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            loadCart();
            updateCartCount(); // Aseguramos que el contador del carrito se actualice
        });

        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartItemsContainer = document.getElementById("cart-items");
            let cartTotalContainer = document.getElementById("cart-total");
            let cartContainer = document.getElementById("cart-container");
            let emptyCartContainer = document.getElementById("empty-cart");

            // Limpiar el contenedor de items
            cartItemsContainer.innerHTML = "";

            if (cart.length === 0) {
                cartContainer.style.display = "none";
                emptyCartContainer.style.display = "block";
                return;
            }

            cartContainer.style.display = "block";
            emptyCartContainer.style.display = "none";

            let total = 0;
            cart.forEach((item, index) => {
                let subtotal = item.price * item.quantity;
                total += subtotal;

                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>
                        <div class="media d-flex align-items-center">
                            <div class="media-left me-2" style="padding-right: 10px;">
                                <img src="${item.image}" alt="${item.name}" style="width: 80px; height: auto; border-radius: 4px;" class="img-fluid">
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading" style="color: #ff0000; font-weight: bold; font-size: 1rem;">${item.name}</h5>
                            </div>
                        </div>
                    </td>
                    <td style="color: #ffffff; font-weight: 500;">$${item.price.toFixed(2)}</td>



                    <td>
                        <div class="quantity-control">
                            <div class="input-group-btn d-flex align-items-center">
                                <button class="btn btn-default btn-sm" type="button" onclick="updateQuantity(${index}, ${item.quantity - 1})" title="Disminuir cantidad">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="text" class="form-control" value="${item.quantity}" readonly aria-label="Cantidad de producto">
                                <button class="btn btn-default btn-sm" type="button" onclick="updateQuantity(${index}, ${item.quantity + 1})" title="Aumentar cantidad">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>


                    <td style="color: #ffffff; font-weight: 500;">$${subtotal.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeItem(${index})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                `;
                cartItemsContainer.appendChild(row);
            });

            cartTotalContainer.textContent = total.toFixed(2);
        }

        function updateQuantity(index, newQuantity) {
            if (newQuantity <= 0) {
                removeItem(index);
                return;
            }

            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (index >= 0 && index < cart.length) {
                // Animación sutil al cambiar la cantidad
                const quantityInputs = document.querySelectorAll('.quantity-control .form-control');
                if (quantityInputs[index]) {
                    quantityInputs[index].style.transition = 'background-color 0.3s';
                    quantityInputs[index].style.backgroundColor = '#e9ecef';
                    setTimeout(() => {
                        quantityInputs[index].style.backgroundColor = 'white';
                    }, 300);
                }
                
                cart[index].quantity = newQuantity;
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
                updateCartCount();
            }
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (index >= 0 && index < cart.length) {
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
                updateCartCount();
            }
        }

        function clearCart() {
            if (confirm("¿Estás seguro de que deseas vaciar el carrito?")) {
                localStorage.setItem("cart", JSON.stringify([]));
                loadCart();
                updateCartCount();
            }
        }

        function checkout() {
            if (confirm("¿Deseas proceder al pago?")) {
                alert("Funcionalidad de pago en desarrollo. ¡Gracias por tu compra!");
                // Aquí se implementaría la redirección a la página de pago
                // Por ahora, limpiamos el carrito como si la compra fuera exitosa
                localStorage.setItem("cart", JSON.stringify([]));
                loadCart();
                updateCartCount();
            }
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let count = cart.reduce((total, item) => total + item.quantity, 0);
            let cartCountElement = document.getElementById("cart-count");
            if (cartCountElement) {
                cartCountElement.textContent = count;
            }
        }
    </script>
</body>
</html>