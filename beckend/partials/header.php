<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKN 3 Banjar</title>
    <link rel="shortcut icon" type="image/png" href="../../template-admin/src/assets/images/logos/logo,SMK.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../template-admin/src/assets/css/styles.min.css" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        /* CSS untuk membuat footer tetap di bawah */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .body-wrapper {
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
            padding: 20px 0;
            margin-top: auto;
            border-top: 3px solid #4B49AC;
        }

        /* Memastikan konten utama memenuhi tinggi viewport */
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Styling untuk navbar agar lebih terlihat */
        .app-header {
            border-bottom: 3px solid #4B49AC;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(75, 73, 172, 0.1);
        }

        /* Styling untuk card contoh agar terlihat */
        .demo-card {
            border: 2px dashed #4B49AC;
            background-color: #f8f9ff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        /* Highlight sidebar */
        .left-sidebar {
            border-right: 2px solid #4B49AC;
        }

        /* Warna highlight untuk menu aktif */
        .sidebar-item .sidebar-link.active {
            background-color: #4B49AC !important;
            color: white !important;
        }

        /* Styling untuk card welcome yang baru */
        .welcome-card {
            border-radius: 15px;
            background: linear-gradient(135deg, #4B49AC 0%, #6A67CE 100%);
            border: none;
            box-shadow: 0 10px 30px rgba(75, 73, 172, 0.3);
        }

        .clock-display {
            font-size: 42px;
            font-weight: bold;
            font-family: 'Courier New', monospace;
            color: white;
            margin: 10px 0;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .date-display {
            font-size: 18px;
            font-weight: 600;
            font-family: 'Arial', sans-serif;
            color: rgba(255, 255, 255, 0.9);
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 20px;
            display: inline-block;
        }
    </style>
</head>