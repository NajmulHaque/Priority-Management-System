@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nsu_id" class="col-md-4 col-form-label text-md-right">{{ __('NSU ID') }}</label>

                            <div class="col-md-6">
                                <input id="nsu_id" type="number" class="form-control{{ $errors->has('nsu_id') ? ' is-invalid' : '' }}" name="nsu_id" value="{{ old('nsu_id') }}" required autofocus placeholder="Ex. 1520836042">

                                @if ($errors->has('nsu_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nsu_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- clone start from here --}}  
                                                <div class="parent">
                                                    <div id="form-set">
                                                        <div class="form-group row">
                                                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course & Section') }}</label>
                                
                                                            <div class="col-md-3">
                                                                <select  id="course" type="text" class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" name="course" value="{{ old('course') }}" required autocomplete="course" autofocus>
                                                                    <option>Course</option>
                                                                    <option>cse 115</option>
                                                                    <option>cse 215</option>
                                                                    <option>cse 311</option>
                                                                    <option>cse 411</option>
                                                                </select>
                                                                @if ($errors->has('course'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('course') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-3">
                                                                <select  id="section" type="text" class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}" name="section" value="{{ old('section') }}" required autocomplete="section" autofocus>
                                                                    <option>Section</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                </select>
                                                                @if ($errors->has('section'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('section') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="Class Timing" class="col-md-4 col-form-label text-md-right">{{ __('Class Timing') }}</label>
                                
                                                            <div class="col-md-3">
                                                                <select  id="class_start" type="text" class="form-control{{ $errors->has('class_start') ? ' is-invalid' : '' }}" name="class_start" value="{{ old('class_start') }}" required autocomplete="class_start" autofocus>
                                                                    <option>Start</option>
                                                                    <option>08:00 AM</option>
                                                                    <option>09:40 AM</option>
                                                                    <option>11:20 AM</option>
                                                                    <option>01:00 PM</option>
                                                                    <option>02:40 PM</option>
                                                                    <option>04:20 PM</option>
                                                                </select>
                                                                @if ($errors->has('course'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('course') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-3">
                                                                <select  id="class_end" type="text" class="form-control{{ $errors->has('class_end') ? ' is-invalid' : '' }}" name="class_end" value="{{ old('class_end') }}" required autocomplete="class_end" autofocus>
                                                                    <option>End</option>
                                                                    <option>9:30</option>
                                                                    <option>11:10</option>
                                                                    <option>12:50</option>
                                                                    <option>2:30</option>
                                                                    <option>4:10</option>
                                                                    <option>5:50</option>
                                                                </select>
                                                                @if ($errors->has('class_end'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('class_end') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center"  style="margin-top: -11%">
                                                    <div class="col-md-10" style="visibility: hidden"></div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-xs btn-success" id="add">Add</button>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $(function () {
                                                   
                                                        $('#add').click(function(e) {
                                                            $("#form-set").clone().appendTo(".parent");
                                                        });
                                                        $('.parent').on("click", ".delete", function() {
                                                            $(this).parent('div').remove();
                                                        })
                                                    })
                                                </script>
                        {{-- Clone end here --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
