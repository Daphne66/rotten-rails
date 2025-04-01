<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carrito de Compras - Rotten Rails</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Estilos CSS -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            background-image: linear-gradient(to bottom right, #000000, #1a0000);
        }
        .container {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ff0000;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.4);
        }
        .product-image {
            width: 80px;
            height: auto;
            border-radius: 4px;
            border: 1px solid #ff0000;
        }
        .quantity-control {
            max-width: 120px;
            background-color: rgba(0, 0, 0, 0.9);
            border: 1px solid #ff0000;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.2);
        }
        .quantity-control input {
            background-color: #000000;
            color: #ffffff;
            border: none;
        }
        .summary-box {
            background-color: rgba(0, 0, 0, 0.95);
            padding: 20px;
            border-radius: 5px;
            border: 2px solid #ff0000;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.4);
        }
        .navbar {
            margin-bottom: 30px;
            background-color: #000000 !important;
            border-bottom: 2px solid #ff0000;
        }
        .navbar-brand {
            color: #ff0000 !important;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #ff0000 !important;
        }
        .table {
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            overflow: hidden;
        }
        .table-hover tbody tr {
            transition: all 0.3s ease;
            background-color: #000000;
            color: #ffffff;
        }
        .table-hover tbody tr:hover {
            box-shadow: 0 0 10px #ff0000;
            transform: translateY(-2px);
            background-color: #1a0000;
        }
        .btn {
            background-color: rgba(0, 0, 0, 0.9) !important;
            color: #ff0000 !important;
            border: 1px solid #ff0000;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn:hover {
            background-color: #ff0000 !important;
            color: #ffffff !important;
            box-shadow: 0 0 12px #ff0000;
            transform: translateY(-2px);
        }
        .media-heading {
            color: #ff0000 !important;
        }
        .form-control {
            background-color: #000000;
            color: #ffffff;
            border: 1px solid #ff0000;
        }
        .form-control:focus {
            background-color: #000000;
            color: #ffffff;
            border-color: #ff0000;
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
        }
        #cart-total {
            color: #ff0000 !important;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación simple -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Rotten Rails</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fa fa-home"></i> Inicio</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perfil.edit') }}"><i class="fas fa-user-circle"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-inline">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                            </a>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <div class="row cart-header">
            <div class="col-md-12">
                <h2><i class="fa fa-shopping-cart"></i> Carrito de Compras</h2>
                <hr>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div id="cart-container" class="cart-container">
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
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <button class="textt" onclick="clearCart()"><i class="fa fa-trash"></i > Vaciar Carrito</button>
                            <a href="/" class="btn btn-primary" style="color: #000000;"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="summary-box">
                                <h4 style="margin-top: 0;">Resumen del Pedido</h4>
                                <hr style="margin: 10px 0;">
                                <p style="font-size: 18px; font-weight: bold; color:rgb(5, 0, 0);">Total: $<span id="cart-total" style="color: #ff0000;">0.00</span></p>
                                <button class="btn btn-success btn-block" onclick="checkout()" style="color: #000000;"><i class="fa fa-credit-card"></i> Proceder al Pago</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="empty-cart" style="display: none;" class="cart-container text-center">
                    <div class="alert alert-info">
                        <h4><i class="fa fa-info-circle"></i> Tu carrito está vacío</h4>
                        <p>No hay productos en tu carrito de compras.</p>
                        <a href="/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Ir a comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            loadCart();
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
                        <div class="media">
                            <div class="media-left" style="padding-right: 10px;">
                                <img src="${item.image}" alt="${item.name}" class="product-image">
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading" style="color: #ffffff;">${item.name}</h5>
                            </div>
                        </div>
                    </td>
                    <td style="color: #ffffff;">$${item.price.toFixed(2)}</td>
                    <td>
                        <div class="input-group quantity-control">
                               <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="updateQuantity(${index}, ${item.quantity + 1})">
                                       <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="updateQuantity(${index}, ${item.quantity - 1})">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            
                            <input type="text" class="form-control text-center" value="${item.quantity}" readonly>
                            
                        </div>
                    </td>
                    <td style="color: #ffffff;">$${subtotal.toFixed(2)}</td>
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
                cart[index].quantity = newQuantity;
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
            }
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (index >= 0 && index < cart.length) {
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
            }
        }

        function clearCart() {
            if (confirm("¿Estás seguro de que deseas vaciar el carrito?")) {
                localStorage.setItem("cart", JSON.stringify([]));
                loadCart();
            }
        }

        function checkout() {
            if (confirm("¿Deseas proceder al pago?")) {
                alert("Funcionalidad de pago en desarrollo. ¡Gracias por tu compra!");
                // Aquí se implementaría la redirección a la página de pago
                // Por ahora, limpiamos el carrito como si la compra fuera exitosa
                localStorage.setItem("cart", JSON.stringify([]));
                loadCart();
            }
        }
    </script>
</body>
</html>("Fidpgodll.¡Grp pa!"quí impíardcóágg//Pah,limm mifrext);