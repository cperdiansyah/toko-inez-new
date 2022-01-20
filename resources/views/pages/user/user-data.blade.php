<x-app-layout>
    <x-slot name="title">Data Pengguna</x-slot>

    <x-slot name="header_content">
        <h1>{{ __('Data Pengguna') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pengguna</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Data Pengguna</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user" :model="$user" />
    </div>
</x-app-layout>
