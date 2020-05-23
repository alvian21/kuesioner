<?php

namespace App\Http\Controllers;

use App\Kuesioner;
use Illuminate\Http\Request;
use App\Result;
use App\GuestBook;
use Dotenv\Result\Result as ResultResult;
use Illuminate\Support\Facades\DB;

class BookKuesionerController extends Controller
{
    public function index()
    {
        $data = Kuesioner::all();
        return view('book.kuesioner',['data'=>$data]);
    }

    public function getData()
    {
        $data = Kuesioner::select('id')->get();

        return response()->json(['data' => $data]);
    }

    public function postData(Request $request)
    {

        $array = [];
        $data = DB::table('guest_books')->latest()->first();
        foreach ($request->all() as $key => $value) {
            foreach ($value as $col) {
                $x['data_id'] = $col['dataid'];
                $x['kuesioner_id'] = $col['kuesionerid'];
                $x['GuestBook_id'] = $data->id;

                array_push($array, $x);
            }
        }

        // return $array;
        foreach ($array as $hasil) {
            $data = array(
                'data_id' => $hasil['data_id'],
                'kuesioner_id' => $hasil['kuesioner_id'],
                'GuestBook_id' => $hasil['GuestBook_id']
            );
           Result::insert($data);


        }

        return array('result'=>'1');
    }

    public function hitung()
    {
        $result = Result::groupBy('kuesioner_id')->selectRaw('sum(data_id) as sum ,kuesioner_id')->pluck('sum', 'kuesioner_id');

        $result = array($result);

        $arr = [];
        $a = Result::select('kuesioner_id')->groupBy('kuesioner_id')->get();
        $b = Result::select('GuestBook_id')->groupBy('GuestBook_id')->count();

        foreach ($a as $key => $value) {
            $x['hasil'] = $result[0][$value->kuesioner_id] / $b;
            $x['kuesioner_id'] = $value->kuesioner_id;
            array_push($arr, $x);
        }



    }

    public function test()
    {
        $data = DB::table('guest_books')->latest()->first();
        dd($data->id);
    }
}
