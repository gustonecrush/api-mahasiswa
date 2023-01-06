<?php

namespace App\Http\Controllers;

use App\Http\Resources\FakultasResource;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FakultasController extends Controller
{
    private $fakultas;

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
        $this->fakultas = Fakultas::all();
        $prodisResource = FakultasResource::collection($this->fakultas);

        return $this->sendResponse(
            $prodisResource,
            'Successfully Get Fakultas',
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
            'fakultas' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(
                'Upload Data Fail',
                $validator->messages(),
                422
            );
        }

        $fakultas = Fakultas::create([
            'fakultas' => request('fakultas'),
        ]);

        if ($fakultas) {
            return $this->sendResponse(
                new FakultasResource($fakultas),
                'Upload Data Successfully',
                200
            );
        } else {
            return $this->sendError('Upload Data Fail', $fakultas->fails(), 400);
        }
    }
}
