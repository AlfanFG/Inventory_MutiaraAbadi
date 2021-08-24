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
        <div class="sidebar-menu ">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php echo active_link('Dashboard'); ?>">
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
                    <ul class="submenu <?php echo active_link($this->uri->segment(1))  ?>">
                        <li class="submenu-item <?php echo active_link('Pegawai'); ?>">
                            <a href="<?php echo base_url('Pegawai') ?>"><i class="fa-fw select-all fas"></i> Kelola Pegawai</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Bahan'); ?>">
                            <a href="<?= base_url('Bahan') ?>"><i class="fa-fw select-all fas"></i> Data Bahan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>Kelola Inventory</span>
                    </a>
                    <ul class="submenu <?php echo active_link($this->uri->segment(1))  ?>">
                        <li class="submenu-item <?php echo active_link('Pegawai'); ?>">
                            <a href="<?php echo base_url('Pegawai') ?>"><i class="fa-fw select-all fas"></i> Barang Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Bahan'); ?>">
                            <a href="<?= base_url('Bahan') ?>"><i class="fa-fw select-all fas"></i> Barang Keluar</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Bahan'); ?>">
                            <a href="<?= base_url('Bahan') ?>"><i class="fa-fw select-all fas"></i> Kalkulasi Bahan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu <?php echo active_link($this->uri->segment(1))  ?>">
                        <li class="submenu-item <?php echo active_link('Pegawai'); ?>">
                            <a href="<?php echo base_url('Pegawai') ?>"><i class="fa-fw select-all fas"></i> Rekap Absen</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Bahan'); ?>">
                            <a href="<?= base_url('Bahan') ?>"><i class="fa-fw select-all fas"></i> Laporan</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<script>

</script>