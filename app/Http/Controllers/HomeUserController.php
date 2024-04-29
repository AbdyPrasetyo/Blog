<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{

    public function index(){

        $userId = Auth::id();

        // Mengambil postingan yang dimiliki oleh pengguna saat ini
        $posts = Post::where('user_id', $userId)->get();

        return view('user.home', compact('posts'));
 }
}
