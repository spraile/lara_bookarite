@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                @include('titles.includes.title-card')
                @can('isAdmin')
                @include('assets.includes.asset-table')
                    
                @endcan
                
            </div>
        </div>
    </div>
@endsection