@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('NSU ID') }}
                                </th>
                                <th>
                                    {{ trans('Student Name') }}
                                </th>
                                <th>
                                    {{ trans('Email') }}
                                </th>
                                <th>
                                    {{ trans('Course Details') }}
                                </th>
                                <th>
                                    {{ trans('Advising Slip') }}
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($xyz as $order)
                                <tr data-entry-id="{{ $order->nsu_id }}">
                                    <td>
                                        {{ $order->nsu_id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $order->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $order->email ?? '' }}
                                    </td>
                                    <td>
                                        <ul style="list-style-type: none">
                                                <li><table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                                                      <thead>
                                                          <tr>
                                                              <th>Course</th>
                                                              <th>Section</th>
                                                              <th>Class Start</th>
                                                              <th>Class End</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($order->course as $item)
                                                          <tr>
                                                              <td>{{ $item->course }}</td>
                                                              <td>{{ $item->section }}</td>
                                                              <td>{{ $item->class_start }}</td>
                                                              <td>{{ $item->class_end }}</td>
                                                          </tr>
                                                          @endforeach
                                                      </tbody>
                                                    </table>
                                                </li>
                                        </ul>
                                    </td>
                                    <td><img data-toggle="modal"  data-target="#myModal" width="100px" height="50px" src="/images/{{ $order->advising_slip_img }}"></td>
                                    <td><a href=""
                                        class="btn btn-primary btn-sm">Approve</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <a href="" class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#myModal">Details</a> --}}
<div class="container">
    <div class="row">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @foreach ($xyz as $item)
                            
                        <img style="cursor: pointer" width="100%" height="200px" src="/images/{{ $item->advising_slip_img ?? ''}}">
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection