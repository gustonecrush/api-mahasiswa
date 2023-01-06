<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramStudiResource;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramStudiController extends Controller
{
    private $prodis;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->prodis = ProgramStudi::all();
        $prodisResource = ProgramStudiResource::collection($this->prodis);

        return $this->sendResponse(
            $prodisResource,
            'Successfully Get Program Studi',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "program_studi"          => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Upload Data Fail', $validator->messages(), 422);
        }

        $prodi = ProgramStudi::create([
            "program_studi"          => request('program_studi'),
        ]);

        if ($prodi) {
            return $this->sendResponse(new ProgramStudiResource($prodi), "Upload Data Successfully", 200);
        } else {
            return $this->sendError("Upload Data Fail", $prodi->fails(), 400);
        }
    }
}
