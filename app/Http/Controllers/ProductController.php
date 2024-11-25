<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function getData()
    {
        $data = Product::with(['category', 'brand'])->get();

        return response()->json([
            'message' => 'Lấy data sản phẩm thành công',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        $check = Product::where('name', $request->name)->first();

        if ($check) {
            return response()->json([
                'message' => 'Sản phẩm đã tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'id_category' => $request->id_category,
            'id_brand' => $request->id_brand,
            'gender' => $request->gender,
        ]);

        return response()->json([
            'message' => 'Tạo sản phẩm thành công',
            'data' => $product,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return response()->json([
                'message' => 'Không có sản phẩm này',
                'data' => $product,
            ], Response::HTTP_BAD_REQUEST);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công',
            'data' => $product,
        ], Response::HTTP_OK);
    }

    public function deleteData($id)
    {
        $check = Product::find($id);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá sản phẩm thành công',
                'id' => $id,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Sản phẩm không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}