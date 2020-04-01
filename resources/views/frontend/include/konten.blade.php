@include('frontend.include.header')

<div class="section">
    <!-- container -->
    <div class="container">

        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                @yield('content')
            </div>

        @include('frontend.include.widget')


    </div>
</div>
</div>
</div>
</div>
@include('frontend.include.footer')
