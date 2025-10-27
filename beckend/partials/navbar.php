  <!--  Main wrapper -->
  <div class="body-wrapper">

      <!--  Header Start - NAVBAR -->
      <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav">
                  <li class="nav-item d-block d-xl-none">
                      <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
              </ul>
              <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                  <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                      <li class="nav-item dropdown">
                          <!-- Trigger dropdown -->
                          <a class="nav-link nav-icon-hover d-flex align-items-center"
                              href="#" id="drop2" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <!-- Text Admin di sebelah kiri -->
                            <?php if(isset($_SESSION['role'])): ?>
                              <h5 class="text-dark mb-0 me-2"> <?= ($_SESSION['role']) ?></h5>
                            <?php endif; ?>

                              <!-- Icon -->
                              <div class="rounded-circle bg-info d-flex align-items-center justify-content-center"
                                  style="width: 35px; height: 35px;">
                                  <i class="bi bi-person-fill text-white"></i>
                              </div>
                          </a>

                          <!-- Dropdown Menu -->
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                              <div class="message-body">
                                  <a href="../../action/auth/logout.php"
                                      class="btn btn-outline-primary mx-3 mt-2 d-block">
                                      Logout
                                  </a>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>
      </header>
      <!--  Header End - NAVBAR -->
        <!-- Bootstrap JS wajib (biar dropdown & tombol bisa jalan) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Fix kalau dropdown ketutupan elemen lain -->
<style>
    .dropdown-menu {
        z-index: 2000 !important;
    }
</style>