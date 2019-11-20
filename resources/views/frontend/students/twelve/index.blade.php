
         @extends('layouts.master')
            @section('title')
                student class xii | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_students') }}" class="">Students</a></li>
                        <li class="breadcrumb-item">Class xii</li>
            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Class xii student divided by shift</div>
                </div>
            <div class="card mb-2">
                <div class="card-header">Computer</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xii_computer_1st') }} ">1st shift</a>
                        <a href="{{ route('frontend_student_xii_computer_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Electrical</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xii_electrical_1st') }}">1st shift</a>
                        <a href="{{ route('frontend_student_xii_electrical_2nd') }} ">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Electronic</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xii_electronic_1st') }} ">1st shift</a>
                        <a href="{{ route('frontend_student_xii_electronic_2nd') }} ">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Fish Culture</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xii_fish_culture_1st') }}">1st shift</a>
                        <a href="{{ route('frontend_student_xii_fish_culture_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>
            @endsection




