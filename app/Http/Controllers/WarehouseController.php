<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WarehouseController extends Controller
{

    public function getData()
    {
        $warehouse = WareHouse::get();

        return response()->json([
            'message' => 'lấy data sản phẩm thành công',
            'data' => $warehouse,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        $warehouse = WareHouse::where('id_product', $request->id_product)->first();

        if ($warehouse) {
            $warehouse->quantity += $request->quantity;
            $warehouse->save();

            return response()->json([
                'message' => 'Cập nhật số lượng sản phẩm thành công',
                'data' => $warehouse,
            ], Response::HTTP_OK);
        }

        $newWarehouse = WareHouse::create([
            'id_product' => $request->id_product,
            'quantity'   => $request->quantity,
            'status'     => $request->status,
        ]);

        return response()->json([
            'message' => 'Tạo sản phẩm mới thành công',
            'data'    => $newWarehouse,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {
        $warehouse = WareHouse::find($request->id);

        if (!$warehouse) {
            return response()->json([
                'message' => 'Không có sản phẩm này',
                'data' => $warehouse,
            ], Response::HTTP_BAD_REQUEST);
        }

        $warehouse->update($request->all());

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công',
            'data' => $warehouse,
        ], Response::HTTP_OK);
    }

    public function deleteData($id_product)
    {
        $check = WareHouse::find($id_product);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá sản phẩm thành công',
                'id_product' => $id_product,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Sản phẩm không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}
