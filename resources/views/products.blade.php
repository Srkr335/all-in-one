<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Categories
                            <div class="float-end">
                                <a href="{{ url('dashboard/create') }}" class="btn btn-primary">Add Products</a>
                                <!-- {{-- <a href="{{ url('gallery') }}" class="btn btn-warning">Drag and Drop</a> --}} -->
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Is_Active</th>
                                    <th>More Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" style="width:70px; height:70px;" alt="image">
                                        </td>
                                        <td class="{{ $item->is_active ? 'btn btn-success bg-success text-white' : 'btn btn-warning bg-warning text-white' }}">
                                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            <a href="{{ url('categories/'. $item->id.'/upload') }}" class="btn btn-info">Add & View Images</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('categories/'. $item->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('categories/'. $item->id.'/delete') }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are You Sure?')">
                                                Delete
                                            </a>
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

   
</x-app-layout>

