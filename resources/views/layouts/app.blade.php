<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
<body>
    <div id="app">
        @include('includes.header')

        <main>
            <section>
                @include('flash-message')
                <div class="container py-5 mb-5">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                            <div class="panel-body pb-5 mb-5">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('includes.footer')
        </main>
    </div>
</body>
</html>
