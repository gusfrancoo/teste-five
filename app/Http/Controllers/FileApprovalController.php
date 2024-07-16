<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileApprovalController extends Controller
{
    public function index(){
        $files = File::where('status', 1)->get();
        return view('admin.files.index', compact('files'));

    }
}
