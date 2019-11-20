
         @extends('layouts.master')
            @section('title')
                Mosque | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Mosque</li>

            @endsection

            @section('content')

            <div class="card mb-2">
                <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Mosque</div>
                <img src="../icons/mosque.png" class="card-img-top" >
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Capacity</th>
                            <td>23449</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>Shariatpur technical school and collage left side per distance 100 </td>
                        </tr>
                        <tr>
                            <th>Room</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>high and great</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">Establish date : <?php echo  date('D-M-Y');?></div>
            </div>
            @endsection




