<?php

namespace App\Http\Controllers;

use App\Kuesioner;
use Illuminate\Http\Request;
use App\Result;

class BookKuesionerController extends Controller
{
    public function index()
    {
        $data = Kuesioner::all();
        // return view('book.kuesioner',['data'=>$data]);
    }

    public function getData()
    {
        $data = Kuesioner::select('id')->get();

        return response()->json(['data' => $data]);
    }

    public function postData(Request $request)
    {

        $array = [];
        foreach ($request->all() as $key => $value) {
            foreach ($value as $col) {
                $x['data_id'] = $col['dataid'];
                $x['kuesioner_id'] = $col['kuesionerid'];
                $x['GuestBook_id'] = $col['guestid'];

                array_push($array, $x);
            }
        }
        foreach ($array as $hasil) {
            $data = array(
                'data_id' => $hasil['data_id'],
                'kuesioner_id' => $hasil['kuesioner_id'],
                'GuestBook_id' => $hasil['GuestBook_id']
            );
            Result::insert($data);
        }
    }
}
