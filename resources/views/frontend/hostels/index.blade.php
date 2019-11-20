
         @extends('layouts.master')
            @section('title')
                Hostels | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Hostels</li>

            @endsection

            @section('content')
            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Hostels</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../icons/hostel.png" class="rounded-cricle" style="height: 150px;width: 150px;"/>
                        </div>
                        <div class="col-md-8">
                            <p class="lead">
                                This is a hostels page. all hostel name and description below here.
                                How many hostels room , building , student details here.So,Your are take good
                                Concept and very good knowelage for this institute.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                @php
                $hostels = \App\Hostel::orderBy('id','DESC')->paginate(3);
                @endphp

                @foreach($hostels as $hostel)
                <div class="card">
                    <div class="card-header"><span class="text-success">Hostel Name : </span> {{ $hostel->name }}</div>
                    <div class="card-body">
                        <p><strong class="text-success font-weight-bold">Description : </strong> <span class="lead">{{ $hostel->description }}</span></p>
                        <hr>

                        @if($hostel->building <= 0 )
                            <p><strong class="text-danger font-weight-bold">There is no building here</strong></p>
                        @else
                        <p><strong class="text-success">Building Name : </strong> <a href="#exampleModalScrollable" class="" data-toggle="modal" data-target="#exampleModalScrollable">{{ $hostel->building->name }}</a></p>

                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle"><span class="text-success">Building Name : </span>{{ ucwords($hostel->building->name) }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong class="text-success">Building Establish Date : </strong> {{ $hostel->building->establish_date }}</p>
                                        <hr>
                                        <p><strong class="text-success">Building Modifing Date : </strong> {{ $hostel->building->modifing_date }}</p>
                                        <hr>
                                        <p><strong class="text-success">Uploaded Date : </strong> {{ $hostel->building->updated_at }}</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>
                    <div class="card-footer"><span class="text-success">Uploaded Date : </span>{{ $hostel->updated_at }}</div>
                </div>
                @endforeach

                <div class="pagination d-flex justify-content-center align-content-center">
                    {{ $hostels->links() }}
                </div>
            @endsection




