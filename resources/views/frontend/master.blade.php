<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rotten Rails</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!-- Favicon -->
	<link rel="icon" href="{{ asset('images/RR2.png') }}">
    <!-- 
	Workforce CSS Template
	https://templatemo.com/tm-461-workforce
    -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">		
	<link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="js/translations.js"></script>
	<script src="js/language-switcher.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const searchForm = document.querySelector('.search-form');
			const searchInput = document.getElementById('searchInput');

			searchForm.addEventListener('submit', function(e) {
				e.preventDefault();
				const searchTerm = searchInput.value.toLowerCase().trim();
				if (searchTerm) {
					// Implementar la lógica de búsqueda
					window.location.href = '/search?q=' + encodeURIComponent(searchTerm);
				}
			});

			searchInput.addEventListener('input', function() {
				const searchTerm = this.value.toLowerCase().trim();
				// Aquí puedes implementar la búsqueda en tiempo real
				console.log('Término de búsqueda:', searchTerm);
			});
		});
	</script>
</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
<div class="absolute inset-0 -z-10 h-full w-full items-center px-5 py-24 [background:radial-gradient(125%_125%_at_50%_10%,#000_40%,#e63_100%)]"></div>
	<div class="preloader">
		<div class="sk-spinner sk-spinner-rotating-plane"></div>
	</div>
<nav class="navbar navbar-fixed-top custom-navbar bg-dark" role="navigation" style="min-height:60px; padding: 10px 0;"> 
    <div class="container" style="padding-top: 5px;"> 
        <div class="navbar-header"> 
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin: 12px 0;"> 
                <span class="icon icon-bar"></span> 
                <span class="icon icon-bar"></span> 
                <span class="icon icon-bar"></span> 
            </button>
            <a href="#" class="navbar-brand" style="padding: 10px 15px;"><img src="images/RR2.png" alt="Logo" style="height: 40px; width: auto; margin-right: 10px; display: inline-block; vertical-align: middle;">Rotten Rails</a> 
        </div> 
        <div class="collapse navbar-collapse"> 
            <ul class="nav navbar-nav navbar-right" style="margin: 5px 0;"> 
                <li><a href="#service" class="smoothScroll" data-translate="about-game" style="padding: 12px 10px;">Acerca del juego</a></li> 
                <li><a href="#preguntas" class="smoothScroll" data-translate="faqs" style="padding: 12px 10px;">FAQs</a></li> 
                <li><a href="#contact" class="smoothScroll" data-translate="contact-us" style="padding: 12px 10px;">Contáctanos</a></li>
                <li><button id="language-switcher" onclick="switchLanguage()" style="background: none; border: none; color: white; font-weight: bold; display: inline-flex; align-items: center; padding: 12px 10px;">
                    <i class="fas fa-globe" style="margin-right: 5px;"></i>
                    <span>ES</span>
                </button></li>
                <li class="nav-item">
                    <form class="d-flex search-form" style="margin: 8px 5px;">
                        <div class="input-group">
                            <input type="search" id="searchInput" class="form-control" placeholder="Buscar..." style="background: rgba(0,0,0,0.5); border: 1px solid #ff0000; color: #fff; height: 28px; font-size: 13px; width: 150px;">
                        </div>
                    </form>
                </li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fas fa-user"></i> 
                    {{ Auth::check() ? Auth::user()->name : __('Cuenta') }}
                    <span data-translate="account" style="display: none;">Cuenta</span>
  </a>
  <ul class="dropdown-menu">
                       @auth
                       
                       <li>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                          @csrf
                          
						  <li><a href="cart"><i class="fa fa-shopping-cart"></i> <span data-translate="cart">Carrito</span> <span id="cart-count" class="badge">0</span></a></li>
						  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <i class="fas fa-sign-out-alt"></i> <span data-translate="logout">Cerrar sesión</span>
                          </a>
						</form>
                       </li>
                         @else
                         <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> <span data-translate="login">Iniciar sesión</span></a></li>
                         <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> <span data-translate="register">Registrarse</span></a></li>
                         @endauth
  </ul>
</li>

             
            </ul> 
        </div> 
    </div> 
