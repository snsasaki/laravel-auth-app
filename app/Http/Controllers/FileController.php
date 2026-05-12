<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function index(): View
    {
        $files = Storage::disk('public')->files('uploads');

        return view('files.index', compact('files'));
    }
    public function download(string $filename): StreamedResponse
    {
        $path = 'uploads/' . $filename;

        if (! Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->download($path);
    }
}
