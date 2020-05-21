<?php

namespace App\Http\Controllers;
use App\Kuesioner;
use Illuminate\Http\Request;

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

       return response()->json(['data'=>$data]);
   }

   public function postData(Request $request)
   {

        foreach($request->all() as $row){
          foreach($row as $col){
             
          }
        }
   }
}
