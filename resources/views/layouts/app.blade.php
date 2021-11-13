@include('layouts.header')
<div id="wrapper">
    <!-- Begin page -->

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="content-page">
        <div class="content">

            <!-- Start content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <footer class="footer"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
@include('layouts.footer')