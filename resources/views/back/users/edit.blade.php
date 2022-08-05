@extends('back.layouts.main')

@section('content')
    <div class="mt-3 resource-list bg-white users mr-5">
        <form action="{{ isset($user) ? route('users::update', $user) : route('users::store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3 class="p-3 border-bottom">{{isset($users) ? 'Edit user - ' . $user->name : 'New user'}}</h3>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-4 form-group search-input">
                    <input id="name" class="form-content form-control bg-white border-bottom" type="text" name="name" value="{{isset($user) ? $user->name : ''}}" autocomplete="on" placeholder="Enter name" required />
                </div>
                <div class="col-md-4 form-group search-input">
                    <input id="email" class="form-content form-control bg-white border-bottom" type="email" name="email" value="{{isset($user) ? $user->email : ''}}" autocomplete="on" placeholder="Enter email" required />
                </div>
                <div class="col-md-4 form-group search-input">
                    <input id="password" class="form-content form-control bg-white border-bottom" type="password" name="password" autocomplete="on" placeholder="******" />
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-sm pl-1 bg-dark search-button">
                        <span class="font-size-12 text-white ml-1" style="text-transform: capitalize!important;">{{isset($user) ? 'Update' : 'Create'}}</span>
                    <div class="ripple-container"></div></button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $('#categories').select2();
    </script>
@endsection