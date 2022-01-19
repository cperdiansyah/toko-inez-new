<?php

namespace App\Traits;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat Pengguna Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'product':
                $product = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.product',
                    "products" => $product,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('product.new'),
                            'create_new_text' => 'Buat Produk Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
