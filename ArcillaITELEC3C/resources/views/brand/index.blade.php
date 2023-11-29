<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 style="font-weight: bold; font-size:22px">List of Brands</h2>
                <table style="width: 100%; border: 1px solid #ddd; text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td><center><img src="{{ asset($brand->brand_image)}}" style="height:40px;"></center></td>                            
                            <td>{{ $brand->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{url('/brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{url('/brand/remove/'.$brand->id)}}">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$brands->links()}}
<br/><br/>
                <h2 style="font-weight: bold; font-size:22px">Add a Brand</h2>
                
                <form action="{{route('add.brand')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- CSRF protection -->
                    <div style="width: 30%;">
                        <table style="width: auto; text-align:start;">
                            
                            <tr>
                                <div class="form-group">
                                    <td><label for="brand_name">Brand Name</label></td>
                                    <td><input type="text" id="brand_name" name="brand_name" class="form-control"
                                            required>
                                            @error('brand_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </td>
                                </div>
                            </tr>
                            
                            <tr>
                                <div class="form-group">
                                    <td><label for="brand_image">Brand Image</label></td>
                                    <td><input type="file" id="brand_image" name="brand_image" class="form-control"
                                            required>
                                            @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </td>
                                </div>
                            </tr>

                            
                        </table>
                        <center><button type="submit" class="btn btn-primary" style="background-color: azure;">
                            Add Brand</button>
                        </center>
                    </div>
                </form>
<br/><br/>
                <h2 style="font-weight: bold; font-size:22px">List of Deleted Brands</h2>
                <table style="width: 100%; border: 1px solid #ddd; text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trashBrand as $trash)
                        <tr>
                            <td>{{ $trash->id }}</td>
                            <td>{{ $trash->brand_name }}</td>
                            <td><center><img src="{{ asset($trash->brand_image)}}" style="height:40px;"></center></td>                            
                            <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{url('/brand/restore/'.$trash->id)}}" class="btn btn-info">Restore</a>
                                <a href="{{url('/brand/delete/'.$trash->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$trashBrand->links()}}
           
            </div>
        </div>
    </div>
</x-app-layout>