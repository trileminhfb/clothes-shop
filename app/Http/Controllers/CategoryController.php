<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function getData()
    {
        $data = Category::get();

        return response()->json([
            'message' => 'lấy data thể loại thành công',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        $check = Category::where('nameCategory', $request->nameCategory)->first();

        if ($check) {
            return response()->json([
                'message' => 'Thể loại đã tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }

        $category = Category::create([
            'nameCategory' => $request->nameCategory,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Tạo thể loại thành công',
            'data' => $category,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return response()->json([
                'message' => 'Không có thể loại này',
                'data' => $category,
            ], Response::HTTP_BAD_REQUEST);
        }
        $category->update($request->all());

        return response()->json([
            'message' => 'Cập nhật thể loại thành công',
            'data' => $category,
        ], Response::HTTP_OK);
    }

    public function deleteData($id)
    {
        $check = Category::find($id);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá thể loại thành công',
                'id' => $id,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Thể loại không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}
