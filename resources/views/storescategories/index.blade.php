@extends('adminlte::page')

@section('title', 'Stores Categories')

@section('css')
    <link rel="stylesheet" href="/css/tablecrud.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@stop

@section('js')
    <script> 
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip(); 
    
    //Popup Alert Modal when Page Loads
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    
    </script>
@stop

@section('content')

 <!-- Flash a Message! That is: If content was added, edited or deleted -->
@if (session('status'))
    <!-- An Alert Modal for Successfull adds, edits and deletes -->
    @include('storescategories.modals.alert')
@endif

@if (session('error'))
    <!-- An Alert Modal for Errors -->
    @include('storescategories.modals.error')
@endif

        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Store Categories</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
                </div>
            </div>
        </div>
    <table class="table table-hover table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Notes</th>
                <th scope="col">Updated By</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Updated</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($storescategories as $storescategory)
            <tr>               
                <td>{{ $storescategory->CategoryID }}</td>
                <td>{{ $storescategory->CategoryName }}</td>
                <td>{{ $storescategory->Notes }}</td>
                <td>{{ $storescategory->UpdatedBy }}</td>
                <td>{{ $storescategory->created_at }}</td>
                <td>{{ $storescategory->updated_at }}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination for the Table -->
    <div class="pagination">     
            {{ $storescategories->links() }}    
    </div>


    <!-- Add Modal Form -->
	@include('storescategories.modals.add')

    <!-- Edit Modal Form -->
	@include('storescategories.modals.edit')

    <!-- Delete Modal Form -->
	@include('storescategories.modals.delete')

@stop