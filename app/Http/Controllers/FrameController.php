<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FrameController extends Controller
{
    public function index()
    {
        $frames = Frame::all();
        return view('admin.frames.index', compact('frames'));
    }

    public function create()
    {
        return view('admin.frames.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'rasio' => 'nullable|string|max:50',
            'qty_photo' => 'required|integer|min:1',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('frames'), $imageName);
            $data['image'] = $imageName;
        }

        Frame::create($data);

        return redirect()->route('admin.frames.index')->with('success', 'Frame created successfully.');
    }

    public function edit(Frame $frame)
    {
        return view('admin.frames.edit', compact('frame'));
    }

    public function update(Request $request, Frame $frame)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'rasio' => 'nullable|string|max:50',
            'qty_photo' => 'required|integer|min:1',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path('frames/' . $frame->image))) {
                File::delete(public_path('frames/' . $frame->image));
            }

            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('frames'), $imageName);
            $data['image'] = $imageName;
        }

        $frame->update($data);

        return redirect()->route('admin.frames.index')->with('success', 'Frame updated successfully.');
    }

    public function destroy(Frame $frame)
    {
        if (File::exists(public_path('frames/' . $frame->image))) {
            File::delete(public_path('frames/' . $frame->image));
        }
        
        $frame->delete();

        return redirect()->route('admin.frames.index')->with('success', 'Frame deleted successfully.');
    }
}
