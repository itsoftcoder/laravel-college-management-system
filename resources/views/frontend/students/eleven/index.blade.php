
         @extends('layouts.master')
            @section('title')
                student class xi | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_students') }}" class="">Students</a></li>
                        <li class="breadcrumb-item">Class xi</li>

            @endsection

            @section('content')
                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Class Xi student divided By shift</div>
                </div>

            <div class="card mb-2">
                <div class="card-header">Computer</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xi_computer_1st') }} ">1st shift</a>
                        <a href="{{ route('frontend_student_xi_computer_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Electrical</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xi_electrical_1st') }}">1st shift</a>
                        <a href="{{ route('frontend_student_xi_electrical_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Electronic</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xi_electronic_1st') }}">1st shift</a>
                        <a href="{{ route('frontend_student_xi_electronic_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Fish Culture</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <a href="{{ route('frontend_student_xi_fish_culture_1st') }}">1st shift</a>
                        <a href="{{ route('frontend_student_xi_fish_culture_2nd') }}">2nd shift</a>
                    </div>
                </div>
            </div>
            @endsection




