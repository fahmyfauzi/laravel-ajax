<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            //cek query tidak kosong
            if ($query != '') {
                //cari di tabel customers di kolom name atau di address
                $data = DB::table('customers')
                    ->where('name', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->get();
            }
            //jika ada
            else {
                $data = DB::table('customers')
                    ->orderBy('id', 'desc')
                    ->get();
            }

            //tampilkan data yang ada
            $total_row = $data->count();

            //jika data lebih dari 0 atau ada
            if ($total_row > 0) {

                foreach ($data as $row) {
                    $output .= '
                         <tr>
                            <td>' . $row->name . '</td>
                            <td>' . $row->address . '</td>
                            <td>' . $row->city . '</td>
                            <td>' . $row->postal_code . '</td>
                            <td>' . $row->country . '</td>
                        </tr>
                    ';
                }
            } else {
                // jika data kosong
                $output = '
                    <tr>
                        <td class="center" colspan="5">No Data Found</td>
                    </tr>
                ';
            }

            //return 
            return response()->json([
                'table_data' => $output,
                'total_data' => $total_row
            ]);
        }
    }
}
