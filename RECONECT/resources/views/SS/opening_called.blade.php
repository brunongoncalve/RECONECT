@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Solicitações</h2>
    </div>
</div><br>

    <form class="m-t" 
          action="#"
          enctype="multipart/form-data"
          method="POST">
        @csrf

            @if(session('mensagem'))
                <div class="alert alert-success">
                    <p align='center'>{{session('mensagem')}}</p>
                </div>
            @endif 

                <div class="col-lg-5">
                    <div class="ibox ">
                        <div class="ibox-content">

                            <div class="form-group">
                                <label class="font-normal">NOME:</label>
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control"
                                               id="tag_name"
                                               name="tag_name">
                                    </div>
                            </div>
                            <button type="submit" 
                                    class="btn btn-primary block full-width m-b">Salvar
                            </button>

                        </div>
                    </div>
                </div> 
                           
    </form>
</div>

@endsection

@section('scripts')

<script>

</script>

@endsection