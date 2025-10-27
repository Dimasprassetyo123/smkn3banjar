    <script src="../../template-admin/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../template-admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../template-admin/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../template-admin/src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../../template-admin/src/assets/js/sidebarmenu.js"></script>
    <script src="../../template-admin/src/assets/js/app.min.js"></script>
    <script src="../../template-admin/src/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    

    <script>
        function updateDashboardDateTime() {
            const now = new Date();

            // Format waktu (jam:menit:detik)
            let h = String(now.getHours()).padStart(2, '0');
            let m = String(now.getMinutes()).padStart(2, '0');
            let s = String(now.getSeconds()).padStart(2, '0');

            // Update jam di dashboard
            const dashboardClock = document.getElementById("dashboard-digital-clock");
            if (dashboardClock) {
                dashboardClock.textContent = `${h}:${m}:${s}`;
            }

            // Format hari, tanggal, dan tahun
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            const dayName = days[now.getDay()];
            const date = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();

            // Update tanggal di dashboard
            const dashboardDate = document.getElementById("dashboard-date-display");
            if (dashboardDate) {
                dashboardDate.textContent = `${dayName}, ${date} ${monthName} ${year}`;
            }
        }

        // Jalankan fungsi update waktu setiap detik
        setInterval(updateDashboardDateTime, 1000);

        // Jalankan fungsi pertama kali saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            updateDashboardDateTime();
        });
    </script>
    </body>

    </html>