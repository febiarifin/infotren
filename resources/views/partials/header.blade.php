<header class="top-area">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img class="my-logo-box-header" src="{{ asset('infotren-fe/assets/logo/logo-fix-1.png') }}" alt="Infotren"> </a>
                    </div>
                    <!-- /.logo-->
                </div>
                <!-- /.col-->
                <div class="col-sm-10">
                    <div class="main-menu">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <i class="fa fa-bars"></i></button><!-- / button-->
                        </div>
                        <!-- /.navbar-header-->
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li>
                                    <a href="{{ route('home') }}#pack">pondok pesantren </a>
                                </li>
                                <li>
                                    <button class="book-btn" onclick="location.href = '{{ route('home') }}#search-box'">cari pesantren</button>
                                </li>
                                <!--/.project-btn-->
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.main-menu-->
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row -->
            <div class="home-border"></div>
            <!-- /.home-border-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /.header-area -->
</header>
