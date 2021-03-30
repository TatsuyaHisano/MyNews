<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //課題５のActionを追記
    public function add()
    {
        return view('admin.profile.creste');
    }
    
    public function create()
    {
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
        return view('admin.prfile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
