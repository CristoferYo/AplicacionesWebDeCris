<?php
include('BDconexion.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-18mE4kWBq781YhF1dvKuhfTAU6auU8tT94WrHftjDbrCEXSU10Boqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
      <div class="menu logo-nav">
        <a href="/articare/index.html" class="logo">ARTICARE</a>
        <label class="menu-icon"><span class="fas fa-bars icomin"></span></label>
        <nav class="navigation">
          <ul>
            <li><a href="/nosotros.html">Nosotros</a></li>
            <li><a href="/productos.html">Productos</a></li>
            <li class="search-icon">
              <input type="search" placeholder="Search">
              <label class="icon">
                <span class="fas fa-search"></span>
              </label>

            </li>
            
            <li class="car" >
              <svg class="bi bi-cart3" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg>
                <div id="carrito" class="dropdown-menu">
                  <table id="lista-carrito" class="table">
                      <thead>
                          <tr>
                              <th>Imagen</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                  </table>

                  <a href="#" id="vaciar-carrito" class="button-vaciar">Vaciar Carrito</a>
                  <a href="#" id="procesar-pedido" class="button-pedido">Procesar Compra</a>
              </div>
            </li>
            <li>
            <a href="../articare/assets/php/InterfazArticare.php" class="fa-solid fa-user" width="1.5em" height="1.5em"></a>
            </li>
          </ul>
        </nav>
      </div>
      <script type="text/javascript">
        window.$crisp=[];window.CRISP_WEBSITE_ID="fedd1042-bc08-4a9b-ae39-9f5aad1e32c6";
        (function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";
        s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
      </script>
    </header>

    <main>

    <div class="modal" id="modal">
      <div class="modal-content">
        <img src="#" alt="" class="modal-img" id="modal-img">
      </div>
      <div class="modal-boton" id="modal-boton">X</div>
    </div>

    <div class="container-productos" id="lista-productos">
    <?php
    // Obtener los datos de la tabla de productos
    $sql = "SELECT productoID, Imagen, Nombre, Precio FROM productos";
    $result = $conectar->query($sql);

    // Generar el código HTML para mostrar los productos
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $productoID = $row['productoID'];
        $ProductoNombre = $row['Nombre'];
        $ProductoImagen = $row['Imagen'];
        $ProductoPrecio = $row['Precio'];
        ?>
        
    
        <div class="card">
          <?php echo '<img class="card-img" src="' . $row["Imagen"] . '" alt="' . '">'; ?>
          <h5><?php echo $ProductoNombre; ?></h5>
          <p>SKU: <?php echo $productoID; ?></p>
          <p>S/.<small class="precio"><?php echo $ProductoPrecio; ?></small></p>
          <a href="#" class="button agregar-carrito" data-id="<?php echo $productoID; ?>">Comprar</a>
        </div>
    
        <?php
      }
    } else {
      // Si no hay productos en la base de datos
      echo '<h1>No se encontraron productos.</h1>';
    }
    ?>

          <footer class= "footer-section">
  <div class="copyright-area">
      <div class="container-footer">
          <div class="row-footer">
              <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                  <div class="copyright-text">
                      <p>Copyright &copy; 2023, todos los derechos reservados <a href="/articare/index.html">ARTICARE</a></p>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                  <div class="footer-menu" >
                      <ul>
                          <li><a href="/nosotros.html">Nosotros</a></li>
                          <li><a href="/productos.html">Productos</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer> 


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script  src="../js/scripts.js"></script>
    <script src="../js/carrito.js"></script>
    <script src="../js/pedido.js"></script>
    <script src="../js/compra.js"></script>
</body>
</html>