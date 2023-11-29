<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 style="font-weight: bold; font-size:22px">Edit Categories</h2>
                
                <form action="{{url('/brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- CSRF protection -->
                    <div style="width: 30%;">
                        <table style="width: auto; text-align:start;">
                            
                            <tr>
                                <div class="form-group">
                                    <td><label for="brand_name">Brand Name</label></td>
                                    <td><input type="text" id="brand_name" name="brand_name" class="form-control"
                                        value="{{$brands->brand_name}}"required>
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
                                        value="{{$brands->brand_image}}"required>
                                            @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </td>
                                </div>
                            </tr>
                        
                            
                        </table>
                        <center><button type="submit" class="btn btn-primary" style="background-color: azure;">
                            Update Brand</button>
                        </center>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>