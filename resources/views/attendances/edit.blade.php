@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Attendance</h2>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $attendance->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="{{ $attendance->date }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="time_in">Time In:</label>
            <input type="time" name="time_in" id="time_in" value="{{ $attendance->time_in }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ $attendance->description }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
