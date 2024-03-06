<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {
        // $idea = new ideas([
        //     'content' => request()->get('idea', '')
        // ]);

        // $idea->save();

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea = ideas::create([
            'content' => request()->get('content', '')
        ]);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(ideas $idea) {
        // return view('ideas.show', [
        //     'idea' => $idea
        // ]);


        return view('ideas.show', compact('idea'));
    }

    public function edit(ideas $idea) {
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }
    
    public function update(ideas $idea) {

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea Updated successfully!');
    }

    public function destroy(ideas $id) {


        // $idea = ideas::where('id', $id)->first();
        // $idea = ideas::where('id', $id)->firstOrFail();

        // $idea->delete();

        $id->delete();
        
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }


}
