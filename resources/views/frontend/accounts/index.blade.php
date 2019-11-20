
@extends('layouts.master')
@section('title')
    accounts | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">Accounts</a></li>

@endsection

@section('content')


<div class="card mb-2">
    <div class="card-header" style="background: linear-gradient(#EED3D7,#f1a899,#EED3D7)">Accounts </div>
    <img src="" class="card-img-top img-fluid"/>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <img src="../icons/account.png" class="rounded-circle" style="height:100px; width: 100px;" alt="account logo icons" title="account logo"/>
            </tr>
            @php
                $accounts = \App\Account::all();
            @endphp
            @foreach($accounts as $account)
                <tr>
                    <div class="mb-2 mt-2">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('accounts_photos/'.$account->image ) }}" class="rounded shadow img-fluid" style="height:300px;" alt="account photo" title="account photo"/>
                    </div>
                </tr>
                <tr>
                    <th>Account name </th>
                    <td>{{ $account->name }}</td>
                </tr>
                <tr>
                    <th>Manager name </th>
                    <td>{{ $account->manager_name }}</td>
                </tr>
                <tr>
                    <th>Location :</th>
                    <td>{{ $account->location }}</td>
                </tr>
                <tr>
                    <th>Description : </th>
                    <td>{{ $account->description }}</td>
                </tr>

            @endforeach

        </table>
    </div>
    <div class="card-footer"><span>Last updated : <small></small></span></div>
</div>
@endsection




