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

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $validated['user_id'] = auth()->id();
        

        // Get all the request
        // dump(request()->all());
        // dd($validated);


        ideas::create($validated);


        // $idea = ideas::create([
        //     'content' => request()->get('content', '')
        // ]);

        // mass assignable that's why you use fillable or guardable
        // $idea = ideas::create([
        //     request()->all()
        // ]);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(ideas $idea) {
        // return view('ideas.show', [
        //     'idea' => $idea
        // ]);

        // dd($idea->comments);

        return view('ideas.show', compact('idea'));
    }

    public function edit(ideas $idea) {

        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }
    
    public function update(ideas $idea) {

        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->update($validated);

        // $idea->content = request()->get('content', '');

        // $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea Updated successfully!');
    }

    public function destroy(ideas $id) {

        if (auth()->id() !== $id->user_id) {
            abort(404);
        }
        // $idea = ideas::where('id', $id)->first();
        // $idea = ideas::where('id', $id)->firstOrFail();

        // $idea->delete();

        $id->delete();
        
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }


}
