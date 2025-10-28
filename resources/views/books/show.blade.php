@extends('books.layout')

@section('page-content')

    <h3></h3>
    <a href="{{ route('books.index') }}">Back</a>
    <table class=" table table-striped table-bordered">
        <tr><th>ID</th>
            <td>{{ $book->id }}</td>
        </tr>
        <tr><th>Title</th>
            <td>{{ $book->title }}</td>
        </tr>
        <tr><th>Author</th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr><th>Price</th>
            <td>{{ $book->price }}</td>
        </tr>
        <tr><th>Stock</th>
            <td>{{ $book->stock }}</td>
        </tr>
    </table>



@endsection