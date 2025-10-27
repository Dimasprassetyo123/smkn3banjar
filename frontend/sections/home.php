<div id="home" class="container-fluid p-0 mb-6 wow fadeIn" data-wow-delay="0.0s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicator (thumbnail kecil di bawah) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1">
                <img class="img-fluid" src="./template/template_user/img/begronsmk1.png" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-fluid" src="./template/template_user/img/begrounsmk2.png" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-fluid" src="./template/template_user/img/begronsmk3.jpg" alt="Image">
            </button>
        </div>

        <!-- Slide -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img class="w-100" src="./template/template_user/img/begronsmk1.png" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Selamat Datang</h1>
                </div>
                <!-- Jam -->
                <div class="clock-container">
                    <div id="digital-clock"></div>
                    <div id="date-display"></div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img class="w-100" src="./template/template_user/img/begrounsmk2.png" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Di Website SMK</h1>
                </div>
                <div class="clock-container">
                    <div id="digital-clock-2"></div>
                    <div id="date-display-2"></div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img class="w-100" src="./template/template_user/img/begronsmk3.jpg" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-1 text-uppercase text-white mb-4 animated zoomIn">NEGERI 3 BANJAR</h1>
                </div>
                <div class="clock-container">
                    <div id="digital-clock-3"></div>
                    <div id="date-display-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
#home {
    margin-top: 90px; 
}

/* Posisi jam menempel di pojok kanan bawah */
.clock-container {
    position: absolute;
    bottom: 20px;
    right: 20px;
    text-align: right;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    line-height: 1.4;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
    z-index: 10;
}

/* Teks jam lebih besar */
.clock-container #digital-clock,
.clock-container #digital-clock-2,
.clock-container #digital-clock-3 {
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 2px;
}
</style>

<!-- JS -->
<script>
function updateDateTime() {
    const now = new Date();

    // Format waktu (jam:menit:detik)
    let h = String(now.getHours()).padStart(2, '0');
    let m = String(now.getMinutes()).padStart(2, '0');
    let s = String(now.getSeconds()).padStart(2, '0');

    // Update semua jam
    ['digital-clock', 'digital-clock-2', 'digital-clock-3'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.textContent = `${h}:${m}:${s}`;
    });

    // Format tanggal
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    const dayName = days[now.getDay()];
    const date = now.getDate();
    const monthName = months[now.getMonth()];
    const year = now.getFullYear();

    // Update semua tanggal
    ['date-display', 'date-display-2', 'date-display-3'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.textContent = `${dayName}, ${date} ${monthName} ${year}`;
    });
}

// Jalankan setiap detik
setInterval(updateDateTime, 1000);
updateDateTime();
</script>
