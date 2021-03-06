<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\History;
use Carbon\Carbon;
use Storage; //追加

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        // news\index.blade.php ファイルを渡している
        // また view テンプレートに headline、 post、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