</nav>

	
	
	</nav>
	<!-- start home -->
	<section id="home">
		<div class="overlay">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="images/vias.jpg" alt="Slide 1">
						<div class="slider-caption">
							<div class="templatemo_homewrapper">
								<h3 class="wow bounceIn"></h3>
								<h1 class="wow bounce" data-translate="they-dont-rest">Ellos no descansan</h1>
								<h2 class="wow bounce color-titulo" data-translate="neither-should-you">
									Tú tampoco deberías
								</h2>
								<a href="login" class="smoothScroll templatemo-slider-btn btn btn-default" data-translate="download">Descarga</a>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
	</section>
	<!-- end home -->

	<section id="buy-game">
    <div class="container">
        <div class="row">
            <!-- Imagen del videojuego y detalles -->
            <div class="col-md-6">
                <img src="images/JUEGO.jpg" alt="Videojuego" class="img-fluid" style="border-radius: 8px;">
            </div>
            <div class="col-md-6 LETRASSS">
                <h2 class="LETRASSS" data-translate="game-title">Rotten Rails: Shooter VR</h2>
                <p class="price">$49.99 USD</p>
                <p class="LETRASSS" data-translate="game-description">¡Prepárate para una experiencia única! Juega en un mundo de realidad virtual enfrentándote a hordas de zombies en el shooter más emocionante de todos los tiempos. Personaliza tus armas, enfrenta enemigos y sobrevive.</p>
                <!-- Botón para agregar al carrito -->
                <button class="btn btn-success" id="cart" onclick="addToCart()">
                    <i class="fa fa-shopping-cart"></i> <span data-translate="add-to-cart">Agregar al carrito</span>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
function addToCart() {
        let product = {
            name: "Rotten Rails: Shooter VR",
            price: 49.99,
            image: "images/JUEGO.jpg",
            quantity: 1
        };

        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        let existingProduct = cart.find(item => item.name === product.name);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push(product);
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();
        alert("Producto agregado al carrito");
        window.location.href = "{{ route('cart') }}";
    }

    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let count = cart.reduce((total, item) => total + item.quantity, 0);
        document.getElementById("cart-count").textContent = count;
    }

    document.addEventListener("DOMContentLoaded", updateCartCount);
