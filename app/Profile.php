<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    // 14 課題5 以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
     // 17 編集履歴を実装しよう 以下を追記
    // Profile Modelに関連付けを行う
    public function profilehistories()
    {
        return $this->hasMany('App\Profilehistory');
        
    }
}