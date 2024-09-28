
@extends('layouts.admin')
@section('title','Manage Permissions')
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Asset</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Room Type</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
<style>
    .table tr td{
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="left pull-left">
                    {{-- <a href="#" class="btn btn-warning rounded">Permission</a> --}}
                    <button type="button" data-bs-toggle="modal" data-bs-target="#permissionModal" class="btn btn-info rounded mr-5 btn-sm">Add Permission</button>
                    <a href="{{route('roles.index')}}" class="btn btn-success rounded mr-5 btn-sm">Roles</a>
                    <a href="{{route('users.index')}}" class="btn btn-success rounded btn-sm">Users</a>
                </div>
                <div class="right pull-right">
                </div>

            </div>
            <div class="card-body">
                <p class="mb-4"><span class="text-warning">* Warning: </span> Make a permission name like <span class="text-warning">Type + ( Permission For )</span>.
                    You can add 4 types of permission ( Create, Update, Delete, View ). If you need other type contact technical team. <br>
                    <span class="text-success">Example: ( Create Order or Update Order )</span>

                    {{-- Bulk Delete btn --}}
                    <form id="bulkDeleteForm" method="POST" action="{{ route('permissions.bulk_delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger mb-4 delete" id="bulkDeleteButton" style="display: none;">Delete Selected</button>
                    </form>
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll">
                            </th>
                            <th>#</th>
                            <th>Permission Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_permissions[]" value="{{$permission->id }}" class="selectCheckbox">
                            </td>
                            <td>{{$key + 1}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                @if($permission->name =='Super Admin')
                                <form class="deleteForm" action="{{ url('/dashboard/permissions/'.$permission->id.'/delete') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#"  class="btn btn-sm font-sm rounded btn-info edit d-none"
                                    data-bs-toggle="modal" data-bs-target="#roleUpdateModal" data-permission-id="{{ $permission->id}}">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-danger rounded delete d-none">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </form>
                                @else
                                <form class="deleteForm" action="{{ url('/dashboard/users/permissions/'.$permission->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#"  class="btn btn-sm font-sm rounded btn-info edit mr-5"
                                    data-bs-toggle="modal" data-bs-target="#permissionUpdateModal" data-permission-id="{{ $permission->id}}">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-danger rounded delete">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
    </div>
</div>
</main>
@include('admin.user-role.permission.edit')
@include('admin.user-role.permission.create')

@endsection
@push('script')
<script>
$(document).ready(function() {

    $('#selectAll').on('change', function() {
        $('.selectCheckbox').prop('checked', this.checked);
        // toggleBulkDeleteButton();
    });

    $('.selectCheckbox').on('change', function() {
        if ($('.selectCheckbox:checked').length === $('.selectCheckbox').length) {
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
        // toggleBulkDeleteButton();
    });

    function toggleBulkDeleteButton() {
        if ($('.selectCheckbox:checked').length > 0) {
            $('#bulkDeleteButton').show();
        } else {
            $('#bulkDeleteButton').hide();
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        // Edit permission
    $(document).on('click', '.edit', function (e) {
        e.preventDefault();
        var permissionId = $(this).data('permission-id');

        var editURL = "{{url('')}}"+ '/dashboard/users/permissions/'+permissionId+'/edit';
        // console.log(editURL);

        $.ajax({
            url: editURL,
            method: 'GET',
            data: {
                id: permissionId,
            },
            success: function (response) {
                $('#permission_id').val(response.permission.id);
                $('#permission_name').val(response.permission.name);
            }
        });
    });

    //Store permissions
    $("#permissionStoreForm").submit(function (e) {
        e.preventDefault();

        const data = new FormData(this);
        // console.log(data);
        $.ajax({
            url: '{{url('/dashboard/users/permissions')}}',
            method: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status == 200) {
                    // location.reload();
                $.Notification.autoHideNotify('success', 'top right', 'Success', 'Permission added successfully.');

                // Clear the form for the next input
                $("#permissionStoreForm")[0].reset();

                // Show the modal again for the next permission
                $("#permissionModal").modal('show');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                $.Notification.autoHideNotify('danger', 'top right', 'Danger', xhr.responseJSON.errors.name[0]);
                $("#permissionModal").modal('hide');
            }
        })
    });

    //Update Role
    $("#permissionUpdateForm").submit(function (e) {
        e.preventDefault();
        const data = new FormData(this);
        var permissionId = $('#permission_id').val();
        console.log(permissionId);
        console.log(data);

        $.ajax({
            url: '{{url('dashboard/users/permissions/')}}'+'/'+permissionId,
            method: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                // console.log(res);
                if (res.status == 200) {
                    // $("#sliderEditModal").modal('hide');
                    location.reload();
                }
                // else{
                //     $.Notification.autoHideNotify('danger', 'top right', 'Danger', res);
                // }
            },
            error: function (xhr, textStatus, errorThrown) {
                $.Notification.autoHideNotify('danger', 'top right', 'Danger', xhr.responseJSON.errors.name[0]);
                $("#roleUpdateModal").modal('hide');
            }
        })
    });

    $('.delete').on('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior

        var form = $(this).closest('form');
        var url = form.attr('action');
        var row = $(this).closest('tr');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: form.serialize(),
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.success,
                            'success'
                        );
                        row.remove(); // Remove the row from the table
                    },
                    error: function(response) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the permission.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    $('#bulkDeleteButton').on('click', function(event) {
        event.preventDefault(); // Prevent the default button behavior

        var form = $('#bulkDeleteForm');
        var url1 = form.attr('action');
        console.log(url1);

        var selectedPermissions = [];
        $('.selectCheckbox:checked').each(function() {
            selectedPermissions.push($(this).val());
            console.log(selectedPermissions);
        });

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url1,
                    type: 'DELETE',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'selected_permissions': selectedPermissions
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.success,
                            'success'
                        );
                        $('.selectCheckbox:checked').closest('tr').remove(); // Remove selected rows from the table
                        $('#selectAll').prop('checked', false); // Uncheck the select all checkbox
                        toggleBulkDeleteButton(); // Hide the bulk delete button
                    },
                    error: function(response) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the permissions.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
// $(document).ready(function{


    // document.querySelectorAll('.delete').forEach(function (element) {
    //     element.addEventListener('click', function (event) {
    //         event.preventDefault(); // Prevent the default link behavior

    //         var form = this.closest('form');

    //         Swal.fire({
    //             title: 'Are you sure?',
    //             text: 'You won\'t be able to revert this!',
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //             // If confirmed, submit the corresponding form
    //             if (result.isConfirmed) {
    //                 form.submit();
    //             }
    //         });
    //     });
    // });
// });

</script>
@endpush
