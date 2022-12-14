@extends('admin.layouts.app')

@section('title', 'Admin User Trash')
@section('main-section')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Admin Trash</h4>
                <a href="{{ route('admin-user.index') }}" class="text-success">Published Users <i class="fa fa-arrow-right"></i></a>
                @include('validate-main')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 data-table-haq">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($all_admin as $per)
                            @if($per -> name !== 'provider')
                            <tr>
                                <td>{{ $loop -> index +1 }}</td>
                                <td>{{ $per -> name }}</td>    
                                <td>
                                    @if($per -> photo == 'avatar.png')
                                    <img style="width:50px; height:50px; object-fit:cover;" src="{{ url('storage/admins/avatar.png') }}" alt="">
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="#" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
                                    
                                    <a href="{{ route('admin.trash.update', $per -> id ) }}" class="btn btn-sm btn-info">Restore User</i></a>
                                    <form action="{{ route('admin-user.destroy', $per -> id) }}" class="d-inline delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete Permanently</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    </div>
</div>

@endsection