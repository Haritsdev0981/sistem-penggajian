@extends('layouts.template')
@section('content')
<div class="card m-2">
                    <form action="{{route('employee.update', $user->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Level</label>
                                <select name="level" class="form-select">
                                    <option selected>Default {{ $user->level }}</option>
                                    <option value="employee">Employee</option>
                                    <option value="pic">Pic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option selected>Default {{ $user->status }}</option>
                                    <option>Fulltime</option>
                                    <option>Contract</option>
                                    <option>Internship</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email" value="{{ $user->email }}" autocomplete="email" autofocus required>
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
                                <input type="tel" class="form-control" name="no_hp" required value="{{ $user->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo Profile</label>
                                <input type="file" class="form-control" name="photo">
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('employee.show', $user->id) }}" class="btn btn-secondary">back</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
@endsection