<x-app-layout>
    <x-slot name="title">Tambah Kategori</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Tambah Kategori Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Kategori</a></div>
            <div class="breadcrumb-item"><a href="#">Tambah Kategori Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-category action="createCategory" />
    </div>
</x-app-layout>
