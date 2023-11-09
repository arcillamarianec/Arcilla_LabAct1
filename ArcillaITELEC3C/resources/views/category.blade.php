<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 style="font-weight: bold; font-size:22px">List of Categories</h2>
                <table style="width: 100%; border: 1px solid #ddd; text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user->name }}</td>                            
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{url('edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{url('delete/'.$category->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
                <h2 style="font-weight: bold; font-size:22px">Add a Category</h2>
                
                <form method="POST" action="{{ route('add.category') }}">
                    @csrf
                    <!-- CSRF protection -->
                    <div style="width: 30%;">
                        <table style="width: auto; text-align:start;">
                            <tr>
                                <div class="form-group">
                                    <td><label for="category_name">Category Name</label></td>
                                    <td><input type="text" id="category_name" name="category_name" class="form-control"
                                            required>
                                            @error('category_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </td>
                                </div>
                            </tr>
                        </table>
                        <center><button type="submit" class="btn btn-primary" style="background-color: azure;">
                            Add Category</button>
                        </center>
                    </div>
                </form>
           
            </div>
        </div>
    </div>
</x-app-layout>