</script>

	






	<!-- start service -->
	<section id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center wow bounceIn">
					<h2 data-translate="about-title">Acerca del juego</h2>
					<hr>
					<h4 data-translate="vr-shooter">Shooter en Realidad Virtual con Zombies</h4>
				</div>
		
				<!-- Punto 1: Inmersión total en VR -->
				<div class="col-md-6 col-sm-6">
					<div class="media">
						<div class="media-object media-left wow fadeIn" data-wow-delay="0.6s">
							<img src="images/VIRTUAL.jpeg" alt="Inmersión VR" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px;">
						</div>
						<div class="media-body">
							<h3 class="media-heading" data-translate="vr-immersion">Inmersión Total en Realidad Virtual</h3>
							<p data-translate="vr-description">Experimenta una realidad alternativa donde serás el protagonista. Vive la acción como nunca antes con la tecnología de realidad virtual más avanzada.</p>
						</div>
					</div>
				</div>
		
				<!-- Punto 2: Acción intensiva y combate -->
				<div class="col-md-6 col-sm-6">
					<div class="media">
						<div class="media-object media-left wow fadeIn" data-wow-delay="0.6s">
							<img src="images/ACCION.jpg" alt="Acción y combate intensivo" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px;">
						</div>
						<div class="media-body">
							<h3 class="media-heading" data-translate="action-combat">Acción y Combate Intensivo</h3>
							<p data-translate="action-description">¡No hay tiempo que perder! Enfréntate a hordas de zombies mientras usas tus habilidades de disparo en un combate sin igual. ¿Estás listo para la acción?</p>
						</div>
					</div>
				</div>
		
				<!-- Punto 3: Hordas de Zombies -->
				<div class="col-md-6 col-sm-6">
					<div class="media">
						<div class="media-object media-left wow fadeIn" data-wow-delay="0.6s">
							<img src="images/ZOMBIES.jpg" alt="Hordas de Zombies" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px;">
						</div>
						<div class="media-body">
							<h3 class="media-heading" data-translate="zombie-hordes">Hordas de Zombies</h3>
							<p data-translate="zombie-description">Sobrevive a oleadas de zombies, cada una más difícil que la anterior. Prepárate para un desafío épico donde tu supervivencia depende de tus habilidades.</p>
						</div>
					</div>
				</div>
		
				<!-- Punto 4: Personalización de armas -->
				<div class="col-md-6 col-sm-6">
					<div class="media">
						<div class="media-object media-left wow fadeIn" data-wow-delay="0.6s">
							<img src="images/ARMAS.jpg" alt="Personalización de Armas" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px;">
						</div>
						<div class="media-body">
							<h3 class="media-heading" data-translate="weapon-customization">Personalización de Armas</h3>
							<p data-translate="weapon-description">Modifica y mejora tus armas para adaptarlas a tu estilo de juego. Aumenta el poder de tus disparos y mejora tu precisión en cada misión.</p>
						</div>
					</div>
				</div>
		
			</div>
		</div>
	</section>
	
	
	
	<!-- end service -->
	<!-- start divider -->
	<div class="divider">
		<div class="overlay" style="background-color: black">
			<div class="container">
				<div class="row">
					<div class="divider-des wow pulse" data-wow-iteration="1">
						<h3 class="text-uppercase" style="font-size: 2.5em; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); margin-bottom: 20px;" data-translate="register-now">¡Regístrate Ya!</h3>
						<p style="font-size: 1.2em; margin-bottom: 30px;" data-translate="adventure-text">No te quedes sin la oportunidad de probar este grandioso juego. ¡La aventura te espera!</p>
						<a href="login" class="btn btn-lg text-uppercase" style="background-color: #fff; color: #e63; font-weight: bold; padding: 12px 30px; border-radius: 30px; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.2);" data-translate="download-button">Descárgalo Ahora <i class="fa fa-download"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end divider -->
	<!-- start about -->
	<section id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 wow bounceIn">
					<h2 data-translate="trailer">Trailer</h2>
					<hr>
					<h4 data-translate="whats-coming">Una muestra de lo que se viene 🤯</h4>
				</div>
			</div>
			<div class="video-container">
				<video controls>
				  <source src="images/TRAILERH.mp4" type="video/mp4">
				  Tu navegador no soporta el formato de video.
				</video>
			  </div>
			  
			
		</div>
	</section>
	<!-- end about -->
	<!-- start portfolio -->
	<section id="preguntas">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wow bounceIn">
						<h2 class="wow bounceIn" data-translate="faq-title">Preguntas Frecuentes</h2>
						<hr>
						<h4 data-translate="faq-subtitle">Respuestas a las preguntas más comunes</h4>
					</div>
					<div class="faq-wrapper wow fadeIn" data-wow-delay="0.6s">
						<div class="faq-item">
							<h5 class="faq-question" data-translate="faq-q1">¿Cómo puedo contactar con soporte?</h5>
							<p class="faq-answer" data-translate="faq-a1">Puedes ponerte en contacto con nuestro equipo de soporte a través de nuestro formulario en línea, o por correo electrónico a soporte@ejemplo.com.</p>
						</div>
						<div class="faq-item">
							<h5 class="faq-question" data-translate="faq-q2">¿Ofrecen garantía en los productos?</h5>
							<p class="faq-answer" data-translate="faq-a2">Sí, todos nuestros productos tienen una garantía de 12 meses a partir de la fecha de compra. Para más detalles, consulta nuestra política de garantía.</p>
						</div>
						<div class="faq-item">
							<h5 class="faq-question" data-translate="faq-q3">¿Cómo puedo devolver un artículo?</h5>
							<p class="faq-answer" data-translate="faq-a3">Puedes devolver cualquier artículo dentro de los 30 días posteriores a la compra. Para obtener más información sobre el proceso, consulta nuestra política de devoluciones.</p>
						</div>
						<div class="faq-item">
							<h5 class="faq-question" data-translate="faq-q4">¿Cuáles son los métodos de pago aceptados?</h5>
							<p class="faq-answer" data-translate="faq-a4">Aceptamos pagos mediante tarjetas de crédito, PayPal y transferencias bancarias. Todos los pagos son seguros y están protegidos.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- end portfolio -->
	<!-- start contact -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wow bounceIn">
						<h2 class="wow bounceIn" data-translate="contact-title">Contáctanos</h2>
						<hr>
						<h4 data-translate="contact-subtitle">Mandanos tus datos...</h4>
					</div>					
					<form action="#" method="post" role="form">
						<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
							<input type="text" placeholder="Nombre" class="form-control" data-translate="name">
						</div>
						<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
							<input type="email" placeholder="Email" class="form-control">
						</div>
						<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
							<input type="text" placeholder="Asunto" class="form-control" data-translate="subject">
						</div>
						<div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
							<textarea class="form-control" rows="5" placeholder="Mensaje" data-translate="message"></textarea>
						</div>
						<div class="col-md-offset-3 col-sm-offset-3 col-sm-6 col-md-6 wow fadeIn" data-wow-delay="0.3s">
							<input type="submit" value="Enviar" class="form-control" data-translate="send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- end contact -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="social-icon wow fadeIn" data-wow-delay="0.3s">
						
					</ul>
					<p class="wow bounceIn">Copyright &copy; 2025 <span></span>
                    . Ver: <a><span data-translate="terms">Terminos y condiciones</span></a></p>
				</div>
			</div>
		</div>
	</footer>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/isotope.js"></script>
	<script src="js/imagesloaded.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/estilo.js"></script>
</body>
</html>