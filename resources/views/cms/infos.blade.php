@extends('layouts.cms')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>授权用户</h2>
                        <span class="txt"></span>
                    </div>

                </div>
                <!-- Start .row -->
                <div class="row">

                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body">
                                <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>微信用户</th>
                                        <th>姓名</th>
                                        <th>手机</th>
                                        <th>地址</th>
                                        <th>是否中奖</th>
                                        <th>创建时间</th>
                                        <th>创建IP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($infos as $info)
                                    <tr>
                                        <td>{{ $info->id }}</td>
                                        <th><a href="{{url('cms/wechat',['id'=>$info->user->id])}}">{{json_decode($info->user->nick_name)}}</a></th>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->mobile }}</td>
                                        <td>{{ $info->address }}</td>
                                        <td>{{ $info->has_win == 1 ? '已中' : '未中' }}</td>
                                        <td>{{ $info->created_time }}</td>
                                        <td>{{ $info->created_ip }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="dataTables_paginate paging_bootstrap" id="basic-datatables_paginate">
                                            {!! $infos->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- End .row -->
            </div>
            <!-- End .page-content-inner -->
        </div>
        <!-- / page-content-wrapper -->
    </div>
@endsection
