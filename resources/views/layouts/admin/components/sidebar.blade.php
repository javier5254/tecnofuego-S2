<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">

        <ul class="side-nav-menu scrollable">
            <!-- PERFIL QK-->
            <div class="side-nav-logo" style="background-color: #868589;border-right: none;border-bottom: 0">
                <a href="#">
                    <div class="logo logo-dark"></div>
                </a>

            </div>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle shadow-1 " href="javascript:void(0);">
                    <span class="icon-holder">
                        @if (auth()->user()->profile_photo_path)
                            <img src="{{ asset('storage') . '/' . auth()->user()->profile_photo_path }}" alt=""
                                width="35px" class="img-circle">

                        @else
                            <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png"
                                alt="" width="30px">
                        @endif

                    </span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                    <span class="title text-truncate d-inline-block" style="width: 8rem;">{{ ucwords(auth()->user()->name) }}</span><br>

                    <small class="title ml-5 pl-1">
                        @php
                            $rol = auth()->user()->getRolenames();
                            echo $rol->first() != '' ? $rol->first() : 'Sin Rol';
                        @endphp
                    </small>


                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('user.show', auth()->user()->id) }}">Perfil</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();this.closest('form').submit();" class="ml-3">
                                salir
                            </a>
                        </form>
                    </li>

                </ul>
            </li>
            <!-- PERFIL QK-->




            <li class="nav-item">
                <a class="mrg-top-30" href="{{ route('home.index') }}">
                    <span class="icon-holder">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="title">Principal</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-clipboard-list"></i>
                    </span>
                    <span class="title">Actividades</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('activity.main', 1) }}">Inspecciones</a>
                    </li>
                    <li>
                        <a href="{{ route('activity.main', 2) }}">Mantenimientos</a>
                    </li>
                    <li>
                        <a href="{{ route('activity.main', 3) }}">Recargas</a>
                    </li>
                    <li>
                        <a href="{{ route('activity.main', 4) }}">Reinstalacion</a>
                    </li>
                    <li>
                        <a href="{{ route('activity.main', 5) }}">Emergencias</a>
                    </li>
                </ul>
            </li>
            @canany(['client-show','project-show','component-show','equipment-show'])
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-list-ul"></i>
                    </span>
                    <span class="title">Maestros</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('client-show')
                        <li>
                            <a href="{{ route('client.index') }}">Clientes</a>
                        </li>
                    @endcan
                    @can('project-show')
                        <li>
                            <a href="{{ route('project.index') }}">Proyectos</a>
                        </li>
                    @endcan
                    @can('component-show')
                        <li>
                            <a href="{{ route('component.index') }}">Componentes</a>
                        </li>
                    @endcan
                    @can('equipment-show')
                        <li>
                            <a href="{{ route('equipment.index') }}">Equipos</a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['user-show','list-show','part-show','serv-show','role-show','permission-show'])

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-cog"></i>
                    </span>
                    <span class="title">Confirguraciones</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('user-show')
                        <li>
                            <a href="{{ route('user.index') }}">Usuarios</a>
                        </li>
                    @endcan
                    @can('list-show')
                        <li>
                            <a href="{{ route('list.index') }}">Listas</a>
                        </li>
                    @endcan
                    @can('part-show')
                        <li>
                            <a href="{{ route('part.index') }}">Partes</a>
                        </li>
                    @endcan
                    @can('serv-show')
                        <li>
                            <a href="{{ route('serv.index') }}">Servicios</a>
                        </li>
                    @endcan
                    @can('role-show')
                        <li>
                            <a href="{{ route('role.index') }}">Roles</a>
                        </li>
                    @endcan
                    {{-- @can('permission-show')
                        <li>
                            <a href="{{ route('permission.index') }}">Permisos</a>
                        </li>
                    @endcan --}}
                </ul>

            </li>
            @endcanany
            <li class="nav-item mt-5">
                <a href="mailto:cpenaranda@tecno-fuego.com.co">
                    <span class="icon-holder">
                        <i class="fas fa-question-circle"></i>
                    </span>
                    <span class="title">Ayuda</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->
