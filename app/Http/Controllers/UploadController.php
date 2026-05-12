<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UploadController extends Controller
{
    public function create(): View
    {
        return view('upload');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        $path = $request->file('file')->store('uploads');

        return redirect()
            ->route('upload.create')
            ->with('success', 'ファイルを保存しました。保存先: ' . $path);
    }
}
