<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GebruikerController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users',['users'=>$users, 'layout'=>'index']);
    }

    public function edit($id)
    {
        $users = DB::table('users')->get();
        $data = DB::table('users')
            ->where('id', $id)
            ->get();

        return view('users',['users'=>$users,'data' => $data, 'layout'=>'edit']);
    }
}
