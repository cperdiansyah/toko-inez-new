<x-app-layout>
    <x-slot name="title">Tambah Produk</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Tambah Produk Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('product') }}">Produk</a></div>
            <div class="breadcrumb-item"><a href="#">Tambah Produk Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-product action="createProduct" />
    </div>
</x-app-layout>
