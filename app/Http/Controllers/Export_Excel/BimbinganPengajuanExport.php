<?php
namespace App\Http\Controllers\Export_Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\t_bimbingan;

class BimbinganPengajuanExport implements FromQuery
{
    use Exportable;

    public function query(){
        return t_bimbingan::query();
    }
}
