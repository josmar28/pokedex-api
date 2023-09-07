@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Move Lists</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <a class="breadcrumb-item" href="{{ asset('home')}}" class="text-muted">Home</a>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Move Lists</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="hr-info-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-subtitle">&nbsp;</h6>
                                <div class="form-group">
                                <button class="btn waves-effect waves-light btn-rounded btn-info" data-toggle="modal" data-target="#add-move-modal"><i class="fas fa-plus-circle"></i>&nbsp;Add Move</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid move-body">
    <div class="text-center">
       
    </div> 
</div>
@include('move.modals.move')
@endsection
@section('js')
@include('move.scripts.move')
@endsection
