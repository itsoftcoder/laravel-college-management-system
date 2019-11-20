@extends('layouts.app')

@section('title')
    Manage Program
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Program</p>
            <a href="{{ route('backend_program_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Program</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="programTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Start time</th>
                    <th>End Time</th>
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
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($programs as $program)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->start_time }}</td>
                        <td>{{ $program->end_time }}</td>
                        <td><img src="{{ Storage::url('programs_photos/'.$program->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $program->description }}</td>
                        <td>{{ $program->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_program_edit',$program->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_program_delete',$program->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this program ? ');">Delete</a>
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


