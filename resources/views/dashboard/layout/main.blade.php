<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('dashboard.components.head')

<body class="layout-default">


    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        @include('dashboard.components.header')
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">



                    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">





                    <div class="container-fluid page__container " style="margin-top: 6rem;">
                        @yield('content')

                    </div>


                    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

                    <script>
                        AOS.init();
                    </script>


                </div>
                @if (Auth::user())
                    @if (!(Auth::user()->role == 'student'))
                        @include('dashboard.components.sidebar')
                    @endif
                @endif
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default"
            :layout-location="{
                'default': 'index.html',
                'fixed': 'fixed-index.html',
                'fluid': 'fluid-index.html',
                'mini': 'mini-index.html'
            }"></app-settings>
    </div>

    @include('dashboard.components.scripts')




</body>

</html>
