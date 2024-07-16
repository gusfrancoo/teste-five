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
            $file = $request->file('file');

            File::create([
                'path' => $path,
                'file_name' => $file->getClientOriginalName(),
                'type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'status' => 1,
                'user_id' => auth()->id()
            ]);

            return response()->json(['message' => 'Arquivo salvo com sucesso!'], 200);

        } catch (\Exception $e){
            dd($e);
            return response()->json(['message' => 'Ocorreu um erro ao salvar o arquivo.'],
                                    500);
        }

    }
}
