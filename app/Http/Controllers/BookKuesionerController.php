<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookKuesionerController extends Controller
{
   public function index()
   {
    return view('book.kuesioner');
   }
}
