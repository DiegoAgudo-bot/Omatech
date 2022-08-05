@extends('back.layouts.main')

@section('content')
    <div class="mt-3 resource-list">
        <div class="row bg-white users">
            <div class="col-md-12 mb-3">
                <h3 class="p-3 border-bottom">Users <div class="float-right bg-dark"><a href="{{ route('users::create') }}"><i class="fas fa-plus text-white p-2"></i></a></h3>
            </div>
            <form action="{{ route('users::list') }}" style="display: contents;" method="POST">
                @csrf
                <div class="col-md-5 form-group search-input">
                    <input id="user-name" class="form-content form-control bg-white border-bottom" type="text" name="name" value="{{ session()->get('user_name') }}" autocomplete="on" placeholder="Enter name" />
                </div>
                <div class="col-md-5 form-group search-input">
                    <input id="user-mail" class="form-content form-control bg-white border-bottom" type="text" name="email" value="{{ session()->get('user_email') }}" autocomplete="on" placeholder="Enter email" />
                </div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-sm pl-1 bg-dark search-button">
                        <i class="fas fa-search text-white"></i><span class="font-size-12 text-white ml-1" style="text-transform: capitalize!important;">Search</span>
                    <div class="ripple-container"></div></button>
                </div>
            </form>
            <div class="card-body users-list">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="header">
                                    Name
                                </th>
                                <th class="header">
                                    Email
                                </th>
                                <th class="header">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a class="p-2" href="{{route('users::edit', $user)}}" style="background-color: #ffa500;border-radius:5px;">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <a class="p-2 ml-2" href="{{route('users::delete', $user)}}" style="background-color: red;border-radius:5px;">
                                            <i class="fas fa-trash text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (Session::has('message'))
            Swal.fire({
                icon: 'success',
                title: 'Good job!',
                text: 'User successfully {{Session::get('message')}}',
            })
        @endif
        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{Session::get('error')}}',
            })
        @endif
    </script>
@endsection