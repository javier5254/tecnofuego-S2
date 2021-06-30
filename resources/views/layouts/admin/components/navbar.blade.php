<!-- Header START -->
<div class="header navbar navbar-fixed-top" id="navbar-custom">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                
                @if (trim($__env->yieldContent('volverU')))
                    <a href="{{ route('home.index') }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                @elseif (trim($__env->yieldContent('volver')))
                    <a href="{{ URL::previous() }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                @else
                    <a class="side-nav-toggle" href="javascript:void(0);">
                        <i class="fas fa-bars"></i>
                    </a>
                @endif
            </li>
            <li>
                <a class="title-nav-custom" style="font-weight:600;">
                    @yield('breadcum')
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->
