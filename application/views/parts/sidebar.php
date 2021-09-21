<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url('Dashboard') ?>"><img src="<?= base_url('') ?>assets/images/logo/logo.png" style="width: 90px; height:100px; margin: 0px 0px 0px 70px"  alt="Logo" srcset=""></a>
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

                    <?php
                    $urlMaster = "";
                    if ($this->uri->segment(1) === 'Pegawai' || $this->uri->segment(1) === 'Bahan'  || $this->uri->segment(1) === 'User')  {
                        $urlMaster = 'active';
                    } ?>
                    <ul class="submenu <?php echo $urlMaster;  ?>">
                        <li class="submenu-item <?php echo active_link('Pegawai'); ?>">
                            <a href="<?php echo base_url('Pegawai') ?>"><i class="fa-fw select-all fas"></i> Kelola Pegawai</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('User'); ?>">
                            <a href="<?php echo base_url('User') ?>"><i class="fa-fw select-all fas"></i> Kelola User</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Bahan'); ?>">
                            <a href="<?= base_url('Bahan') ?>"><i class="fa-fw select-all fas"></i> Data Bahan</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Helm'); ?>">
                            <a href="<?= base_url('Helm') ?>"><i class="fas fa-hard-hat"></i> Data Helm</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>Kelola Inventory</span>
                    </a>
                    <?php
                    $url = "";
                    if ($this->uri->segment(1) === 'BarangMasuk' || $this->uri->segment(1) === 'BarangKeluar' || $this->uri->segment(1) === 'KalkulasiBahan') {
                        $url = 'active';
                    } ?>
                    <ul class="submenu <?php echo $url ?>">
                        <li class="submenu-item <?php echo active_link('PemesananBarang'); ?>">
                            <a href="<?php echo base_url('PemesananBarang') ?>"><i class="fas fa-cart-arrow-down"></i> Order Barang</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('BarangMasuk'); ?>">
                            <a href="<?php echo base_url('BarangMasuk') ?>"><i class="fa-fw select-all fas"></i> Barang Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('BarangKeluar'); ?>">
                            <a href="<?= base_url('BarangKeluar') ?>"><i class="fas fa-truck"></i> Barang Keluar</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('KalkulasiBahan'); ?>">
                            <a href="<?= base_url('KalkulasiBahan') ?>"><i class="fa-fw select-all fas"></i> Kalkulasi Bahan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-fw select-all fas"></i>
                        <span>Laporan</span>
                    </a>
                    <?php
                    $url = "";
                    if ($this->uri->segment(2) === 'indexBarangMasuk' || $this->uri->segment(2) === 'indexBarangKeluar') {
                        $url = 'active';
                    } ?>
                    <ul class="submenu <?php echo $url ?>">
                        <li class="submenu-item <?php echo active_link('Laporan/indexBarangMasuk'); ?>">
                            <a href="<?php echo base_url('Laporan/indexBarangMasuk') ?>">Laporan Barang Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo active_link('Laporan/indexBarangKeluar'); ?>">
                            <a href="<?php echo base_url('Laporan/indexBarangKeluar') ?>">Laporan Barang Keluar</a>
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