
@extends('layouts.master')

@section('titile')
    Home | Shariatpur Technical School And Collage
@endsection

@section('breadcrumb')

        <li class="breadcrumb-item"><a href="#" class="">Home</a></li>


@endsection

@section('content')




    <div class="card mb-2">
        <div class="card-header">Teachers</div>
        <div class="card-body">
             <img src="../icons/teacher.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />
            <div class="text-center"><strong>Total Teacher : 12</strong></div><hr>
            <div class="">
                <table class="table table-borderless table-hover">
                    <tr>
                        <th>Principal</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Head of Diploma in Engineering</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Rafe Mahamud Khan (Msc in CSE)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Instractor Computer</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Instractor Electrical</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Instractor Electronic</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Instractor Fish Culture</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Head Of Chemistry</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Head Of Mathematics</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Head of Physics</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Juniour Instractor Computer</th>
                        <td>
                            <a href="#" class=" font-italic">Engineer Sanuwere Hossain (Bsc in Mecanical)</a>
                        </td>
                    </tr>
                </table>

               <div class="text-center">
                   <a href="#" class="font-weight-bold text-success text-center">Show All Teachers Click here</a>
               </div>
            </div>
        </div>

    </div>



    <div class="card mb-2">
        <div class="card-header">Students</div>
        <div class="card-body">
            <div class="text-center">
                 <img src="../icons/student.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />
                <strong class="">Total Student : <span class="text-success font-weight-bold">{{ $students->count() }}</span></strong>
                <hr>
                <strong>Diploma in engineering</strong>

                <div class="row">
                    <div class="col">
                        <strong><a href=" {{ route('frontend_student_diploma_8th') }} ">Diploma 8th semester :</a> <span class="text-success">40</span> </strong>
                    </div>
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_7th') }}">Diploma 7th semester :</a> <span class="text-success">30</span></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_6th') }}">Diploma 6th semester :</a> <span class="text-success">34</span></strong>
                    </div>
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_5th') }}">Diploma 5th semester :</a> <span class="text-success">53</span></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_4th') }}">Diploma 4th semester :</a> <span class="text-success">34</span></strong>
                    </div>
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_3rd') }}">Diploma 3rd semester :</a> <span class="text-success">54</span></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_2nd') }}">Diploma 2nd semester :</a><span class="text-success">33</span></strong>
                    </div>
                    <div class="col">
                        <strong><a href="{{ route('frontend_student_diploma_1st') }}">Diploma 1st semester :</a><span class="text-success">32</span></strong>
                    </div>
                </div>

                <hr>
                <strong>Class xii 1st Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_xii_computer_1st') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_electrical_1st') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_electronic_1st') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_fish_culture_1st') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
                <strong>Class xii 2nd Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_xii_computer_2nd') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_electrical_2nd') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_electronic_2nd') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xii_fish_culture_2nd') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
                <strong>Class xi 1st Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_xi_computer_1st') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_electrical_1st') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_electronic_1st') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_fish_culture_1st') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
                <strong>Class xi 2nd Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_xi_computer_2nd') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_electrical_2nd') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_electronic_2nd') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_xi_fish_culture_2nd') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
                <strong>Class x 1st Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href=" {{ route('frontend_student_x_computer_1st') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href=" {{ route('frontend_student_x_electrical_1st') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href=" {{ route('frontend_student_x_electronic_1st') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href=" {{ route('frontend_student_x_fish_culture_1st') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>


                <hr>
                  <strong>Class x 2nd Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_x_computer_2nd') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_x_electrical_2nd') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_x_electronic_2nd') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_x_fish_culture_2nd') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
               <strong>Class ix 1st Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_ix_computer_1st') }} ">Computer :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_electrical_1st') }} ">Electrical :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_electronic_1st') }} ">Electronic :</a> <span class="text-success">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_fish_culture_1st') }} ">Fish Culture :</a> <span class="text-success">34</span></strong>
                </div>

                <hr>
                 <strong>Class ix 2nd Shift</strong>
                <div class="d-flex justify-content-lg-between align-baseline">
                    <strong><a href="{{ route('frontend_student_ix_computer_2nd') }} ">Computer :</a> <span class="text-success pr-1">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_electrical_2nd') }} ">Electrical :</a> <span class="text-success pr-1">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_electronic_2nd') }} ">Electronic :</a> <span class="text-success pr-1">34</span></strong>
                    <strong><a href="{{ route('frontend_student_ix_fish_culture_2nd') }} ">Fish Culture :</a> <span class="text-success pr-1">34</span></strong>
                </div>

        </div>
        </div>

    </div>

    <div class="card mb-2">
        <div class="card-header" title="Department is total count {{ $department->count() }}">Departments</div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-4">
                    <img src="../icons/department.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-lg-between align-baseline">
                        <strong>Computer <span class="text-success"><a href="{{ route('frontend_computer_department') }} ">Details</a></span></strong>
                        <strong>Electrical <span class="text-success"><a href="{{ route('frontend_electrical_department') }}">Details</a></span></strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-lg-between align-baseline">
                        <strong>Electronic  <span class="text-success"><a href="{{ route('frontend_electronic_department') }}">Details</a></span></strong>
                        <strong>Fish Culture <span class="text-success"><a href="{{ route('frontend_fish_culture_department') }}">Details</a></span></strong>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="card mb-2">
        <div class="card-header">Classes</div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-4">
                    <img src="../icons/class.png" class="rounded-circle p-2" style="height: 150px; width: 150px;" />
                </div>
                <div class="col-md-8">

                    <hr><strong><a href="{{ route('frontend_class_diploma') }} ">Diploma in engineer</a></strong><hr>

                    <div class="d-flex justify-content-between align-baseline">
                        <strong><a href="{{ route('frontend_class_xii') }}">Class xii</a></strong>
                        <strong><a href="{{ route('frontend_class_xi') }}">Class xi</a></strong>
                        <strong><a href="{{ route('frontend_class_x') }}">Class x </a></strong>
                        <strong><a href="{{ route('frontend_class_ix') }}">Class ix </a></strong>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="card mb-2">
        <div class="card-header">Accounts</div>
        <div class="card-body text-center">
             <img src="../icons/account.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />

            @php
             $accounts = \App\Account::all();
            @endphp
            @foreach($accounts as $account)
                <h5><strong class="text-success">Name of Account : </strong> {{ ucwords($account->name) }} </h5>

                <p><strong class="text-success">Account Description : </strong> {{ substr($account->description,0,23) }} ......</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                    More Details Click Here
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle"><strong class="text-success">Name of Accounts : </strong> {{ $account->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3 mb-2">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url('accounts_photos/'.$account->image) }}" class="img-fluid shadow rounded w-100" height="300px" alt="Account Photos" title="Account photo">
                                </div>
                                <div class="modal-content">
                                    <table class="table table-hover">
                                        <tr>
                                            <th><span class="text-success">Account Manager : </span> </th>
                                            <td>{{ ucwords($account->manager_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th><span class="text-success">Account Description : </span></th>
                                            <td>{{ ucfirst($account->description) }}</td>
                                        </tr>
                                        <tr>
                                            <th><span class="text-success">Location : </span></th>
                                            <td>{{ ucfirst($account->location) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer clearfix">
                                <span class="float-left">Modified Date : <small>{{ $account->updated_at }}</small></span>
                                <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>


    </div>


    <div class="card mb-2">
        <div class="card-header">Libary</div>
        <div class="card-body text-center">
            <img src="../icons/libary.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" alt="libary photo"/>

            @php
            $libarys = \App\Libary::all();
            @endphp

            @foreach($libarys as $libary)
            <h5><strong class="text-success">Name of Libary : </strong>{{ $libary->name }}</h5>
            <p><strong class="text-success">Book Categorys : </strong>{{ $libary->book_categorys->count() }}</p>
            <p><strong class="text-success">Libary Decription : </strong> {{ substr($libary->description,0,20) }}</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                    More Details Click Here
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle"><strong class="text-success">Name of Libary : </strong> {{ $libary->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class=" mb-2">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url('libarys_photos/'.$libary->image) }}" class="img-fluid shadow rounded w-100" height="300px" alt="Account Photos" title="Account photo">
                                </div>
                                <div class="modal-content">
                                    <table class="table table-hover">
                                        <tr>
                                            @if($libary->building->count() <= 0)
                                                <th><p class="text-danger">There is no building for this libary</p></th>
                                            @else
                                            <th><span class="text-success">Building Name : </span> </th>
                                            <td>{{ ucwords($libary->building->name) }}</td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th><span class="text-success">libary Description : </span></th>
                                            <td>{{ ucfirst($libary->description) }}</td>
                                        </tr>
                                        <tr>
                                            <th><span class="text-success">Book Category count: </span></th>
                                            <td>{{ ucfirst($libary->book_categorys->count()) }}</td>
                                        </tr>
                                        <tr>


                                                <table class="table">
                                                    <tr>
                                                        <th class="text-primary">Category Name </th>
                                                        <th class="text-info">Category Description</th>
                                                    </tr>
                                                @foreach($libary->book_categorys as $book_category)
                                                        <tr>
                                                            <th>{{ $book_category->name }}</th>
                                                            <td>{{ $book_category->description }}</td>
                                                        </tr>
                                                @endforeach
                                                </table>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer clearfix">
                                <span class="float-left">Modified Date : <small>{{ $libary->updated_at }}</small></span>
                                <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

    <div class="card mb-2">
        <div class="card-header">Results</div>
        <div class="card-body text-center">
             <img src="../icons/result.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />
        </div>

    </div>

    <div class="card mb-2">
        <div class="card-header">Notice</div>
        <div class="card-body text-center">
             <img src="../icons/notice.png" class="rounded-circle p-2" style="height: 100px; width: 100px;" />
        </div>

    </div>

@endsection





