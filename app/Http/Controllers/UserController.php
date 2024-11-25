<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getData()
    {
        $data = User::with(['role'])->get();

        return response()->json([
            'message' => 'Lấy data người dùng thành công',
            'data' => $data,
        ], Response::HTTP_OK);
    }


    public function createData(Request $request)
    {
        $check = User::where('account', $request->account)->first();

        if ($check) {
            return response()->json([
                'message' => 'Người dùng đã tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::create([
            'account' => $request->account,
            'password' => $request->password,
            'id_role' => $request->id_role,
            'fullName' => $request->fullName,
            'address' => $request->address,
            'birth' => $request->birth,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Tạo người dùng thành công',
            'data' => $user,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                'message' => 'Không có người dùng này',
                'data' => $user,
            ], Response::HTTP_BAD_REQUEST);
        }

        $user->update($request->all());

        return response()->json([
            'message' => 'Cập nhật người dùng thành công',
            'data' => $user,
        ], Response::HTTP_OK);
    }

    public function deleteData($id)
    {
        $check = User::find($id);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá người dùng thành công',
                'id' => $id,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Người dùng không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}
