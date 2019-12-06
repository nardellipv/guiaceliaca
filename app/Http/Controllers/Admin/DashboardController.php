<?php

namespace guiaceliaca\Http\Controllers\Admin;

use guiaceliaca\Blog;
use guiaceliaca\Commerce;
use guiaceliaca\Message;
use guiaceliaca\User;
use Illuminate\Http\Request;
use guiaceliaca\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        //cantidad
        $countUsers = User::count();
        $countCommerces = Commerce::count();
        $countMessage = Message::count();
        $countPost = Blog::count();

        return view('admin.dashboard', compact('users', 'countCommerces','countMessage','countPost','countUsers'));
    }
}
