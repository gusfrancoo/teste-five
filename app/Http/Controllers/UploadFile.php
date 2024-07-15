<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadFile extends Controller
{
    public function upload(Request $request){
        try{
            $request->validate([
                'file' => 'required|file'
            ]);

            $path = $request->file('file')->store('uploads');

            $file = new File();
            $file->path = $path;
            $file->user_id = auth()->id();
            $file->status = 1; //1- Pending
            $file->save();
            return response()->json(['message' => 'Arquivo salvo com sucesso!'], 200);

        } catch (\Exception $e){
            return response()->json(['message' => 'Ocorreu um erro ao salvar o arquivo.'],
                                    500);
        }

    }
}
