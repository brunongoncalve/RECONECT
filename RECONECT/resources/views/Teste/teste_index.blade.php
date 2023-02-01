@extends('Template.main')

@section('title', 'Reconect | TESTE')

@section('content')

<form action="{{ route('teste') }}" 
      method="POST" 
      enctype='multipart/form-data'>
    @csrf  
    
<input type="file" 
       id="file" 
       name="file">
<button type="submit" 
        id="BTN" 
        name="BTN"> ENVIAR 
</button>     

</form>

@endsection

@section('scripts')

@endsection