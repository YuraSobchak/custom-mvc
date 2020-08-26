@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a product</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="first_name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $product->name }} />
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select type="text" class="form-control" name="category">
                        <option value="">Choose category</option>
                        @foreach($categories as $category)
                            @if($category->category == $product->category)
                                <option value="{{ $category->category }}" selected>{{ $category->category }}</option>
                            @else
                                <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
