@extends('users.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit User</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputUsername" class="form-label"><strong>Username:</strong></label>
            <input
                type="text"
                name="username"
                value="{{ $user->username }}"
                class="form-control @error('username') is-invalid @enderror"
                id="inputUsername"
                placeholder="Username">
            @error('username')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <input
                type="email"
                name="email"
                value="{{ $user->email }}"
                class="form-control @error('email') is-invalid @enderror"
                id="inputEmail"
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection
