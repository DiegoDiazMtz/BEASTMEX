<style>
  body {
    padding-top: 56px; /* Ajusta la altura del navbar fijo */
  }

  .navbar {
    transition: background-color 1s ease, margin 0.1s ease, max-width 1s ease; /* Agrega transiciones suaves */
    max-height: 8vh;
    margin: 0 auto; /* Centra el navbar */
    
  }

  .navbar.transparent {
    background-color: rgba(0, 0, 0, 0.9) !important; /* Hace el fondo del navbar transparente */
    box-shadow: none; /* Elimina la sombra del navbar */
    max-width: 50vw;
    border-radius: 40px;
    padding: 10px;
    margin-top: 10px;
    max-height: 6vh;
  }

  .navbar-brand {
    display: flex;
    align-items: center;
  }

  .navbar-toggler {
    border: none;
  }

  .navbar-collapse {
    justify-content: center;
  }

  .navbar-nav {
    text-align: center;
  }

  .navbar-nav .nav-item {
    margin-right: 15px;
  }

  .navbar-nav .nav-link {
    padding: 15px;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <i class="bi bi-person-vcard"></i>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('administrador.index')?'active':'' }}" href="{{ route('administrador.index') }}">Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('almacen.index')?'active':'' }}" href="{{ route('almacen.index') }}">Almacen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('compras.index')?'active':'' }}" href="{{ route('compras.index') }}">Compras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('ventas.index')?'active':'' }}" href="{{ route('ventas.index') }}">Ventas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('usuarios.index')?'active':'' }}" href="{{ route('usuarios.index') }}">Usuarios</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Añade una clase transparent cuando haces scroll hacia abajo
  window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    if (window.scrollY > 60) {
      navbar.classList.add('transparent');
    } else {
      navbar.classList.remove('transparent');
    }
  });
</script>
