<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    private $mahasiswas;

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
        $this->mahasiswas = Mahasiswa::all();
        $mahasiswaResource = MahasiswaResource::collection($this->mahasiswas);
        
        return $this->sendResponse(
            $mahasiswaResource,
            'Successfully Get Mahasiswa',
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'NIM' => 'required|unique:mahasiswas',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'angkatan' => 'required',
            'semester' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->sendError(
                'Upload Data Fail',
                $validator->messages(),
                422
            );
        }

        $mahasiswa = Mahasiswa::create([
            'nama' => request('nama'),
            'NIM' => request('NIM'),
            'email' => request('email'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'angkatan' => request('angkatan'),
            'semester' => request('semester'),
            'fakultas_id' => request('fakultas_id'),
            'prodi_id' => request('prodi_id'),
        ]);

        if ($mahasiswa) {
            return $this->sendResponse(
                new MahasiswaResource($mahasiswa),
                'Upload Data Successfully',
                200
            );
        } else {
            return $this->sendError(
                'Upload Data Fail',
                $mahasiswa->fails(),
                400
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function showByNIM(Request $request, $NIM)
    {
        $mahasiswa = Mahasiswa::where('NIM', '=', $NIM);
        if ($mahasiswa->count() != 0 && Mahasiswa::all()->count() != 0) {
            return $this->sendResponse(
                MahasiswaResource::collection($mahasiswa->get()),
                'Get Detail Mahasiswa Successfully',
                200
            );
        } else {
            return $this->sendError(
                'Get Detail Mahasiswa Fail',
                ['Data mahasiswa is not found'],
                400
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function updateByNIM(Request $request, $NIM)
    {
        $mahasiswa = Mahasiswa::where('NIM', '=', $NIM);
        if ($mahasiswa->count() != 0 && Mahasiswa::all()->count() != 0) {
            $validator = Validator::make(request()->all(), [
                'nama' => 'required',
                'NIM' => 'required',
                'email' => 'required|email',
                'jenis_kelamin' => 'required',
                'angkatan' => 'required',
                'semester' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError(
                    'Upload Data Fail',
                    $validator->messages(),
                    422
                );
            }
            $mahasiswa->update($request->all());
            return $this->sendResponse(
                MahasiswaResource::collection($mahasiswa->get()),
                'Update Data Mahasiswa Successfully',
                200
            );
        } else {
            return $this->sendError(
                'Update Data Mahasiswa Fail',
                ['Data mahasiswa is not found'],
                400
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroyByNIM(Request $request, $NIM)
    {
        $mahasiswa = Mahasiswa::where('NIM', '=', $NIM);
        if ($mahasiswa->count() != 0 && Mahasiswa::all()->count() != 0) {
            $mahasiswa->delete();
            return $this->sendResponse(
                [],
                'Delete Mahasiswa Successfully',
                200
            );
        } else {
            return $this->sendError(
                'Delete Mahasiswa Fail',
                ['Data mahasiswa is not found'],
                400
            );
        }
    }
}
