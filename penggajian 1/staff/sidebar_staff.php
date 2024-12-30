<?php date_default_timezone_set('Asia/Jakarta'); ?>

<nav class="sidebar close shadow pt-4">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="../logo.png" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">PROKOMPIM</span>
                <span class="profession">Staf</span>
            </div>
        </div>
    </header>

    <div class="menu-bar pt-4">
        <div class="bottom-content">

        <li class="nav-link">
                <a href="dashboard_staff.php" class="<?php echo (basename($_SERVER['REQUEST_URI']) == 'dashboard.php') ? 'active' : ''; ?>">
                    <i class='bx icon'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                        </svg>
                    </i>
                    <span class="text nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="detail_slip_gaji_staff.php"
                    class="<?php echo (basename($_SERVER['REQUEST_URI']) == 'input_kehadiran.php') ? 'active' : ''; ?>">
                    <i class='bx icon'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z" />
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567" />
                        </svg>
                    </i>
                    <span class="text nav-text">Slip Gaji</span>
                </a>
            </li>

        </div>

        <div class="bottom-content">
            <li class="">
                <a href="../logout.php" onclick="alert('Apakah yakin keluar!!')">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </div>
    </div>
</nav>