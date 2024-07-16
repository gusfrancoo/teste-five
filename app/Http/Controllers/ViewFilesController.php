<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class ViewFilesController extends Controller
{
    public function index(){
        $files = File::all();

        return view('view-files', compact('files'));
    }


    public function filteredData(Request $request){

        try{
            $files = File::query()
                        ->when($request->get('file_name'), function ($query, $fileName){
                            $query->where('file_name', 'like', "%{$fileName}%");
                        })
                        ->when($request->get('status'), function ($query, $status){
                            $query->where('status', $status);
                        })
                    ->get();


            return $files;

        } catch (\Exception $e){
            return response()->json(['message' => 'Não foi possível realizar a filtragem na consulta'], 500);
        }





    }
}
