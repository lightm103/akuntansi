<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesanBus\StorePemesanBusRequest;
use App\Http\Requests\PemesanBus\UpdatePemesanBusRequest;
use App\Models\PemesanBus;
use App\Services\PemesanBus\PemesanBusService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PemesanBusController extends Controller
{
    protected $pemesanBusService;

    public function __construct(PemesanBusService $pemesanBusService)
    {
        $this->pemesanBusService = $pemesanBusService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->pemesanBusService->all();

        return view('pemesanbus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemesanBusRequest $request)
    {
        try {
            $data = $request->validated();
            $this->pemesanBusService->create($data);
            toastr()->success('Pemesanan Bus berhasil ditambahkan!', 'Success');
            return back();
        } catch (Exception $e) {
            Log::error('Pengecualian terjadi: ' . $e->getMessage());
            toastr()->error('Terjadi kesalahan saat menambahkan pemesanan Bus. Silakan coba lagi.', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pemesanBus = $this->pemesanBusService->findOrFail($id);

        return view('pemesanbus.show', compact('pemesanBus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemesanBus $pemesanBus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesanBusRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->pemesanBusService->update($id, $data);
        toastr()->success('Pemesanan Bus berhasil diupdate!', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->pemesanBusService->delete($id);

            toastr()->success('Pemesan Bus Berhasil di Hapus!', 'Dihapus');
            return back();
        } catch (Exception $e) {
            toastr()->error('Pemesan Bus Gagal di Hapus!', 'Dihapus');
            return back();
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getPemesanById($id): JsonResponse
    {
        $pemesanById = PemesanBus::findOrFail($id);
        return response()->json($pemesanById);
    }
}
