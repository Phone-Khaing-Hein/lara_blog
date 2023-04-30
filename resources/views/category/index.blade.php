@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Category List</h4>
            <hr>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Control</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>
                            <p class="mb-0">{{ $c->title }}</p>
                            <p class="badge bg-secondary mb-0">{{ $c->slug }}</p>
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $c->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('category.destroy', $c->id) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <p class="mb-0">
                                <i class="bi bi-calendar"></i>
                                {{ $c->created_at->format('d M Y') }}
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-clock"></i>
                                {{ $c->created_at->format('h:i a') }}
                            </p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
