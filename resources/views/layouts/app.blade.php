<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
<body>
    <div id="app">
        @include('includes.header')

        <main class="py-4">
            @include('flash-message')
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <section class="footer-section">
            <div class="container">
                <div class="row p-2 my-5">
                    @include('includes.footer')
                </div>
            </div>
        </section>
    </div>
</body>
</html>
