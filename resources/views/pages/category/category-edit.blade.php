<x-app-layout>
    <x-slot name="title">Edit Kategori</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Edit Kategori') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('category') }}">Kategori</a></div>
            <div class="breadcrumb-item"><a href="#">Edit Kategori</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="updateUser" :userId="request()->userId" />
    </div>
</x-app-layout>
