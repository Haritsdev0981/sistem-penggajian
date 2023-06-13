@extends('layouts.template')
@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1>Data Employee</h1>
        <a href="#" class="btn btn-success">Create Employee</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success text-dark">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Employee</th>
                    <th>Division</th>
                    <th>Status</th>
                    <th>Choose</th>
                </tr>
            </thead>
            <tbody>
                    <!-- @php
                    $no = 1; // Inisialisasi variabel $no dengan nilai 1
                    @endphp -->

                    <tr>
                        <th>1</th>
                        <td>Harits</td>
                        <td>FrontEnd Developer</td>
                        <td>Karyawan Tetap</td>
                        <td>
                            <form action="#" method="post" onsubmit="return confirm('Apakah Anda akan menghapus data ini?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <a href="#" class="btn btn-primary">Detail</a>
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>

            </tbody>
        </table>
    </div>
</section>
@endsection