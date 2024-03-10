<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if($title != 'Dashboard') collapsed @endif" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Session()->get('role') == 'HRD')

        <li class="nav-heading">Master Data</li>
        <li class="nav-item">
            <a class="nav-link @if($title != 'Data Pengguna') collapsed @endif" href="/pengguna">
                <i class="bi bi-person"></i>
                <span>Pengguna</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($title != 'Data Bank Soal') collapsed @endif" href="/bank-soal">
                <i class="bi bi-person"></i>
                <span>Bank Soal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($title != 'Data Lowongan Pekerjaan') collapsed @endif" href="/lowongan-pekerjaan">
                <i class="bi bi-person"></i>
                <span>Lowongan</span>
            </a>
        </li>

        @elseif(Session()->get('role') == 'Pelamar')

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a href="tables-general.html">
                    <i class="bi bi-circle"></i><span>General Tables</span>
                </a>
                </li>
                <li>
                <a href="tables-data.html">
                    <i class="bi bi-circle"></i><span>Data Tables</span>
                </a>
                </li>
            </ul>
        </li>

        @elseif(Session()->get('role') == 'Manager')
            
        @endif

    </ul>
</aside>