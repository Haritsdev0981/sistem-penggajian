@extends('layouts.template')
@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1>Data Employee</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create
            Employee</button>

        <!-- Start add Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Division</label>
                            <select name="" id="" class="form-select">
                                <option selected>Open this select division</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- End add Modal -->

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
                        <form action="#" method="post"
                            onsubmit="return confirm('Apakah Anda akan menghapus data ini?')">
                            @csrf
                            {{method_field('DELETE')}}
                            <a href="#" class="btn btn-primary">Detail</a>
                            <button type="submit" class="btn bg-warning text-white">Reset Password</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>
@endsection
