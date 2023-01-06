<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    private $kelas;

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
        $this->kelas = Kelas::all();
        $prodisResource = KelasResource::collection($this->kelas);

        return $this->sendResponse(
            $prodisResource,
            'Successfully Get Kelas',
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
            "kelas"          => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Upload Data Fail', $validator->messages(), 422);
        }

        $kelas = Kelas::create([
            "kelas"          => request('kelas'),
        ]);

        if ($kelas) {
            return $this->sendResponse(new KelasResource($kelas), "Upload Data Successfully", 200);
        } else {
            return $this->sendError("Upload Data Fail", $kelas->fails(), 400);
        }
    }
}
