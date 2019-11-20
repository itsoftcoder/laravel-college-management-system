@extends('layouts.app')

@section('title')
    Manage Notices
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Notices</p>
            <a href="{{ route('backend_notice_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add notice</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="noticeTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department id</th>
                    <th>Class id</th>
                    <th>Document</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department id</th>
                    <th>Class id</th>
                    <th>Document</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($notices as $notice)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $notice->name }}</td>

                        @if($notice->department_id <= 0)
                        <td>{{ $notice->department_id }}</td>
                        @else
                            <td>{{ $notice->department->id }} -> {{ $notice->department->name }}</td>
                        @endif

                        @if($notice->class_id <= 0)
                        <td>{{ $notice->class_id }}</td>
                        @else
                            <td>{{ $notice->class->id }} -> {{ $notice->class->name }}</td>
                        @endif

                        <td><img src="{{ Storage::url('notices_photos/'.$notice->document) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $notice->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_notice_edit',$notice->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_notice_delete',$notice->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this notice? ');">Delete</a>
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


