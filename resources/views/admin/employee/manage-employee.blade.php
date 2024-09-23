@extends('layouts.admin')
@section('title','Manage Employee')
@section('content')
<!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Employee</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Manage Employee</h5>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Sl</th>
                                <th>Employee Name</th>
                                <th>Employee ID</th>
                                <th>Designation</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key => $employee)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 cursor-pointer">
                                        <img src="{{asset('storage/employee/image/'.$employee->passport_photo)}}" class="rounded-circle" width="44"
                                            height="44" alt="">
                                        <div class="">
                                            <p class="mb-0">{{$employee->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$employee->employee_code}}</td>
                                <td>{{$employee->designation->designation_name}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('employee.show',$employee->id)}}" class="text-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{route('employee.edit',$employee->id)}}" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}"
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-danger border-0 bg-transparent p-0 delete-btn"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<!--end page main-->
@endsection
@push('script')
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
