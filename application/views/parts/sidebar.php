<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url('Dashboard') ?>"><img src="<?= base_url('') ?>assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="<?= base_url('Dashboard') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data Master</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('Pegawai') ?>">Kelola Pegawai</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('Bahan') ?>">Data Bahan Mentah</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kelola Inventory</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('Pegawai') ?>">Barang Masuk</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('Bahan') ?>">Barang Keluar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('Bahan') ?>">Perhitungan Barang</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('Pegawai') ?>">Rekap Absen</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url('Bahan') ?>">Laporan</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="<?= base_url('Login/logout') ?>" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Logout</span>
                    </a>
                </li>



            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>