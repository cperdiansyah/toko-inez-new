<x-app-layout>
    <x-slot name="title">Data Kategori</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Data Kategori') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Kategori</a></div>
            <div class="breadcrumb-item"><a href="#">Data Kategori</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="category" :model="$categories" />
    </div>
</x-app-layout>
