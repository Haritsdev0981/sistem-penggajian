@extends('layouts.template')
@section('content')
<div class="container-fluid bg-warning py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data {{ $user->level }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Full Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Division</th>
                            <td>
                                <input type="text">
                            </td>
                            @foreach($divisi as $division)
                            <td>{{ $division->name_division }}</td>
                        @endforeach
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Email address</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Handphone</th>
                            <td>+62 {{ $user->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Change Password</th>
                            <td></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection



<!-- <section class="bg-white mt-4 container rounded-5">
    <h1>{{ $user->name }}</h1>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        @foreach($divisi as $division)
        <p>{{ $division->name_division }}</p>
        @endforeach
    </div>
</section> -->