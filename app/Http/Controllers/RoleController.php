<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function getData()
    {
        $role = Role::get();

        return response()->json([
            'message' => 'lấy data Role thành công',
            '' => $role,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        try {
            //code...

            $request->validate([
                'nameRole' => 'required|string|max:255',
            ]);

            $check = Role::where('nameRole', $request->nameRole)->first();

            if ($check) {
                return response()->json([
                    'message' => 'Role tồn tại'
                ], Response::HTTP_BAD_REQUEST);
            }

            $role = Role::create([
                'nameRole' => 'abccc',
            ]);

            return response()->json([
                'data' => $role,
                'message' => 'Tạo role thành công'
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => $th->getMessage()
            ], Response::HTTP_CREATED);
        }
    }
}
