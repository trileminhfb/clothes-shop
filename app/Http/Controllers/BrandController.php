<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function getData()
    {
        $data = Brand::get();

        return response()->json([
            'message' => 'lấy data thương hiệu thành công',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        $check = Brand::where('nameBrand', $request->nameBrand)->first();

        if ($check) {
            return response()->json([
                'message' => 'Thương hiệu đã tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }

        $brand = Brand::create([
            'nameBrand' => $request->nameBrand,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Tạo thương hiệu thành công',
            'data' => $brand,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {
        $brand = Brand::find($request->id);

        if (!$brand) {
            return response()->json([
                'message' => 'Không có thương hiệu này',
                'data' => $brand,
            ], Response::HTTP_BAD_REQUEST);
        }
        $brand->update($request->all());

        return response()->json([
            'message' => 'Cập nhật thương hiệu thành công',
            'data' => $brand,
        ], Response::HTTP_OK);
    }

    public function deleteData($id)
    {
        $check = Brand::find($id);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá thương hiệu thành công',
                'id' => $id,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Thương hiệu không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}
