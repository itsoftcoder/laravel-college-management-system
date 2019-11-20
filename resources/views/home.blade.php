@extends('layouts.app')

@section('content')

            <div class="card">

                <div class="card-body bg-secondary rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <div class="p-3 shadow rounded bg-white">
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Students</a> </th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $students->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Teachers</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $teachers->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Departments</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $departments->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Classes</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $classes->count() }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <div class="p-3 shadow rounded bg-white">
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Accounts</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $accounts->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Buildings</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $buildings->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Libarys</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $libarys->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Gardens</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $gardens->count() }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 shadow rounded bg-white">
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Book Categorys</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $book_categorys->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Books</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $books->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Hostels</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $hostels->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <th><a href="" class="d-block text-decoration-none text-dark">Rooms</a></th>
                                        <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $rooms->count() }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>



                        <div class="row mt-3">
                            <div class="col-md-4 mb-1">
                                <div class="p-3 shadow rounded bg-white">
                                    <table class="table table-borderless table-hover">
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Notices</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $notices->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Driving Students</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $driving_students->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Gests</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $gests->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Magazines</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $magazines->count() }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="p-3 shadow bg-white rounded">
                                    <table class="table table-borderless table-hover">
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Programs</a></th>
                                            <td class="text-success font-weight-bold text-right "><span class="rounded-circle bg-dark p-2">{{ $programs->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Driving Teachers</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $driving_teachers->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Pools</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $pools->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Photos</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $photos->count() }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 shadow bg-white rounded">
                                    <table class="table table-borderless table-hover">
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Driving Courses</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $driving_courses->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Videos</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $videos->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Labs</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $labs->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th><a href="" class="d-block text-decoration-none text-dark">Others</a></th>
                                            <td class="text-success font-weight-bold text-right"><span class="rounded-circle bg-dark p-2">{{ $classes->count() }}</span></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body bg-secondary rounded">
                    <div class="p-2 bg-white rounded shadow-sm" id="regions_div" style="width: 100%; height: 400px;"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-body bg-secondary rounded">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <div class="bg-white rounded shadow-sm" id="curve_chart" style="width: 100%; height: 300px"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white rounded shadow-sm" id="chart_div" style="width: 100%; height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages':['geochart'],
                    // Note: you will need to get a mapsApiKey for your project.
                    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
                    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
                });
                google.charts.setOnLoadCallback(drawRegionsMap);

                function drawRegionsMap() {
                    var data = google.visualization.arrayToDataTable([
                        ['Content', 'Row Count'],
                        ['Students', {{ $students->count() }}],
                        ['Teachers', {{ $teachers->count() }}],
                        ['Departments', {{ $departments->count() }}],
                        ['Class', {{ $classes->count() }}],
                        ['Notice', {{ $notices->count() }}],
                        ['Labs', {{ $labs->count() }}]
                    ]);

                    var options = {};

                    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                    chart.draw(data, options);
                }
            </script>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Department', 'first shift', 'second shift'],
                        ['Computer',  1000,      400],
                        ['Electrical',  1170,    460],
                        ['Electronic',  660,    1120],
                        ['fish Culture',  1030,  400]
                    ]);

                    var options = {
                        title: 'Student Record Details',
                        curveType: 'function',
                        legend: { position: 'bottom' }
                    };

                    var chart = new google.visualization.lineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
            </script>


            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        ['2013',  1000,      400],
                        ['2014',  1170,      460],
                        ['2015',  660,       1120],
                        ['2016',  1030,      540]
                    ]);

                    var options = {
                        title: 'Company Performance',
                        hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                        vAxis: {minValue: 0}
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
@endsection
