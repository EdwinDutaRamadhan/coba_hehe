<div class="body-overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('img/logo.png') }}" class="img-fluid w-100 px-3" /></h3>
    </div>
    <ul class="list-unstyled components">


        <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"><!-- DASHBOARD -->
            <a href="{{ route('dashboard.home.index') }}"><i class="material-icons">dashboard</i>
                <span>Dashboard</span></a>
        </li>

        <li class="dropdown"><!-- MANAJEMEN USER -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#admin_panel" role="button"
                aria-expanded="false" aria-controls="admin_panel">
                <i class="material-icons">manage_accounts</i>
                <span>Manajemen User</span>
            </a>
            <ul class="collapse {{ Request::segment(2) == 'manajemen-user' ? 'show' : '' }}" id="admin_panel">
                <li class="{{ Request::segment(3) == 'admin' ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}"><i class="material-icons ps-4">folder_shared</i>
                        <span>Admin</span></a>
                </li>
                <li class="{{ Request::segment(3) == 'admin-role' ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}"><i class="material-icons ps-4">admin_panel_settings</i>
                        <span>Admin Role</span></a>
                </li>
                <li class="">
                    <a href="/"><i class="material-icons ps-4">support_agent</i>
                        <span>Customer(-)</span></a>
                </li>
                <li class="">
                    <a href="/"><i class="material-icons ps-4">loyalty</i>
                        <span>Level Loyalty(-)</span></a>
                </li>
                <li class="">
                    <a href="/"><i class="material-icons ps-4">mark_chat_unread</i>
                        <span>Pesan(-)</span></a>
                </li>
                <li class="">
                    <a href="/"><i class="material-icons ps-4">card_membership</i>
                        <span>Alfamidi Member(-)</span></a>
                </li>
                <li class="">
                    <a href="/"><i class="material-icons ps-4">work_history</i>
                        <span>Master Pekerjaan(-)</span></a>
                </li>

            </ul>
        </li>

        <li class="dropdown "><!-- MANAJEMEN PRODUK -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#manajemen_produk" role="button"
                aria-expanded="false" aria-controls="manajemen_produk">
                <i class="material-icons">inventory_2</i>
                <span>Manajemen Produk</span>
            </a>
            <ul class="collapse {{ Request::segment(2) == 'manajemen-produk' ? 'show' : '' }}" id="manajemen_produk">
                <li class="{{ Request::segment(3) == 'kategori-produk' ? 'active' : '' }}">
                    <a href="{{ route('productcategory.index') }}"><i class="material-icons ps-4">category</i>
                        <span>Kategori Produk</span></a>
                </li>

                <li class="">
                    <a href="/"><i class="material-icons ps-4">format_color_fill</i>
                        <span>Warna Produk(-)</span></a>
                </li>

                <li class="">
                    <a href="/"><i class="material-icons ps-4">scale</i>
                        <span>Ukuran Produk(-)</span></a>
                </li>
                
                <li class="{{ Request::segment(3) == 'brand' ? 'active' : '' }}">
                    <a href="{{ route('brand.index') }}"><i class="material-icons ps-4">corporate_fare</i>
                        <span>Brand</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">stroller</i>
                        <span>Produk(-)</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">price_change</i>
                        <span>Harga Produk(-)</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">hotel_class</i>
                        <span>Produk Unggulan(-)</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">book</i>
                        <span>Produk Pilihan(-)</span></a>
                </li>

                <li class="{{ Request::segment(3) == 'productmass' ? 'active' : '' }}">
                    <a href="{{ route('productmass.index') }}"><i class="material-icons ps-4">local_mall</i>
                        <span>Produkmass</span></a>
                </li>

                <li class="{{ Request::segment(3) == 'kategori-preorder' ? 'active' : '' }}">
                    <a href="{{ route('kategoripreorder.index') }}"><i class="material-icons ps-4">add_shopping_cart</i>
                        <span>Kategori Preorder</span></a>
                </li>

                <li class="{{ Request::segment(3) == 'merk' ? 'active' : '' }}">
                    <a href="{{ route('merk.index') }}"><i class="material-icons ps-4">shopping_bag</i>
                        <span>Merk</span></a>
                </li>
            </ul>
        </li>


        <li class="dropdown"><!-- PENGATURAN STOK -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#pengaturan_stok" role="button"
                aria-expanded="false" aria-controls="pengaturan_stok">
                <i class="material-icons">storage</i>
                <span>Pengaturan Stok</span>
            </a>
            <ul class="collapse {{ Request::is('cms/pengaturan-stok/*') ? 'show' : '' }}" id="pengaturan_stok">
                <li class=" {{ Request::segment(3) == 'toko' ? 'active' : '' }}  ">
                    <a href=" {{ route('store.index') }}"><i class="material-icons ps-4">local_grocery_store</i>
                        <span>Toko</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">shopping_cart_checkout</i>
                        <span>Barang Masuk(-)</span></a>
                </li>

                <li class=" ">
                    <a href=""><i class="material-icons ps-4">store</i>
                        <span>Stock Barang</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">production_quantity_limits</i>
                        <span>Stock Opname(-)</span></a>
                </li>

                <li class="">
                    <a href=""><i class="material-icons ps-4">add_business</i>
                        <span>Cabang</span></a>
                </li>

                <li class=" ">
                    <a href=""><i class="material-icons ps-4">data_thresholding</i>
                        <span>Threshold Cabang</span></a>
                </li>

                <li class=" ">
                    <a href=""><i class="material-icons ps-4">storefront</i>
                        <span>Stock SB</span></a>
                </li>
            </ul>
        </li>

        <li class="dropdown"> <!-- POTONGAN HARGA -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#potongan_harga" role="button"
                aria-expanded="false" aria-controls="potongan_harga">
                <i class="material-icons">discount</i>
                <span>Potongan Harga</span>
            </a>
            <ul class="collapse {{ Request::is('admin/pengaturan-stok/*') ? 'show' : '' }}" id="potongan_harga">
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">local_offer</i>
                        <span>Voucher</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">request_quote</i>
                        <span>Diskon(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">attach_money</i>
                        <span>Grup Diskon</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">production_quantity_limits</i>
                        <span>Flash Sale</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">card_membership</i>
                        <span>Bundle</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">shopping_bag</i>
                        <span>Voucher Offline</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">card_travel</i>
                        <span>Item Promo(-)</span></a>
                </li>
            </ul>
        </li>

        <li class="dropdown"><!-- KONTEN HALAMAN HOME -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#konten_halaman_home" role="button"
                aria-expanded="false" aria-controls="konten_halaman_home">
                <i class="material-icons">dashboard_customize</i>
                <span>Konten Halaman Home</span>
            </a>
            <ul class="collapse " id="konten_halaman_home">
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">space_dashboard</i>
                        <span>Slider Utama</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">collections</i>
                        <span>Banner Gambar</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">table_view</i>
                        <span>Grup Produk</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">filter_frames</i>
                        <span>Tampilan Konten</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">ad_units</i>
                        <span>Slider Gambar</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">filter</i>
                        <span>Konten Pop Up</span></a>
                </li>
                
            </ul>
        </li>

        <li class="dropdown"><!-- PENGATURAN KONTEN -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#pengaturan_konten" role="button"
                aria-expanded="false" aria-controls="pengaturan_konten">
                <i class="material-icons">collections</i>
                <span>Pengaturan Konten</span>
            </a>
            <ul class="collapse  " id="pengaturan_konten">
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">ondemand_video</i>
                        <span>Video Slider(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">video_settings</i>
                        <span>Konten Iklan(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">badge</i>
                        <span>Info Kontak(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">aod</i>
                        <span>Social Media(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">description</i>
                        <span>Deskripsi Halaman(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">event</i>
                        <span>Event(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">quiz</i>
                        <span>FAQ(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">rss_feed</i>
                        <span>Blog(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">wysiwyg</i>
                        <span>Blog Utama(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">add_business</i>
                        <span>Offline Store(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">notifications_active</i>
                        <span>Notifikasi</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">newspaper</i>
                        <span>News(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">query_stats</i>
                        <span>Pencarian Populer(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">local_shipping</i>
                        <span>Kurir</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">mms</i>
                        <span>Inspiration Feed(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">approval</i>
                        <span>Variable</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">campaign</i>
                        <span>Push Notification</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">schedule</i>
                        <span>Jam Operasi(-)</span></a>
                </li>
                <li class=" ">
                    <a href=""><i class="material-icons ps-4">assignment_return</i>
                        <span>Template Retur(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">card_giftcard</i>
                        <span>Akoin</span></a>
                </li>
            </ul>
        </li>

        <li class="dropdown"><!-- TRANSAKSI -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#transaksi" role="button"
                aria-expanded="false" aria-controls="transaksi">
                <i class="material-icons">receipt_long</i>
                <span>Transaksi</span>
            </a>
            <ul class="collapse  " id="transaksi">
                <li class="">
                    <a href=""><i class="material-icons ps-4">payment</i>
                        <span>Daftar Transaksi</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">import_export</i>
                        <span>Export Transaksi BKL</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">receipt_long</i>
                        <span>Status Transaksi(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">reviews</i>
                        <span>Review Produk(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">assignment_returned</i>
                        <span>Daftar Retur(-)</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">paragliding</i>
                        <span>Parameter</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">more_time</i>
                        <span>Waktu Pengiriman</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">volunteer_activism</i>
                        <span>Donasi</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">account_balance_wallet</i>
                        <span>Metode Pembayaran</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">report</i>
                        <span>Laporan Kendala</span></a>
                </li>

            </ul>
        </li>

        <li class="dropdown"><!-- TRANSAKSI DIGITAL -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#transaksi_digital" role="button"
                aria-expanded="false" aria-controls="transaksi_digital">
                <i class="material-icons">contactless</i>
                <span>Transaksi Digital</span>
            </a>
            <ul class="collapse  " id="transaksi_digital">
                <li class="">
                    <a href=""><i class="material-icons ps-4">signal_cellular_connected_no_internet_4_bar</i>
                        <span>Pulsa & Paket Data</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">document_scanner</i>
                        <span>Daftar Transaksi</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">sync_problem</i>
                        <span>Kategori Kendala</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">report</i>
                        <span>Laporan Kendala</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">account_balance</i>
                        <span>Biller</span></a>
                </li>
                <li class="">
                    <a href=""><i class="material-icons ps-4">file_download</i>
                        <span>Download File Rekon</span></a>
                </li>

            </ul>
        </li>

        <li class="dropdown"><!-- LAPORAN -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#laporan" role="button"
                aria-expanded="false" aria-controls="laporan">
                <i class="material-icons">flag</i>
                <span>Laporan</span>
            </a>
            <ul class="collapse {{ Request::is('admin/admin-panel/*') ? 'show' : '' }}" id="laporan">
                <li class="{{ Request::is('admin/admin-panel/data') ? 'active' : '' }}">
                    <a href=""><i class="material-icons ps-4">production_quantity_limits</i>
                        <span>Produk</span></a>
                </li>

                <li class="{{ Request::is('admin/admin-panel/akses') ? 'active' : '' }}">
                    <a href=""><i class="material-icons ps-4">sell</i>
                        <span>Penjualan</span></a>
                </li>

                <li class="{{ Request::is('admin/admin-panel/akses') ? 'active' : '' }}">
                    <a href=""><i class="material-icons ps-4">local_activity</i>
                        <span>Promo</span></a>
                </li>

                <li class="{{ Request::is('admin/admin-panel/akses') ? 'active' : '' }}">
                    <a href=""><i class="material-icons ps-4">flag_circle</i>
                        <span>Laporan Utama</span></a>
                </li>

            </ul>
        </li>

        <li class="dropdown"><!-- MEMBERSHIP -->
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#membership" role="button"
                aria-expanded="false" aria-controls="membership">
                <i class="material-icons">flag</i>
                <span>Membership</span>
            </a>
            <ul class="collapse " id="membership">
                <li class="">
                    <a href=""><i class="material-icons ps-4">collections_bookmark</i>
                        <span>Customer Update(-)</span></a>
                </li>
            </ul>
        </li>
    </ul>


</nav>
