<style>
    section {
        scroll-margin-top: 100px;
    }

    .sticky-navbar {
        position: fixed !important;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        background: #0d86ffff;
        padding: 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
        height: 100px;
        transition: all 0.3s ease-in-out;
    }

    /* Style default nav-link */
    .navbar .navbar-nav .nav-link {
        color: #ffffff !important;
        transition: color 0.3s ease, background-color 0.3s ease;
        padding: 10px 18px;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 600;
    }

    /* Aktif (yang sedang dipilih/scroll) */
    .navbar .navbar-nav .nav-link.active {
        color: #fdbd0d !important;
        font-weight: bold;
    }

</style>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="navbar-background"></div>
    <div class="container-fluid px-4 position-relative">
        <!-- Logo -->
        <div class="d-flex align-items-center">
            <img src="./template/template_user/img/logo,SMK.png"
                alt="Logo SMKN 3 Banjar"
                style="width: 90px; height: 55px; object-fit: contain; margin-right: 15px;">
            <h2 class="text-dark fw-bold m-0">SMKN 3 BANJAR</h2>
        </div>

        <!-- Toggle -->
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <div class="navbar-nav me-4">
                <a href="index.php#home" class="nav-item nav-link active" id="nav-home">Beranda</a>
                <!-- Profil Sekolah (index.php) -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-profil">Profil Sekolah</a>
                    <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                        <a href="index.php#about" class="dropdown-item">Tentang Kami</a>
                        <a href="index.php#visimisi" class="dropdown-item">Visi Misi & Pengumuman</a>
                        <a href="index.php#kepala" class="dropdown-item">Kepala Sekolah</a>
                        <a href="index.php#guru" class="dropdown-item">Guru</a>
                        <a href="index.php#jurusan" class="dropdown-item">Jurusan</a>
                    </div>
                </div>

                <!-- Informasi (index2.php) -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-informasi">Informasi</a>
                    <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                        <a href="index2.php#prestasi" class="dropdown-item">Prestasi</a>
                        <a href="index2.php#blog" class="dropdown-item">Berita</a>
                        <a href="index2.php#galeri" class="dropdown-item">Galeri</a>
                    </div>
                </div>

                <!-- Lainnya (index3.php) -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-lainnya">Lainnya</a>
                    <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                        <a href="index3.php#testimoni" class="dropdown-item">Testimoni</a>
                        <a href="index3.php#pesan" class="dropdown-item">Kontak</a>
                    </div>
                </div>

            </div>

            <!-- Sosmed -->
            <div class="social-icons">
                <a class="btn btn-light text-danger" href="https://www.instagram.com/smkn3banjar/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-light text-danger" href="https://youtu.be/FW1Ywl82DyM" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link, .dropdown-item');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    function clearActive() {
        navLinks.forEach(l => l.classList.remove("active"));
        dropdownToggles.forEach(dt => dt.classList.remove("active"));
    }

    function setActive(link) {
        if (!link) return;
        clearActive();
        link.classList.add("active");

        // Jika link di dalam dropdown, aktifkan parent
        const parentDropdown = link.closest('.dropdown');
        if (parentDropdown) {
            parentDropdown.querySelector('.dropdown-toggle').classList.add("active");
        }
    }

    // --- 1. Klik manual
    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            setActive(this);

            // Tutup navbar di mobile
            if (window.innerWidth < 992) {
                const navbarCollapse = document.getElementById('navbarCollapse');
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });
                bsCollapse.hide();
            }
        });
    });

    // --- 2. Tandai aktif berdasarkan URL (cross page)
    const currentPath = window.location.pathname.split("/").pop(); // contoh: index2.php
    const currentHash = window.location.hash; // contoh: #about

    navLinks.forEach(link => {
        const href = link.getAttribute("href");
        if (!href) return;

        if (href.includes(currentPath) && (currentHash ? href.includes(currentHash) : true)) {
            setActive(link);
        }
    });

    // --- 3. Scroll manual (hanya untuk anchor dalam halaman ini)
    let scrollTimeout;
    window.addEventListener("scroll", () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            let scrollPos = window.scrollY + 120;
            let activeLink = null;

            navLinks.forEach(link => {
                const target = link.getAttribute("href");
                if (target && target.startsWith("#")) {
                    const section = document.querySelector(target);
                    if (section) {
                        if (section.offsetTop <= scrollPos && (section.offsetTop + section.offsetHeight) > scrollPos) {
                            activeLink = link;
                        }
                    }
                }
            });

            if (activeLink) setActive(activeLink);
        }, 80);
    });

    // --- 4. Intersection Observer
    const observerOptions = { root: null, rootMargin: "0px 0px -50% 0px", threshold: 0.3 };
    const sections = [];
    navLinks.forEach(link => {
        const target = link.getAttribute("href");
        if (target && target.startsWith("#")) {
            const section = document.querySelector(target);
            if (section) {
                sections.push({ section, link });
            }
        }
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = "#" + entry.target.id;
                const activeLink = document.querySelector(`.navbar-nav a[href="${id}"]`);
                if (activeLink) setActive(activeLink);
            }
        });
    }, observerOptions);

    sections.forEach(({ section }) => observer.observe(section));
});

</script>