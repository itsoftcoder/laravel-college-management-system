
         @extends('layouts.master')
            @section('title')
                Gests | Shariatpur Technical school and collage
            @endsection
            <style>
                .defualt-img{
                    position: absolute;
                    top:90px;
                    left: 20px;
                }
                .defualt-img-modal{
                    position: absolute;
                    top: 60px;
                    left: 40px;
                }
            </style>

            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Gest</li>

            @endsection

            @section('content')
            <div class="card">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Gest</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../icons/images.png" class="rounded-circle" style="height: 150px;width: 150px;"/>
                        </div>
                        <div class="col-md-8">
                            <p class="lead">
                                This is a gets page. all gest name and about  below here.
                                How many time he/she alive here. His/Her skills ,address,join time and other details here.
                                So,Your are take good
                                Concept and very good knowelage for this institute.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @php
            $gests = \App\Gest::orderBy('id','DESC')->paginate(4);
            @endphp

            @foreach($gests as $gest)
                <div class="card mb-2 mt-2">
                    <div class="card-header"><span class="text-success">Gest Name : </span> {{ $gest->name }}</div>

                    <div class="p-3">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/default.jpg') }}" class="card-img-top img-fluid shadow rounded " alt="Gest Teacher photo" style="height: 270px;" />
                    </div>
                    <div class="defualt-img">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/'.$gest->image) }}" class="card-img-top img-fluid shadow rounded-circle p-1" alt="Gest Teacher photo" style="height: 180px; width: 180px;" />
                    </div>

                    <div class="card-body">
                     <p><span class="text-success">Skills :</span> {{ ucfirst($gest->skills) }}</p>

                      <p><a href="#exampleModalScrollable" data-toggle="modal" data-target="#exampleModalScrollable" class="d-block shadow-sm p-2 text-center">More details here .............</a> </p>

                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle"><strong class="text-success">Gest Name : </strong> {{ ucwords($gest->name) }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="p-3">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/default.jpg') }}" class="card-img-top img-fluid shadow rounded " alt="Gest Teacher photo" style="height: 270px;" />
                                        </div>
                                        <div class="defualt-img-modal">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/'.$gest->image) }}" class="card-img-top img-fluid shadow rounded-circle" alt="Gest Teacher photo" style="height: 180px; width: 180px;" />
                                        </div>

                                        <table class="table table-borderless">
                                            <tr>
                                                <th class="text-success">Address</th>
                                                <td>{{ ucfirst($gest->address) }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success">Skills</th>
                                                <td>{{ ucfirst($gest->skills) }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success">Join Date</th>
                                                <td>{{ $gest->start_date }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success">Left Date</th>
                                                <td>{{ $gest->end_date }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success">About</th>
                                                <td>{{ ucfirst($gest->description) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer"><span>Last Updated : </span> {{ $gest->updated_at }}</div>
                </div>
            @endforeach

                <div class="pagination d-flex justify-content-center align-content-center">
                    {{ $gests->links() }}
                </div>
            @endsection




