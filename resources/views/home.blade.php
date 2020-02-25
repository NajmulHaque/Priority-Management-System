@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div>
                            <h1 class="text-right">
                                <button type="button" class="btn btn-primary"><b>Priority Dashboard</b></button>
                            </h1>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 textbody">
                                    <h3 class="text-center p-2 text-info" style="font-size: 23px;">Your Account is Approved</h3>
                                    <form class="form-group" style="padding: 20px;" method="post" action="">
                                        <h4 style="font-size: 20px" class="">Do you have an order?</h4>
                                        <label>NSU ID</label>
                                        <input type="number" name="nsuid" class="form-control" placeholder="Type your nsu id">
                                        <a type="submit" style="margin-top: 20px;;color: #fff" class="btn btn-success btn-sm">Place Order</a>
                                    </form>
                                </div>
                            </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
