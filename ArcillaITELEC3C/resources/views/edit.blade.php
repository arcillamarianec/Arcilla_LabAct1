<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 style="font-weight: bold; font-size:22px">Edit Categories</h2>
                
                <form action="{{url('update/'.$categories->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        Update Category Name
                        <input type="text" name="category_name" value="{{$categories->category_name}}">
                        @error('category_name')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit">Update Category </button>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>