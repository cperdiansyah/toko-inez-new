@php
$links = [
    [
        'href' => 'dashboard',
        'text_group' => 'Dashboard',
        'is_multi' => false,
    ],
    [
        'href' => [
            [
                'section_text' => 'Pengguna',
                'section_list' => [['href' => 'user', 'text' => 'Data Pengguna'], ['href' => 'user.new', 'text' => 'Tambah Pengguna']],
                'icon' => 'group',
            ],
        ],
        'text_group' => 'Pengguna',
        'is_multi' => true,
    ],
    [
        'href' => [
            [
                'section_text' => 'Kategori',
                'section_list' => [['href' => 'category', 'text' => 'Data Kategori'], ['href' => 'category.new', 'text' => 'Tambah Kategori Baru']],
                'icon' => 'category',
            ],
        ],
        'text_group' => 'Produk',
        'is_multi' => true,
    ],
    [
        'href' => [
            [
                'section_text' => 'Produk',
                'section_list' => [['href' => 'product', 'text' => 'Data Produk'], ['href' => 'product.new', 'text' => 'Tambah Produk Baru']],
                'icon' => 'inventory_2',
            ],
        ],
        'text_group' => 'Produk',
        'is_multi' => true,
        'is_group' => true,
    ],
    [
        'href' => [
            [
                'section_text' => 'Transaksi',
                'section_list' => [['href' => 'category', 'text' => 'Data Kategori'], ['href' => 'category.new', 'text' => 'Tambah Kategori Baru']],
                'icon' => 'point_of_sale',
            ],
        ],
        'text_group' => 'Transaksi',
        'is_multi' => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" src="{{ asset('/images/content/logo-inez.png') }}" alt="logo-toko-inez"
                    style="width: 39px;height: auto;object-fit: cover;">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">

                @if (!$link->is_multi)
                    <li class="menu-header">{{ $link->text_group }}</li>
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}">
                            <i class="fas fa-fire"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    </li>
                @else
                    @if (!isset($link->is_group))
                        <li class="menu-header">{{ $link->text_group }}

                        </li>
                    @endif
                    @foreach ($link->href as $section)
                        @php
                            $routes = collect($section->section_list)
                                ->map(function ($child) {
                                    return Request::routeIs($child->href);
                                })
                                ->toArray();
                            $is_active = in_array(true, $routes);
                        @endphp

                        <li class="dropdown {{ $is_active ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="material-icons-outlined">
                                    {{ isset($section->icon) ? $section->icon : 'landscape' }}
                                </i>
                                <span>{{ $section->section_text }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route($child->href) }}">
                                            {{ $child->text }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
