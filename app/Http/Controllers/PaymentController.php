<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function getData()
    {
        $data = Payment::get();

        return response()->json([
            'message' => 'lấy data phương thức thanh toán thành công',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function createData(Request $request)
    {
        $check = Payment::where('namePaymentMethod', $request->namePaymentMethod)->first();

        if ($check) {
            return response()->json([
                'message' => 'Phương thức thanh toán đã tồn tại',
            ], Response::HTTP_BAD_REQUEST);
        }

        $payment = Payment::create([
            'namePaymentMethod' => $request->namePaymentMethod,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Tạo phương thức thanh toán thành công',
            'data' => $payment,
        ], Response::HTTP_CREATED);
    }

    public function updateData(Request $request)
    {

        $payment = Payment::find($request->id);

        if (!$payment) {
            return response()->json([
                'message' => 'Không có phương thức thanh toán này',
                'data' => $payment,
            ], Response::HTTP_BAD_REQUEST);
        }

        $payment->update($request->all());

        return response()->json([
            'message' => 'Cập nhật phương thức thanh toán thành công',
            'data' => $payment,
        ], Response::HTTP_OK);
    }

    public function deleteData($id)
    {
        $check = Payment::find($id);

        if ($check) {
            $check->delete();

            return response()->json([
                'message' => 'Xoá phương thức thanh toán thành công',
                'id' => $id,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Phương thức thanh toán không tồn tại',
        ], Response::HTTP_BAD_REQUEST);
    }
}
