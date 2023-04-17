@extends('Template.main')

@section('title', 'Relatorio de Impressões')

@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-success float-left">IMPRESSÕES MENSAIS</span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">35.000 <small>de</small> 35.000</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                            <small>Total de impressões</small>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection

@section('scripts')

@endsection