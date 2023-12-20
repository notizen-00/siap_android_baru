<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Karyawan;
use App\Models\LokasiPenugasan;
use App\Models\LokasiKehadiran;
use Inertia\Inertia;
use Validator;
use App\Http\Resources\KaryawanResource;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;
   
class KaryawanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {

        $karyawan = Karyawan::with('divisi')->with('user')->get();
        return $this->sendResponse($karyawan, 'Karyawan retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $product = Product::create($input);
        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    } 

    public function getLokasiPenugasan()
    {
        $id =  auth()->user()->id;
        $data = LokasiPenugasan::with('lokasi')->where('users_id',$id)->get();
        return $this->sendResponse($data,'Data Lokasi Penugasan Sukses');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $karyawan = Karyawan::with('divisi')->with('user')->where('users_id',$id)->first();
    
        if (is_null($karyawan)) {
            return $this->sendError('Karyawan not found.');
        }
        return $this->sendResponse($karyawan, 'karyawan telah di show secara sukses');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();
        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return $this->sendResponse([], 'Product deleted successfully.');
    }
}