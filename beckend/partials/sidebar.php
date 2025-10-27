<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="../../template-admin/src/assets/images/logos/logo,SMK.png"
                            alt="Logo SMKN 3 Banjar"
                            style="width: 50px; height: 55px; object-fit: contain; margin-right: 12px;">
                        <span style="font-size: 17px; font-weight: bold; color: #333; line-height: 1;">
                            SMKN 3 BANJAR
                        </span>
                    </div>

                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <!-- 🔹 Dashboard -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../dashboard/index.php">
                                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>

                        <!-- 🔹 Profil Sekolah -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Profil Sekolah</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow d-flex align-items-center" data-bs-toggle="collapse" href="#menuProfil" role="button" aria-expanded="false" aria-controls="menuProfil">
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6 me-2"></iconify-icon>
                                <span class="hide-menu">Profil</span>
                                <i class="ms-auto ti ti-chevron-down toggle-icon"></i>
                            </a>
                            <ul class="collapse list-unstyled ms-4" id="menuProfil">
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                     <li><a class="sidebar-link <?= ($page == 'about') ? 'active' : '' ?>" href="../about/index.php">Tentang Kami</a></li>
                                    <li><a class="sidebar-link <?= ($page == 'kepalasekolah') ? 'active' : '' ?>" href="../headmaster/index.php">Kepala Sekolah</a></li>
                                <?php endif; ?>

                                <li><a class="sidebar-link <?= ($page == 'jurusan') ? 'active' : '' ?>" href="../major/index.php">Jurusan</a></li>
                                <li><a class="sidebar-link <?= ($page == 'guru') ? 'active' : '' ?>" href="../guru/index.php">Guru</a></li>

                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <li><a class="sidebar-link <?= ($page == 'visimisi') ? 'active' : '' ?>" href="../visimisi/index.php">Visi Misi</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <!-- 🔹 Informasi -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Informasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow d-flex align-items-center" data-bs-toggle="collapse" href="#menuInformasi" role="button" aria-expanded="false" aria-controls="menuInformasi">
                                <iconify-icon icon="solar:document-text-bold-duotone" class="fs-6 me-2"></iconify-icon>
                                <span class="hide-menu">Informasi</span>
                                <i class="ms-auto ti ti-chevron-down toggle-icon"></i>
                            </a>
                            <ul class="collapse list-unstyled ms-4" id="menuInformasi">
                                <li><a class="sidebar-link <?= ($page == 'pencapaian') ? 'active' : '' ?>" href="../pencapaian/index.php">Prestasi</a></li>
                                <li><a class="sidebar-link <?= ($page == 'pengumuman') ? 'active' : '' ?>" href="../Pengumuman/index.php">Pengumuman</a></li>
                                <li><a class="sidebar-link <?= ($page == 'blog') ? 'active' : '' ?>" href="../blog/index.php">Berita</a></li>
                                <li><a class="sidebar-link <?= ($page == 'galeri') ? 'active' : '' ?>" href="../gallerie/index.php">Galeri</a></li>
                            </ul>
                        </li>

                        <!-- 🔹 Komunikasi -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Komunikasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow d-flex align-items-center" data-bs-toggle="collapse" href="#menuKomunikasi" role="button" aria-expanded="false" aria-controls="menuKomunikasi">
                                <iconify-icon icon="solar:phone-calling-bold-duotone" class="fs-6 me-2"></iconify-icon>
                                <span class="hide-menu">Komunikasi</span>
                                <i class="ms-auto ti ti-chevron-down toggle-icon"></i>
                            </a>
                            <ul class="collapse list-unstyled ms-4" id="menuKomunikasi">
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                     <li><a class="sidebar-link <?= ($page == 'kontak') ? 'active' : '' ?>" href="../contact/index.php">Kontak</a></li>
                                <?php endif; ?>

                                <li><a class="sidebar-link <?= ($page == 'pesan') ? 'active' : '' ?>" href="../message/index.php">Pesan</a></li>

                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <li><a class="sidebar-link <?= ($page == 'sosialmedia') ? 'active' : '' ?>" href="../socmed/index.php">Sosial Media</a></li>
                                    <li><a class="sidebar-link <?= ($page == 'testimoni') ? 'active' : '' ?>" href="../testimoni/index.php">Testimoni</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <!-- 🔹 Sistem -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Sistem</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($page == 'aktivitasuser2') ? 'active' : '' ?>" href="../aktivitasuser2/index.php">
                                <iconify-icon icon="mdi:timeline-clock-outline" class="fs-6"></iconify-icon>
                                <span class="hide-menu">Aktiviti User</span>
                            </a>
                        </li>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= ($page == 'user') ? 'active' : '' ?>" href="../user2/index.php">
                                    <iconify-icon icon="mdi:account" class="fs-6"></iconify-icon>
                                    <span class="hide-menu">User</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->

                <!-- ✅ CSS supaya panah animasi -->
                <style>
                    .toggle-icon {
                        transition: transform 0.3s ease;
                    }
                    .rotate {
                        transform: rotate(180deg);
                    }
                </style>

                <!-- ✅ JS untuk animasi panah + toggle -->
                <script>
                    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(btn => {
                        const icon = btn.querySelector('.toggle-icon');
                        const target = document.querySelector(btn.getAttribute('href'));

                        target.addEventListener('shown.bs.collapse', () => {
                            icon.classList.add('rotate');
                        });
                        target.addEventListener('hidden.bs.collapse', () => {
                            icon.classList.remove('rotate');
                        });
                    });
                </script>
            </div>
        </aside>
