<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserSchoolarship;
use Auth;

class UserSchoolarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function updateStatus(Request $request)
    {
        $requests = $request->all();
        $user = User::where('remember_token', $requests['token'])->first();
        if($user)
        {
            $us = UserSchoolarship::where('user_id', $user->id)->where('schoolarship_id', $requests['id'])->first();
            if($us)
            {
                $us->update([
                        'change' => $requests['status']
                    ]);
            }
            else{
                UserSchoolarship::create([
                    'user_id' => $user->id,
                    'schoolarship_id' => $requests['id'],
                    'status' => 0,
                    'change' => $requests['status'],
                ]);
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => false]);
    }

    public function save()
    {
        $uss = UserSchoolarship::where('change', '!=', 0)
                ->where('user_id', Auth::user()->id)->get();

        foreach( $uss as $us)
        {
            if($us->change != 0)
            {
                $us->update([
                    'status' => $us->change,
                    'change' => 0
                ]);
            }
        }

        return redirect()->route('index');
    }
}