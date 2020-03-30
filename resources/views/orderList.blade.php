@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Dashboard</div>
                        <div class="col-md-6 text-right">
                            <a style="color:#fff" href="/adminDashboard" type="button" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 textbody">
                                    <h3 class="text-center p-2 text-info" style="font-size: 23px;">Student Order Request</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Priority No.</th>
                                                        <th>NSU ID</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($orders->count())
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $order->nsu_id }}</td>
                                                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
