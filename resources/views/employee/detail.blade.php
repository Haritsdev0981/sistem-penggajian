@extends('layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-header px-0 d-flex justify-content-between">
                        <span>Data {{ $user->level }}</span>
                        <a href="{{ route('employee.edit', $user->id) }}" class="btn py-2 px-2 btn-warning">Edit</a>
                    </div>

                    <div class="card-body row px-0 mx-0 gap-2">
                        <div class="photo-profile col-md-2 p-0 bg-warning rounded-1 border border-1 " 
                            style="width: 200px; height: 220px; background-position: center; background-size: cover; background-image: url('../assets/img/elements/blank-image.png');">
                        </div>
                        <div class="col-md-10 px-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        @if($user->level == 'pic')
                                        <th>Division Pic</th>
                                        @else
                                        <th>Division</th>
                                        @endif
                                        @if(empty($divisi))
                                        <td>-</td>
                                        @else
                                        @foreach($divisi as $division)
                                        <td>{{ $division->name_division }}</td>
                                        @endforeach
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($user->status == 'Fulltime')
                                            <span class="bg-warning py-1 px-2 rounded-3 text-white"
                                                style="font-size: 14px;">{{ $user->status }}</span>
                                            @elseif($user->status == 'Contract')
                                            <span class="bg-primary py-1 px-2 rounded-3 text-white"
                                                style="font-size: 14px;">{{ $user->status }}</span>
                                            @elseif($user->status == 'Internship')
                                            <span class="bg-secondary py-1 px-2 rounded-3 text-white"
                                                style="font-size: 14px;">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email address</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Handphone</th>
                                        <td>+62 {{ $user->no_hp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
