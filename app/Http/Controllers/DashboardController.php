<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        
        // Make sure that when we use eager loading with must make sure the table or model have a relationship and also if there are some pages that uses only the ideas query or ideas data without displaying the user and comments then we must be careful this can be achieved using without below

        // $ideas = ideas::without('user')->orderBy('created_at', 'DESC');

        
        $ideas = ideas::orderBy('created_at', 'DESC');


        // Eager Loading
        

        // direct relationship
        // $ideas = ideas::with('user', 'comments')->orderBy('created_at', 'DESC');


        // sub relationship
        // $ideas = ideas::with('user', 'comments.user')->orderBy('created_at', 'DESC');




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
