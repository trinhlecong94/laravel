<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use App\Enums\OrderStatus as EnumOrderSatus;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function __construct()
    {
    }

    public function collection()
    {
        $orders = Order::all();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => Shipping::find($row->shipping_id)->full_name,
                '2' => Shipping::find($row->shipping_id)->address,
                '3' => Shipping::find($row->shipping_id)->email,
                '4' => Shipping::find($row->shipping_id)->phone,
                '5' => $row->prices,
                '6' => $row->date,
                '7' => EnumOrderSatus::getKey($row->status),
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'id',
            'full_name',
            'address',
            'email',
            'phone',
            'prices',
            'date',
            'status',
        ];
    }

    public function export(Request $request)
    {
        return Excel::download(new ExportController(), 'orders.xlsx');
    }
}
