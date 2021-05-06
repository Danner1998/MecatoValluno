<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="./buscar.php" class="site-block-top-search" method="GET">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Buscar" name="texto">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <a class="navbar-brand"href="index.html">  <img src="Full Imagenes/logo.png" alt=""></a>
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">MECATO VALLUNO</a>
                
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">
                      <?php
                      if(isset($_SESSION['carrito'])){
                        echo count($_SESSION['carrito']);
                      }else{
                        echo 0;
                      }

                      ?>
                      </span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li >
              <a href="index.html">Inicio</a>
            </li>
            <li class="has-children">
              <a href="about.html">Categorias</a>
              <ul class="dropdown">
                <li><a href="#">Mecato Sorpresa</a></li>
                <li><a href="#">Mecato Románticos</a></li>
                <li><a href="#">Mecato Infantiles</a></li>
              </ul>
            </li>
            <li><a href="shop.html">Descuentos</a></li>
            <li><a href="#">Quienes Somos</a></li>
            <li><a href="#">Como Comprar</a></li>
            <li><a href="contact.html">Contactenos</a></li>
            <li><a href="contact.html">Ubicación</a></li>
          </ul>
        </div>
      </nav>
    </header>

