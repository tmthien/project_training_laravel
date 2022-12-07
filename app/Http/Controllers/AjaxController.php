<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Ward;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Approve;
use Illuminate\Support\Facades\DB;



class AjaxController extends Controller
{
    public function getDistrict(Request $request)
	{
		if ($request->ajax()) {
			$districts = District::where('province_id', $request->province_id)->pluck('name','id');
            return response()->json($districts);
		}
	}
    public function getWard(Request $request)
	{
		if ($request->ajax()) {
			$wards = Ward::where('district_id', $request->district_id)->pluck('name','id');
            return response()->json($wards);
		}
	}
 
	public function getModalStatus($id)
    {
        $status = Booking::where('id', $id)->first();
        return response()->json([
            'data' => $status,
            'success' => 'Get Status Modal successfully.',
        ]);
    }


	public function updateModalStatus(Request $request) {
        $bookings = Booking::find($request->id);
        if ($bookings->approve_id == $request->approve_id) {
            return response()->json([
                'success' => false,
                'message' => ' Trạng thái đã tồn tại',
            ]);
        }
        $bookings->approve_id = $request->approve_id;
        $approve_id = $bookings->approve_id;
		
		switch ($approve_id) {
            //            case 1:
            //                $title = 'Tiếp nhận đơn hàng mới';
            //                $content = 'Đơn hàng '.$bookings->code.' đã được ghi nhận. Vui lòng kiểm tra thời gian nhận hàng dự kiến trong phần chi tiết đơn hàng nhé.';
            //                break;
            case 2:
                $title = 'Đơn hàng đã được tiếp nhận';

                $content = 'Admin đã tiếp nhận đơn hàng ' . $bookings->id . ' của bạn.';
                break;
            case 3:

                $title = 'Đơn hàng đang được giao';
                $content = 'Đơn hàng ' . $bookings->id . ' đang trong quá trình giao và dự kiến sẽ được giao trong thời gian sớm nhất.';
                break;
            case 4:

                $title = 'Giao hàng thành công';
                $content = 'Đơn hàng ' . $bookings->id . ' đã được giao thành công đến bạn.';
                break;
            case 5:
                Booking::insertTransactionOnline($bookings, true);
                Booking::orderRefund($bookings);
                $title = 'Xác nhận huỷ đơn hàng';
                $content = 'Yêu cầu hủy đơn hàng của bạn đã được chấp nhận. Đơn hàng ' . $bookings->id . ' đã được hủy thành công.';
                break;
        }
		$notifications = [
			'title'=>$title,
			'content'=>$content,
			'user_id'=>$bookings->user_id,
			'booking_id'=>$bookings->id,
			'type'=> 1,
		];
		DB::table('notifications')->insert($notifications);
		$bookings->save();
		
	}
}
