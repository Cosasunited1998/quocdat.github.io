@extends('Admin_Layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Phiếu hủy
            </div>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if($message){
                echo'<span class="text-alert">'.$message.'</span>';
                Session::put('.$message.',null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th>Người lập phiếu</th>
                    <th>Số tiền</th>
                    <th>Ngày nhập</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($thongke_phieuhuy as $key => $thongke)
                    <tr>
                        <td>{{$thongke->phieuhuy_nguoi}}</td>
                        <td>{{$thongke->phieuhuy_price}}</td>
                        <td>{{$thongke->phieuhuy_time}}</td>
                        <td>
                            {{--                                @foreach($detail_phieuthue as $key => $detail)--}}
                            <a href="{{URL::to('/show_phieuhuydetail/'.$thongke->phieuhuy_id)}}" class="active styling edit" ui-toggle-class="">
                                <i class="fa fa-file-text-o"></i></a>
                            {{--                                @endforeach--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
@endsection


