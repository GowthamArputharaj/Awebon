<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class AwebonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associates = [];

        $members = DB::table("awebons")
        ->get()
        ->map(function($data) use(&$associates) {
            $cnt = count($associates);
            $associates[$data->role_id ?? 0][$cnt] = $data;
            return $data;
        });

        return view("home")->with([
            'members' => $members,
            'associates' => $associates,
        ]);
    }

}
