<?php

namespace App\Http\Controllers;

use App\Guest_group;

use Illuminate\Http\Request;

class GuestGroupController extends Controller
{
    public function index()
    {
        $data = Guest_group::paginate(10);

        return view('guest_group.index', compact('data'));
    }

    public function store()
    {
        if(request('id')){
            $data = Guest_group::find(request('id'));
        }else{
            $data = new Guest_group;
        }

        $data->name = request('name');
        $data->save();
    }

    public function destroy()
    {
        $data = Guest_group::destroy(request('id'));
    }
}
