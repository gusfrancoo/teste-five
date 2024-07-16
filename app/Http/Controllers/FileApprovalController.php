<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileApprovalController extends Controller
{
    public function index(){
        $files = File::where('status', 1)->get();
        return view('admin.files.index', compact('files'));

    }




    public function approveFiles(Request $request){

        $localFile =  storage_path('app/') . $request->get('path');
        $s3FilePath = $request->get('file_name');

        if(!file_exists($localFile)){
            return response()->json(['code' => 404, 'message' => 'Arquivo não encontrado no servidor'], 404);
        }

        if(!is_readable($localFile)){
            return response()->json(['code' => 404, 'message' => 'Arquivo não é legível'], 404);
        }

        $upload = Storage::disk('s3')->put($s3FilePath, fopen($localFile, 'r+'));

        $file = File::where('id', $request->get('id'))->first();


        if($upload){
            $file->status = 2; //approved
            $file->save();

            return response()->json(['code' => 200, 'message' => 'Arquivo aprovado e enviado para o S3 com sucesso!'], 200);
        } else {

            return response()->json(['code' => 500, 'message' => 'Erro inexperado ao enviar o arquivo para o S3'], 500);
        }

    }

    public function rejectFiles(Request $request){

        $file = File::where('id', $request->get('id'))->first();

        if ($file){
            $file->status = 3; //rejeced
            $file->save();

            return response()->json(['code' => 200, 'message' => 'Arquivo reprovado com sucesso!']);
        } else {

            return response()->json(['code' => 500, 'message' => 'Arquivo não foi encontrado para a reprovação.']);
        }

    }


}
