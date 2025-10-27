<?php
include 'partials/header.php';
?>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar Start -->
    <?php
    include 'partials/navbar.php';
    ?>
    <!-- Navbar End -->
    <!-- home -->
    <?php
    include 'sections/home.php';
    ?>
    <!-- home End -->



    <!-- About Start -->
    <?php
    include 'sections/about.php';
    ?>
    <!-- About End -->

    <!-- visi misi Start -->
    <?php
    include 'sections/visimisi.php';
    ?>
    <!-- visi misi End -->

    <!-- kepala Sekolah -->
    <?php
    include 'sections/kepala.php';
    ?>
    <!-- kepala Sekolah End -->

    <!-- guru Start -->
    <?php
    include 'sections/guru.php';
    ?>
    <!-- guru End -->

    <!-- jurusan Start -->
    <?php
    include 'sections/jurusan.php';
    ?>
    <!-- jurusan Start -->



    <!-- Footer Start -->
    <?php
    include 'partials/footer.php';
    ?>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <?php
    include 'partials/script.php';
    ?>
</body>

</html>