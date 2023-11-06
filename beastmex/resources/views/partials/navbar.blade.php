<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <i class="bi bi-person-vcard"></i>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/administrador">Administrador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/almacen">Almacen</a>
          </li>
          <li class="compras">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Compras
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/consulta"> Consulta productos</a></li>
            <li><a class="dropdown-item" href="#">Alta/baja Proveedores</a></li>
            <li><a class="dropdown-item" href="/ordenes"> Generar Orden de Compra</a></li>
            <li><a class="dropdown-item" href="#">Orden de Compras</a></li>
            <li><a class="dropdown-item" href="/compras">Registro Compras</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="/ventas">Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/usuarios">Usuarios</a>
          </li>
        </ul>
        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>