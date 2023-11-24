<template>
  <div class="offcanvas offcanvas-start" id="demo">
    <div class="offcanvas-header">
      <h1 class="offcanvas-title">Heading</h1>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
        <li class="nav-item">
          <a href="#" class="nav-link text-truncate">
            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
          </a>
        </li>
        <li>
          <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-truncate">
            <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
        </li>
        <li>
          <a href="#" class="nav-link text-truncate">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Orders</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Bootstrap</span>
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="nav-link text-truncate">
            <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Products</span></a>
        </li>
        <li>
          <a href="#" class="nav-link text-truncate">
            <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Customers</span> </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Button to open the offcanvas sidebar -->
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
    Open Offcanvas Sidebar
  </button>
</template>