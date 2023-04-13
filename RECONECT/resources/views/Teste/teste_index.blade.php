@extends('Template.main')

@section('title', 'Reconect | TESTE')

@section('content')

<form action="{{ route('export') }}" 
      method="POST" 
      enctype='multipart/form-data'>
    @csrf

<input type="date" name="bruno" id="bruno" value="{{ old('bruno') }}" > 

    
<button type="submit"> TESTE </button>     

</form>


@endsection

@section('scripts')

@endsection