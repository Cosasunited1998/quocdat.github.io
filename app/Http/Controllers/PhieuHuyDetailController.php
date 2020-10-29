<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PhieuHuyDetailController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function show_phieuhuydetail($phieuhuy_id)
    {
        $this->AuthLogin();
        $detail_phieuhuy = DB::table('tbl_phieuhuydetail')
            ->join('tbl_nguyenlieu', 'tbl_phieuhuydetail.nguyenlieu_id', '=', 'tbl_nguyenlieu.nguyenlieu_id')
            ->join('tbl_phieuhuy', 'tbl_phieuhuydetail.phieuhuy_id', '=', 'tbl_phieuhuy.phieuhuy_id')
            ->orderby('tbl_phieuhuydetail.phieuhuy_id','desc')->get()->where('phieuhuy_id',$phieuhuy_id);
        $manager_phieuhuydetail = view('admin.show_phieuhuydetail')->with('show_phieuhuydetail', $detail_phieuhuy);
        return view('Admin_Layout')->with('admin.show_phieuhuydetail', $manager_phieuhuydetail);
    }
    function get_data($phieuhuy_id)
    {
        $data= DB::table('tbl_phieuhuydetail')
            ->join('tbl_nguyenlieu', 'tbl_phieuhuydetail.nguyenlieu_id', '=', 'tbl_nguyenlieu.nguyenlieu_id')
            ->join('tbl_phieuhuy', 'tbl_phieuhuydetail.phieuhuy_id', '=', 'tbl_phieuhuy.phieuhuy_id')
            ->orderby('tbl_phieuhuydetail.phieuhuy_id', 'desc')->get()->where('phieuhuy_id',$phieuhuy_id);
        return $data;
    }
}
