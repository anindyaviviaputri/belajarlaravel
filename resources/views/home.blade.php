@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form untuk menyimpan attendance -->
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="time_in" class="form-label">Time In:</label>
                            <input type="time" name="time_in" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <br><br>

                    <!-- Tabel data attendance -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_attendances as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time_in }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group">
                                            <!-- Edit Icon -->
                                            <a href="{{ route('attendances.edit', $item->id) }}" class="btn btn-secondary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- Delete Icon -->
                                            <form action="{{ route('attendances.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>
@endsection