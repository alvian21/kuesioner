<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Kuesioner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $category = new Category;
            $category->name = $request->get('category');
            $category->user_id = Auth()->user()->id;
            $category->save();
            return redirect()->route('category.index');
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
    public function destroy($id, Request $request)
    {
        $cek = Auth::user();



        $arr = [];
        foreach ($cek->categories as $row) {
            foreach ($row->kuesioners as $data) {
                if ($row->id == $data->category_id) {
                    $hasil['id'] = $data->category_id;
                    array_push($arr, $hasil);
                }
            }
        }

        $data = '';
        foreach ($arr as $value) {

            if ($request->get('id') != !empty($value['id'])) {
                $data = $request->get('id');
            } elseif ($request->get('id') == !empty($value['id'])) {
                $data = 'null';
            }elseif(empty($value)){
                $data = $request->get('id');
            }
        }

        $category = Category::find($request->get('id'));

        if ($data == 'null') {
            $success = 0;
            $delete = 'hapus dulu data kuesioner dengan kategori ' . $category->name;
        } else {
            $success = 1;
            $delete = 'data kategori ' . $category->name . ' berhasil dihapus';
            $category->delete();
        }

        $return = array('result' => $success, 'notif' => $delete);
        print_r($return);

    }



    public function cek(Request $request)
    {
        $cek = Auth::user();



        $arr = [];
        foreach ($cek->categories as $row) {
            foreach ($row->kuesioners as $data) {
                if ($row->id == $data->category_id) {
                    $hasil['id'] = $data->category_id;
                    array_push($arr, $hasil);
                }
            }
        }

        foreach ($arr as $value) {
            if ($request->get('id') == $value['id']) {
                echo 'you cant delete this category';
            }
        }
    }
}
