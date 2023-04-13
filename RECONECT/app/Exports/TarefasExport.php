<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;

class TarefasExport implements FromQuery
{
    use Exportable;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function query()
    {
        return User::whereDate('birth', $this->data);
    }
}
