<div class="body-overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('img/logo.png') }}" class="img-fluid w-100 px-3" /></h3>
    </div>
    <ul class="list-unstyled components">


        @foreach (auth()->user()->role()->withFeature()->get() as $f)
            {{-- sidebar parent --}}
            @foreach ($f->feature as $sidebar)
                <li class="dropdown"><!-- MANAJEMEN USER -->
                    <a class="dropdown-toggle" {{ $sidebar->route_name == null ? 'data-bs-toggle=collapse' : '' }} href="{{ $sidebar->route_name !== null ? route($sidebar->route_name) : '#admin_' . $sidebar->feature_id }}"
                        role="button" aria-expanded="false" aria-controls="{{ 'admin_' . $sidebar->feature_id }}">
                        <i class="{{ $sidebar->icon_name }} fs-4 px-auto" style="width: 28px;"></i>
                        <span>{{ $sidebar->name }}</span>
                    </a>
                    <ul class="collapse {{ Request::segment(2) == strtolower(str_replace(' ', '-', $sidebar->name)) ? 'show' : '' }}"
                        id="{{ 'admin_' . $sidebar->feature_id }}">
                        {{-- sidebar child --}}
                        @foreach ($sidebar->children as $c)
                            <li class="{{ Request::segment(3) == $c->route_prefix_name ? 'active' : '' }}">
                                <a href="{{ route($c->route_name) }}">
                                    {{-- <i class="material-icons ps-4">folder_shared</i> --}}
                                    <i class="{{ $c->icon_name }} fs-4 ps-4" style="width: 48px;"></i>
                                    <span style="font-size: 13px;">{{ $c->name }}</span></a>
                            </li>
                        @endforeach
                        {{-- strtolower(str_replace('-',' ',$sidebar->name)) --}}
                    </ul>
                </li>
            @endforeach
        @endforeach
    </ul>


</nav>
