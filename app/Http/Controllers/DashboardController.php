<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kuesioner;
use App\Result;
use App\Count;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $result = Result::groupBy('kuesioner_id')->selectRaw('sum(data_id) as sum ,kuesioner_id')->pluck('sum', 'kuesioner_id');

        $result = array($result);

        $arr = [];
        $a = Result::select('kuesioner_id')->groupBy('kuesioner_id')->get();
        $b = Result::select('GuestBook_id')->groupBy('GuestBook_id')->count();

        foreach ($a as $key => $value) {
            $x['hasil'] = (($result[0][$value->kuesioner_id] * 100) / 4) / $b;
            $x['kuesioner_id'] = $value->kuesioner_id;
            array_push($arr, $x);
        }

        foreach ($arr as $key => $value) {
                $data =array('result'=>$value['hasil'],'kuesioner_id'=>$value['kuesioner_id']);

                $count = Count::select('kuesioner_id')->where('kuesioner_id',$value['kuesioner_id'])->count();

               if($count == 0){
                   Count::insert($data);
               }else{
                  $count = Count::where('kuesioner_id',$value['kuesioner_id'])->first();
                  $count->result = $value['hasil'];
                  $count->save();
               }

        }

        $kuesioner = Kuesioner::all();
        $count = Count::all();

        return view('dashboard.index', ['kuesioner' => $kuesioner,'count'=>$count]);
    }


    public function fetch()
    {
        $count = Count::all();

        return response()->json(['count'=>$count]);
    }
}
