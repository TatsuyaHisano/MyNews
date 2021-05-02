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
    
    // 16 課題追記
    public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_name)->get();
      } else {
          // それ以外は全てのニュースを取得する
          $posts = profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
  
  // 以下を追加
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $profile = profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }
  
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
      return redirect('admin/profile');
  }
  
  // 以下を追加
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }
}

