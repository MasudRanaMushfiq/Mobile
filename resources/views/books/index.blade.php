@extends('books.layout')

@section('page-content')


    <div class="row align-items-center">
    <!-- Search Section -->
    <div class="col-lg-10 p-3">
        <form method="get" action="{{ route('books.index') }}">
            <div class="row g-2">
                <div class="col-8">
                    <input type="text" 
                           class="form-control" 
                           id="search" 
                           name="search" 
                           placeholder="Search"
                           value="{{ request('search') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-dark">Search</button>
                </div>
            </div>
        </form>
    </div>

        <!-- New Book Button -->
        <div class="col-lg-2 text-end">
            <a href="{{ route('books.create') }}" class="btn btn-primary">New Book</a>
        </div>
    </div>



    <table class=" table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th colspan="3">CRUD Operation</th>
    </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->price }}</td>
            <td><a href="{{ route('books.show', $book->id) }}">Details</a></td>
            <td>
            <form method="post" action="{{ route('books.destroy', $book->id) }}" onsubmit=" return confirm('Sure?')">
                {{ csrf_field() }}
                @method('DELETE')
                <input class="btn btn-link" type="submit" value="Delete">
            </form>
            </td>
            <td><a href="{{route('books.edit', $book->id)}}">Edit</a> </td>
        </tr>
            @endforeach
    </table>
    {{ $books->links() }}

@endsection



