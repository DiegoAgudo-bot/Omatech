<!DOCTYPE html>
<html>
    @include('back.layouts.partials.head')
    <body>
        <div class="row">
            <div class="col-md-2">
                @include('back.layouts.partials.navigation')
            </div>
            <div class="col-md-10">
                @include('back.layouts.partials.top-bar')
                @yield('content')
            </div>
        </div>
    @yield('js')
    </body>
</html>
