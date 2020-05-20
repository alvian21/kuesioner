<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;

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
        if($data->save()){
            return redirect('data/kuesioner/$2y$10$mF21t9grIyuvHnSI1sfob.mCn4imbZerVcbweTyHgiYTnBE9VPXEa');
        }

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
