
         @extends('layouts.master')
            @section('title')
                Building | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">buildings</li>

            @endsection

            @section('content')

            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Buildings</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../icons/building.png" class="rounded-cricle" style="height: 150px;width: 150px;" />
                        </div>
                        <div class="col-md-8">
                        <p class="lead">
                            This is a buildings page. all building name and description below here.
                            There are many buildings room , hostel , libary details here.So,Your are take good
                            Concept and very good knowllage for this institute.
                        </p>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $buildings = \App\Building::orderBy('id','DESC')->paginate(3);
            @endphp

            @foreach($buildings as $building)
                <div class="card">
                    <div class="card-header"><span>Building Name : </span> {{ $building->name }}</div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                            <tr>
                                <th>Establish Date</th>
                                <td>{{ $building->establish_date }}</td>
                            </tr>

                            <tr>
                                <th>Modifing Date</th>
                                <td>{{ $building->modifing_date }}</td>
                            </tr>

                            <tr>
                                <th>Hostel Name</th>
                                @if($building->hostel <= 0)
                                    <td><p><span>There is no hostel in this building</span></p></td>
                                @else
                                    <td><p><span><a href="#exampleModalScrollable" class="d-block" data-toggle="modal" data-target="#exampleModalScrollable">{{ ucwords($building->hostel->name) }}</a></span></p></td>
                                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Hostel Name : {{ ucwords($building->hostel->name) }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong class="text-success">Description : </strong> {{ ucfirst($building->hostel->description) }}</p>
                                                    <hr>
                                                    <p><strong class="text-success">Updated Date : </strong> {{ $building->hostel->updated_at }}</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <th>Libary Name</th>
                                @if($building->libary->count() <= 0)
                                    <td><p><span>There is no Libary in this building</span></p></td>
                                @else
                                    <td><p><span><a href="#exampleModalScrollable1" class="d-block" data-toggle="modal" data-target="#exampleModalScrollable1">{{ ucwords($building->libary->name) }}</a> </span></p></td>
                                    <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Libary Name : {{ ucwords($building->libary->name) }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url('libarys_photos/'.$building->libary->image) }}" class="card-img-top img-fluid shadow rounded mb-3">
                                                    <p><strong class="text-success">Description : </strong> {{ ucfirst($building->libary->description) }}</p>
                                                    <hr>
                                                    <p><strong class="text-success">Updated Date : </strong> {{ $building->libary->updated_at }}</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <th>Room Here</th>
                                @if($building->rooms->count() <= 0)
                                    <td><p><span>There is no Rooms in this building</span></p></td>
                                @else
                                    <td><p><span><a href="#exampleModalScrollable2" class="d-block" data-toggle="modal" data-target="#exampleModalScrollable2">{{ $building->rooms->count() }}</a> </span></p></td>
                                    <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">There is <span class="text-success font-weight-bold">{{ $building->rooms->count() }} </span> Rooms Here</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach($building->rooms as $room)
                                                        <div class="card mb-2">
                                                            <div class="card-header"><span class="text-success">Room Name : </span> {{ $room->name }}</div>
                                                            <div class="p-2">
                                                                <img src="{{ \Illuminate\Support\Facades\Storage::url('rooms_photos/'.$room->image) }}" class="card-img-top img-fluid shadow rounded">
                                                            </div>
                                                            <div class="card-body">
                                                                <p><strong class="text-success">Room Length : </strong> {{ $room->length }} Meter</p>
                                                                <p><strong class="text-success">Room Width :  </strong> {{ $room->width  }} Meter</p>
                                                                <p><strong class="text-success">Room Height : </strong> {{ $room->height }} Meter</p>
                                                            </div>
                                                            <div class="card-footer"><span class="text-success">Uploded Date : </span>{{ $room->updated_at }}</div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </tr>
                        </table>

                    </div>
                    <div class="card-footer"><span>Uploaded Date : </span> {{ $building->updated_at }}</div>
                </div>
            @endforeach

                <div class="pagination">
                    {{ $buildings->links() }}
                </div>

            @endsection




