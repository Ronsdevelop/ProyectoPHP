

<!-- Topbar Start -->

<div class="navbar-custom">
  <ul class="list-unstyled topnav-menu float-right mb-0"> 

      <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-bell noti-icon"></i>
              <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-lg">

              <!-- item-->
              <div class="dropdown-item noti-title">
                  <h5 class="m-0 text-white">
                      <span class="float-right">
                          <a href="" class="text-light">
                              <small>Limpiar Todo</small>
                          </a>
                      </span>Notificaciones
                  </h5>
              </div>

              <div class="slimscroll noti-scroll">

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item active">
                      <div class="notify-icon">
                          <img src="vistas/public/assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                      <p class="notify-details">Cristina Pride</p>
                      <p class="text-muted mb-0 user-msg">
                          <small>Hi, How are you? What about our next meeting</small>
                      </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-primary">
                          <i class="mdi mdi-comment-account-outline"></i>
                      </div>
                      <p class="notify-details">Caleb Flakelar commented on Admin
                          <small class="text-muted">1 min ago</small>
                      </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon">
                          <img src="vistas/public/assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                      <p class="notify-details">Karen Robinson</p>
                      <p class="text-muted mb-0 user-msg">
                          <small>Wow ! this admin looks good and awesome design</small>
                      </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-warning">
                          <i class="mdi mdi-account-plus"></i>
                      </div>
                      <p class="notify-details">New user registered.
                          <small class="text-muted">5 hours ago</small>
                      </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-info">
                          <i class="mdi mdi-comment-account-outline"></i>
                      </div>
                      <p class="notify-details">Caleb Flakelar commented on Admin
                          <small class="text-muted">4 days ago</small>
                      </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-secondary">
                          <i class="mdi mdi-heart"></i>
                      </div>
                      <p class="notify-details">Carlos Crouch liked
                          <b>Admin</b>
                          <small class="text-muted">13 days ago</small>
                      </p>
                  </a>
              </div>

              <!-- All-->
              <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                  Ver Todo
                  <i class="fi-arrow-right"></i>
              </a>

          </div>
      </li>

      <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <?php
           if ($_SESSION['avatar'] != "") {
              echo '<img src="'.$_SESSION['avatar'].'" alt="user-image" class="rounded-circle">';
           } 
          ?>
              
              <span class="pro-user-name ml-1">
                  <?php echo $_SESSION["nombre"];?> <i class="mdi mdi-chevron-down"></i>                  
                  
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->
              <div class="dropdown-item noti-title">
                  <h5 class="m-0 text-white">
                      Bienvenido!
                  </h5>
              </div>

              <!-- item-->
              <a href="../vistas/perfil.php" class="dropdown-item notify-item">
                  <i class="fe-user"></i>
                  <span>Mi Perfil</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="fe-settings"></i>
                  <span>Configuración</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="fe-lock"></i>
                  <span>Bloquear Pantalla</span>
              </a>

              <div class="dropdown-divider"></div>

              <!-- item-->
              <a href="salir" class="dropdown-item notify-item">
                  <i class="fe-log-out"></i>
                  <span>Salir</span>
              </a>

          </div>
      </li>


  </ul>

  <!-- LOGO -->
  <div class="logo-box">
      <a href="index.html" class="logo text-center">
          <span class="logo-lg">
              <img src="logo/logo_sistema.png" alt="" height="45">
              <!-- <span class="logo-lg-text-light">Xeria</span> -->
          </span>
          <span class="logo-sm">
              <!-- <span class="logo-sm-text-dark">X</span> -->
              <img src="logo/logo_sistema_sm.png" alt="" height="45">
          </span>
      </a>
  </div>

  <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
      <li>
          <button class="button-menu-mobile waves-effect">
              <span></span>
              <span></span>
              <span></span>
          </button>
      </li>
 
  </ul>
</div>
<!-- end Topbar -->