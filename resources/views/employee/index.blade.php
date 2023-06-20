@extends('layouts.template')
@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        @if(auth()->user()->level != "admin")
        <h1>Data Employee</h1>
        @elseif(auth()->user()->level == "admin")
        <h1>Data User</h1>
        @endif
        @if(auth()->user()->level == "admin")
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create
            Employee</button>
        @endif

        <!-- Start add Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('employee-list.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Level</label>
                                <select name="level" class="form-select">
                                    <option selected>--Open this select level--</option>
                                    <option value="employee">Employee</option>
                                    <option value="pic">Pic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option selected>--Open this select status--</option>
                                    <option>Fulltime</option>
                                    <option>Contract</option>
                                    <option>Internship</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="tel" class="form-control" name="no_hp" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
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
                    <th>Level</th>
                    <th>Status</th>
                    @if(auth()->user()->level == "admin")
                    <th>Choose</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <!-- @php
                    $no = 1; // Inisialisasi variabel $no dengan nilai 1
                    @endphp -->

                @foreach($user as $row)
                @if(auth()->user()->level == 'admin' || (auth()->user()->level == 'pic' && $row->level == 'pic') || (auth()->user()->level == 'employee' && $row->level == 'employee'))
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->level }}</td>
                    <td>
                        @if($row->status == 'Fulltime')
                        <span class="bg-warning py-1 px-2 rounded-3 text-white"
                            style="font-size: 14px;">{{ $row->status }}</span>
                        @elseif($row->status == 'Contract')
                        <span class="bg-primary py-1 px-2 rounded-3 text-white"
                            style="font-size: 14px;">{{ $row->status }}</span>
                        @elseif($row->status == 'Internship')
                        <span class="bg-secondary py-1 px-2 rounded-3 text-white"
                            style="font-size: 14px;">{{ $row->status }}</span>
                        @endif
                    </td>
                    @if(auth()->user()->level == "admin")
                    <td>
                        <form action="{{ route('employee-list.update', $row->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <a href="{{ route('employee.show', $row->id) }}"
                                class="btn btn-primary py-1 px-2">Detail</a>
                            <button type="submit" class="btn bg-warning text-white py-1 px-2">Reset Password</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </div>
</section>
@endsection
