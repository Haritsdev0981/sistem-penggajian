@extends('layouts.template')
@section('content')
<section class="bg-white mt-4 container rounded-5">
    <h1>{{ $user->name }}</h1>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <p>{{ $user->division->name_division }}</p>
    </div>
</section>
@endsection