@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2 class="h3 mb-0 page-title">{{ __('Users') }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Users') }}</li>
                            </ol> 
                        </div>
                        <div class="col-sm-12">
                            <div class="breadcrumb float-sm-right">
                                @can('user-create')
                                <a href="{{route('users.create')}}" class="btn btn-success" style="color:white">
                                    <span style="color:white"></span> {{ __('New') }}
                                </a>
                                @endcan
                            </div>
                        </div>
                        </div>
                    </div>
                </div>                  
@if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
<div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Roles') }}</th>
                                                <th width="280px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($data as $key => $user)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $v)
                                                                {{ $v }}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary" href="{{ route('users.show',$user->id) }}">{{ __('Show') }}</a>
                                                        @can('user-edit')
                                                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{ __('Edit') }}</a>
                                                        @endcan
                                                        @can('user-delete')
                                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                     </td>
                                                </tr>                                            
                                            </tbody>
                                        @endforeach
                                    </table>
                                    {!! $data->render() !!}
                                <!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->        
  
@endsection