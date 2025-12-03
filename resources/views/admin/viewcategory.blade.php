@extends('admin.maindesing')

@section('viewcategory')

    @if(session('deletecategoryMessge'))
    <div class="mb-4 bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded-relative" role="alert">
        {{ session('deletecategoryMessge') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($categories as $category)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px;">{{$category->id}}</td>
                    <td style="padding: 12px;">{{$category->category}}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('admin.categoryupdate', $category->id) }}"
                            style="background-color: rgb(239, 172, 2); 
                            color: white;
                            padding: 5px 10px;
                            text-decoration: none; 
                            border-radius: 5px; 
                            font-weight: bold;">
                            Update
                        </a>
                        
                        <a href="{{ route('admin.categorydelete', $category->id) }}"
                            style="background-color: rgb(184, 0, 0); color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; font-weight: bold;"
                            onclick="return confirm('Are you sure!')"
                            >
                            Delete
                        </a>
                    </td>
                </tr>


            @endforeach
        </tbody>
    </table>
@endsection