@extends('layouts.app')

@section('title')
    Manage Account
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Account</p>
            <a href="{{ route('backend_account_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Account</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="accountTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($accounts as $account)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->manager_name }}</td>
                        <td>{{ $account->location }}</td>
                        <td><img src="{{ Storage::url('accounts_photos/'.$account->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $account->description }}</td>
                        <td>{{ $account->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_account_edit',$account->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_account_delete',$account->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this account ? ');">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer"><span>Last Updated : <small></small></span></div>
    </div>

@endsection


