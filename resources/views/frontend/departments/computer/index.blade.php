
         @extends('layouts.master')
            @section('title')
                computer department | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="">departments</a></li>
                        <li class="breadcrumb-item"><a href="#" class="">computer</a></li>

            @endsection

            @section('content')
                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Department</div>

                      {{-- =====   get department where department equal computer ======== --}}
                        @php
                        $computers = \App\Department::where('name','computer')->get();
                        @endphp

                        {{--  computers department take and work with foreach **
                            **  and assign veriable computer **
                         --}}
                        @foreach($computers as $computer)

                            <div class="p-3">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url('department_photos/'.$computer->image) }}" class="img-fluid card-img-top rounded shadow" style="height: 300px;" title="Computer Department photo" alt="Computer Department photo">
                            </div>
                            <div class="card-body">
                                <p><strong class="text-success">Department Name : </strong> {{ ucfirst($computer->name) }}</p>
                                <p><strong class="text-success">Department Code :</strong> {{ $computer->code }}</p>
                                <p><strong class="text-success">Department Description : </strong> {{ ucfirst($computer->description) }}</p>
                            </div>
                            <div class="card-footer"><span>last updated :<small>{{ $computer->updated_at }}</small></span></div>
                         @endforeach
                </div>
            @endsection




