@extends('layouts.template')
@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1>Data Division</h1>
        <a href="{{ route('division.create') }}" class="btn btn-success">Create Division</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success text-dark">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Division</th>
                    <th>Total Division Salary</th>
                    <th>Pic</th>
                    <th>Choose</th>
                </tr>
            </thead>
            <tbody>
                    <!-- @php
                    $no = 1; // Inisialisasi variabel $no dengan nilai 1
                    @endphp -->
                    @foreach($division as $row)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $row->name_division }}</td>
                        <td>Rp. {{ $row->gaji_pokok }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>
                            <form action="{{route('division.destroy', [$row->id])}}" method="post" onsubmit="return confirm('Apakah Anda akan menghapus data ini?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <a href="{{route('division.edit', [$row->id])}}" class="btn btn-primary">Edit</a>
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection