<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 14 課題5追記
use App\Profile;

class ProfileController extends Controller
{
    //課題５のActionを追記
    public function add()
    {
        return view('admin.profile.create');
    }
    
    // 以下を追記
    public function create(Request $request)
    {
        
        // 以下を追記
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokunを削除する
        unset($form['_tokun']);
        
        // データベースへ保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    public function edit()
    {
        return view('admin/profile/edit');
    }
}
