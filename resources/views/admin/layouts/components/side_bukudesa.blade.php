@push('css')
    <style type="text/css">
        .mini-submenu {
            display: none;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 4px;
            padding: 9px;
            /*position: relative;*/
            width: 42px;
            cursor: pointer;
        }

        #slide-submenu {
            display: inline-block;
            padding: 2px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endpush

<button class="mini-submenu">
    <i class="fa fa-bars"></i>
</button>

<div class="list-group">
    <div class="box-footer no-padding col-sm-11">
        <ul class="nav nav-stacked">
            <li class="{{ compared_return($selected_nav, 'peraturan', 'active') }}"><a href="{{ route('buku-umum.dokumen_sekretariat.perdes', 3) }}">Buku Peraturan Di {{ ucwords(setting('sebutan_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'keputusan', 'active') }}"><a href="{{ route('buku-umum.dokumen_sekretariat.perdes', 2) }}">Buku Keputusan {{ ucwords(setting('sebutan_kepala_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'inventaris', 'active') }}"><a href="{{ site_url('bumindes_inventaris_kekayaan') }}">Buku Inventaris dan Kekayaan {{ ucwords(setting('sebutan_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'aparat', 'active') }}"><a href="{{ site_url('pengurus') }}">Buku {{ ucwords(setting('sebutan_pemerintah_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'tanah_kas', 'active') }}"><a href="{{ site_url('bumindes_tanah_kas_desa/clear') }}">Buku Tanah Kas {{ ucwords(setting('sebutan_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'tanah', 'active') }}"><a href="{{ site_url('bumindes_tanah_desa/clear') }}">Buku Tanah di {{ ucwords(setting('sebutan_desa')) }}</a></li>
            <li class="{{ compared_return($selected_nav, 'agenda_keluar', 'active') }}"><a href="{{ site_url('surat_keluar') }}">Buku Agenda - Surat Keluar</a></li>
            <li class="{{ compared_return($selected_nav, 'agenda_masuk', 'active') }}"><a href="{{ site_url('surat_masuk') }}">Buku Agenda - Surat Masuk</a></li>
            <li class="{{ compared_return($selected_nav, 'ekspedisi', 'active') }}"><a href="{{ site_url('ekspedisi/clear') }}">Buku Ekspedisi</a></li>
            <li class="{{ compared_return($selected_nav, 'lembaran', 'active') }}"><a href="{{ site_url('buku_umum/lembaran_desa/clear') }}">Buku Lembaran {{ ucwords(setting('sebutan_desa')) }} dan Berita {{ ucwords(setting('sebutan_desa')) }}</a></li>
        </ul>
    </div>
    <button class="hide-menu col-sm-1" id="slide-submenu">
        <i class="fa fa-bars"></i>
    </button>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function() {

            $('#slide-submenu').on('click', function() {
                $(this).closest('.list-group').fadeOut('slow', function() {
                    $('.mini-submenu').fadeIn();
                });
                $('#umum-sidebar').removeClass("col-sm-3");
                $('#umum-sidebar').addClass("col-sm-1");
                $('#umum-content').removeClass("col-sm-9");
                $('#umum-content').addClass("col-sm-11");
            });

            $('.mini-submenu').on('click', function() {
                $(this).next('.list-group').fadeIn('slow');
                $('.mini-submenu').hide();
                $('#umum-sidebar').removeClass("col-sm-1");
                $('#umum-sidebar').addClass("col-sm-3");
                $('#umum-content').removeClass("col-sm-11");
                $('#umum-content').addClass("col-sm-9");
            })
        })
    </script>
@endpush
