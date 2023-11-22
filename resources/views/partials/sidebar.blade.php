<div class="body-overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('img/logo.png') }}" class="img-fluid w-100 px-3" /></h3>
    </div>
    <ul class="list-unstyled components">


        <?php
        $role = App\Models\Role::find(auth()->user()->role->role_id);
        ?>
        @foreach ($role->parent as $parent)
            <li class="dropdown"><!-- MANAJEMEN USER -->
                <a class="dropdown-toggle" {{ $parent->route_name == null ? 'data-bs-toggle=collapse' : '' }}
                    href="{{ $parent->route_name !== null ? route($parent->route_name) : '#admin_' . $parent->feature_id }}"
                    role="button" aria-expanded="false" aria-controls="{{ 'admin_' }}">
                    <i class="{{ $parent->icon_name }} fs-4 px-auto" style="width: 28px;"></i>
                    <span>{{ $parent->name }}</span>
                </a>
                <ul class="collapse {{ Request::segment(2) == strtolower(str_replace(' ', '-', $parent->name)) ? 'show' : '' }}"
                    id="{{ 'admin_' . $parent->feature_id }}">
                    @foreach ($role->child as $child)
                        @if ($child->parent_id == $parent->feature_id)
                            <li class="{{ Request::segment(3) == $child->route_prefix_name ? 'active' : '' }}">
                                <a href="{{ route($child->route_name) }}"><i class="{{ $child->icon_name }} fs-4 ps-4"
                                        style="width: 48px;"></i>
                                    <span style="font-size: 13px;">{{ $child->name }}</span></a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>


</nav>
