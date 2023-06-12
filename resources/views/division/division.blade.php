@extends('layouts.template')
@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1>Data Division</h1>
        <a href="{{ route('division.create') }}" class="btn btn-primary">Create Division</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success text-dark">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name Division</th>
                    <th>Total Division Salary</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($division as $row)
                    <tr>
                        <td>{{ $row->name_division }}</td>
                        <td>Rp. {{ $row->gaji_pokok }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection