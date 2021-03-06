<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;
use App\Kuesioner;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new GuestBook();
        $data->name = $request->get('nama');
        $data->gender = $request->get('jenis_kelamin');
        $data->age = $request->get('umur');
        $data->job = $request->get('pekerjaan');
        $data->telephone = $request->get('nohp');
        $guest = GuestBook::where('telephone',$request->get('nohp'))->first();
        $data->save();
        if($guest){
            $arr = array('result'=>'1');
        }else{
            $arr = array('result'=>'0');
        }

        return $arr;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function kuesioner()
    // {
    //     $data= $this->store()
    // }

    public function getBr()
    {
        $data = bcrypt("Hello@089");
        dd($data);
    }
}
