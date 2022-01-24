<x-app-layout>
    <x-slot name="title">Data Produk</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Data Produk') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('product') }}">Produk</a></div>
            <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="product" :model="$product" />
    </div>
</x-app-layout>
