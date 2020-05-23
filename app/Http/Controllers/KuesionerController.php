<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Kuesioner;
use App\User;
use Illuminate\Support\Facades\Validator;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth()->user()->id);
        return view('kuesioner.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =Category::all();
        return view('kuesioner.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pertanyaan'=>'required'
        ]);
        $kuesioner = new Kuesioner;
        $kuesioner->user_id = Auth()->user()->id;
        $kuesioner->category_id=$request->get('kategori_kuesioner');
        $kuesioner->question = $request->get('pertanyaan');
        $kuesioner->save();
        return redirect()->route('kuesioner.index');
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
    public function destroy($id, Request $request)
    {

        if($request->get('delete')){
            $data = Kuesioner::find($request->get('id'));
            $data->delete();
            echo 'berhasil';
        }
    }

    public function editData(Request $request)
    {
        if($request->get('edit')){
            $id = $request->get('id');
            $kuesioner = Kuesioner::find($id);
            return $kuesioner;
        }
    }
}
