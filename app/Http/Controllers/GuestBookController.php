<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;
use App\Result;

class GuestBookController extends Controller
{
    public function index()
    {

        $guest = GuestBook::all();
        $arr = [];
        foreach($guest as $key => $value){
            $data = Result::where('GuestBook_id',$value->id)->first();
            if($data){
                $x['id'] = $data->GuestBook_id;
                array_push($arr,$x);
            }
        }

        $res=[];
        foreach($arr as $row){
            $guest = GuestBook::find($row['id']);
            $y['name'] = $guest->name;
            $y['gender'] = $guest->gender;
            $y['age'] = $guest->age;
            $y['job'] = $guest->job;
            $y['telephone'] = $guest->telephone;
            array_push($res, $y);
        }

        return view('guestbook.index',['res'=>$res]);
    }
}
