@extends('Admin_Layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê bàn cà phê
            </div>
                    </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên bàn</th>
                        <th>Khu vực</th>
                        <th>Tình trạng</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_bancafe as $key => $ban)
                        <tr>
                            <td>{{$ban->bancafe_name}}</td>
                            <td>{{$ban->khuvuc_name}}</td>
                            <td><span class="text-ellipsis">
                            <?php
                                    if($ban->bancafe_status==0){
                                    ?>
                            <a href ="{{URL::to('/unactive_bancafe/'.$ban->bancafe_id)}}"> <span class="fa-thumb-styling fa fa-toggle-off"></span></a>
                            <?php
                                    }else{
                                    ?>
                             <a href ="{{URL::to('/active_bancafe/'.$ban->bancafe_id)}}"> <span class="fa-thumb-styling fa fa-toggle-on"></span></a>
                            <?php
                                    }
                                    ?>
                        </span></td>
                            <td>
                                <a href="{{URL::to('/edit_bancafe/'.$ban->bancafe_id)}}" class="active styling edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có muốn xóa bàn này không?')" href="{{URL::to('/delete_bancafe/'.$ban->bancafe_id)}}" class="active styling edit" ui-toggle-class="">
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
