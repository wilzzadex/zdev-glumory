<?php

namespace App\Exports;
use App\Models\Barang;
use App\Models\Barang_masuk;
use App\Models\Barang_keluar;
use App\Models\History_barang_masuk;
use App\Models\History_barang_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// class OnHandExport implements  WithMapping,WithEvents,WithHeadings
// {
//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class    => function(AfterSheet $event) {
//                 $cellRange = 'A1:W1'; // All headers
//                 $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
               
//             },
//         ];
//     }
//     public function map($barang): array
//     {
//         return [
//             $barang->id,
//         ];
//     }

//     public function headings(): array
//     {
//         return [
//            //  'No',
//             'User',
//             'Country Role',
//             'Action',
//             'Menu',
//             'Description',
//             'Date',
//        ];
//    }
    
   
// }
class OnHandExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping, WithStyles
{
    use Exportable;

   
     // varible form and to 
     public function __construct(String $filter = null,String $filter_prev = null)
     {
         $this->filter = $filter;
         $this->filter_prev = $filter_prev;
     }
     
     //function select data from database 
     public function collection()
     {
        $onhand = [];
        $barang = Barang::orderBy('kode_barang','ASC')->get();
        foreach($barang as $barang){
            $in = Barang_masuk::where('kode_barang',$barang->kode_barang)->where('tanggal','like','%' . $this->filter_prev . '%')->sum('kg_in');
            $out = Barang_keluar::where('kode_barang',$barang->kode_barang)->where('tanggal','like','%' . $this->filter_prev . '%')->sum('kg_in');
            $start_in = $in - $out;
            $in_now = Barang_masuk::where('kode_barang',$barang->kode_barang)->where('tanggal','like','%' . $this->filter . '%')->sum('kg_in');
            $out_now = Barang_keluar::where('kode_barang',$barang->kode_barang)->where('tanggal','like','%' . $this->filter . '%')->sum('kg_in');
            $ending_kg = $start_in + ($in_now-$out_now);
            $ending_rol = ($start_in + ($in_now-$out_now))/25;
            if($ending_rol < $barang->reorder){
                $status = 'Restock';
            }else{
                $status = 'Available';
            }

            $row = [];
            $row['kode_barang'] = $barang->kode_barang;
            $row['nama_barang'] = $barang->nama_barang;
            $row['start_in'] = $start_in == '' ? '-' : $start_in;
            $row['in_kg'] = $in  == '' ? '-' : $in;
            $row['out_kg'] = $out  == '' ? '-' : $out;
            $row['ending_kg'] = $ending_kg  == '' ? '-' : $ending_kg;
            $row['ending_rol'] = ceil($ending_rol  == '' ? '-' : $ending_rol);
            $row['status'] = $status;
            $onhand[] = $row;
        }

         return collect( $onhand );
     }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
               
            },
        ];
    }

    public function map($onhand): array
    {
        return [
            $onhand['kode_barang'],
            $onhand['nama_barang'],
            $onhand['start_in'],
            $onhand['in_kg'],
            $onhand['out_kg'],
            $onhand['ending_kg'],
            $onhand['ending_rol'],
            $onhand['status'],
            // $log->nama_barang,
           
        ];
    }

     //function header in excel
     public function headings(): array
     {
         return [
            //  'No',
             'Kode Barang',
             'Nama Barang',
             'Starting Inventory',
             'In',
             'Out',
             'Ending Inventory (Kg)',
             'Ending Inventory (Rolls)',
             'Status',
            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('G1')->getFont()->setBold(true);
        $sheet->getStyle('H1')->getFont()->setBold(true);
        // $sheet->setAllBorders('thin');
    }
}
