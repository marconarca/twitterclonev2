<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $ideas = ideas::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }


        $users = [
            [
                'name' => 'Alex',
                'age'  => 16
            ],
            [
                'name' => 'Marco',
                'age'  => 20
            ],
            [
                'name' => 'John',
                'age'  => 17
            ],
        ];

    
        return view('dashboard', [
            // 'ideas' => Ideas::orderBy('created_at', 'DESC')->get()
            'ideas' => $ideas->paginate(5)
        ]);
    }


}
