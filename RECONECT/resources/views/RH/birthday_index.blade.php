@extends('Template.main')

@section('title', 'Reconect | Aniversariantes')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista Aniversariantes</h2>
    </div>
</div><br>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        @foreach($birthdays as $birthday)
            @if($birthday->birth == TRUE)
                <div class="col-lg-4">
                    <div class="contact-box">
                        <div class="col-4">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-b" width="80px" src="img/profile/{{ $birthday->photo }}">
                                    <h3 align="center"><strong>{{ $birthday->name }}</strong></h3>
                                    <div class="m-t-xs font-bold">{{ $birthday->department }}</div>
                                    <p>DIA: {{ date('d/m', strtotime($birthday->birth)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
             @endif
        @endforeach 
    </div>
</div>  
 
       
           
            
            
           
            
           
            
           
            
           
            
           
           
            </div>
        </div>


@endsection

@section('scripts')

@endsection