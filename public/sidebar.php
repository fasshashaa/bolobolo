<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar" class="text-dark p-3">
        <!-- Logo PNC -->
        <div class="text-center mb-4">
            <img src="/assets/img/kaiadmin/pnc.png" alt="PNC Logo" class="img-fluid" style="max-width: 120px;">
        </div>

        <button class="btn btn-secondary mb-3 d-lg-none" id="sidebarClose">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#343a40" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
            <span>Tutup</span>
        </button>

        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/courses/index">Daftar Kursus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/enrollment/index">Daftar Peserta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/index">Daftar Pengguna</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div id="page-content-wrapper" class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 d-lg-none">
            <button class="navbar-toggler" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span>Dashboard</span>
        </nav>

       
        <div class="container mt-4">
          
        </div>
    </div>
</div>

<style>
    #sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #f6faff; 
        color: #343a40;
        z-index: 1050;
        transition: transform 0.3s ease-in-out;
        border-right: 1px solid #ddd; 
    }

    #sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1040;
    }

    @media (max-width: 1024px) {
        #sidebar {
            transform: translateX(-100%);
        }

        #sidebar.active {
            transform: translateX(0);
        }

        #sidebar-overlay.active {
            display: block;
        }
    }

    #page-content-wrapper {
        margin-left: 250px;
        transition: margin-left 0.3s ease-in-out;
    }

    @media (max-width: 1024px) {
        #page-content-wrapper {
            margin-left: 0;
        }
    }

    #sidebar a.nav-link {
        padding: 8px 12px;
        color: #343a40;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }

    #sidebar a.nav-link:hover {
        background-color: #007bff;
        color: white;
        border-radius: 5px;
    }

    #sidebar img {
        display: block;
        margin: 0 auto;
    }
</style>

<script>
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.createElement('div');
    sidebarOverlay.id = 'sidebar-overlay';
    document.body.appendChild(sidebarOverlay);

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
    });

    sidebarClose.addEventListener('click', () => {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    });

    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    });
</script>
