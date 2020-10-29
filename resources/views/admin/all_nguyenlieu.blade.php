@extends('Admin_Layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê nguyên liệu
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo'<span class="text-alert">'.$message.'</span>';
                    Session::put('$message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Đơn vị tính</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Ngày nhập</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_nguyenlieu as $key => $pro)
                        <tr>
                            <td>{{$pro->nguyenlieu_name}}</td>
                            <td>{{$pro->nguyenlieu_nums}}</td>
                            <td>{{$pro->dvt}}</td>
                            <td>{{$pro->nguyenlieu_price}}</td>
                            <td><img src="public/uploads/nguyenlieu/{{$pro->nguyenlieu_image}}"height="100" width="100"></td>
                            <td>{{$pro->nguyenlieu_ngaynhap}}</td>
                            <td>
                                <a href="{{URL::to('/edit_nguyenlieu/'.$pro->nguyenlieu_id)}}" class="active styling edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có muốn xóa nguyên liệu này không?')" href="{{URL::to('/delete_nguyenlieu/'.$pro->nguyenlieu_id)}}" class="active styling edit" ui-toggle-class="">
                                    </i><i class="fa fa-times text-danger text"></i></a>
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
