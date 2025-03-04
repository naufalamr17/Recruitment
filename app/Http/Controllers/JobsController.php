<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('content.jobs', compact('jobs'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'position' => 'required|string|max:255',
            'requirement' => 'required|string',
            'start_recruitment' => 'required|date',
            'end_recruitment' => 'required|date',
            'people_needed' => 'required|integer',
            'contact' => 'required|string|max:255',
            'status' => 'required|in:open,hold,closed',
        ]);

        Job::create($request->all());

        return redirect()->back()->with('success', 'Job created successfully.');
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'position' => 'required|string|max:255',
            'requirement' => 'required|string',
            'start_recruitment' => 'required|date',
            'end_recruitment' => 'required|date',
            'people_needed' => 'required|integer',
            'contact' => 'required|string|max:255',
            'status' => 'required|in:open,hold,closed',
        ]);

        $job->update($request->all());

        return redirect()->back()->with('success', 'Job updated successfully.');
    }
}
