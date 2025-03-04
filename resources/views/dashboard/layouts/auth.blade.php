<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <title>
        @yield('page-tile', "لوحة التحكم")
    </title>

    @include('dashboard.inc.metas')

    @include('dashboard.inc.links')

    @stack('css')
</head>

<body class="body">



    <div class="layout-wrap">
        <div id="preload" class="preload-container">
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>




            <div class="main-content">

                @yield('content')

                @include('dashboard.inc.footer')
            </div>
        </div>
    </div>


    <!-- Javascript -->
    @include('dashboard.inc.scripts')

    @stack('js')

</body>

</html>
