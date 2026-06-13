<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa - SIAMAS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div style="background: var(--primary); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">S</div>
                <span>SIAMAS</span>
            </div>
            <ul class="nav-links">
                <li class="nav-item"><a href="dashboard.php" class="nav-link"><span>📊</span> <span>Dashboard</span></a></li>
                <li class="nav-item"><a href="mahasiswa.php" class="nav-link active"><span>👥</span> <span>Mahasiswa</span></a></li>
                <li class="nav-item"><a href="dosen.php" class="nav-link"><span>🎓</span> <span>Dosen</span></a></li>
                <li class="nav-item"><a href="matakuliah.php" class="nav-link"><span>📚</span> <span>Mata Kuliah</span></a></li>
                <li class="nav-item"><a href="laporan.php" class="nav-link"><span>📈</span> <span>Laporan Ringkas</span></a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="top-bar">
                <div>
                    <h1 style="font-size: 1.5rem; font-weight: 800;">Data Mahasiswa</h1>
                    <div id="breadcrumb-container"></div>
                </div>
                <button class="btn btn-primary" onclick="App.notification('INFO', 'Fitur Tambah Mahasiswa Terintegrasi')">
                    + Tambah Mahasiswa
                </button>
            </div>

            <div class="card" style="padding: 0; overflow: hidden;">
                <div style="padding: 1.5rem; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                    <div class="search-box" style="margin: 0; width: 300px;">
                        <span class="search-icon">🔍</span>
                        <input type="text" placeholder="Filter mahasiswa..." onkeyup="handleGlobalSearch(event)">
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                         <button class="btn" style="background: #f1f5f9; padding: 0.5rem 1rem;">Export Excel</button>
                    </div>
                </div>
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase;">Profil Mahasiswa</th>
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase;">NIM</th>
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase;">Semester</th>
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase;">IPK</th>
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase;">Status</th>
                            <th style="padding: 1rem; font-size: 0.75rem; color: #64748b; text-transform: uppercase; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="student-table-body">
                        <!-- JS Dynamic Content -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>
    <script src="js/mahasiswa.js"></script>
</body>
</html>