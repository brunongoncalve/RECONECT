<style>
.social-footer {
    border-radius: 15px;
}

.form-control {
    border-radius: 10px;
}
</style>

@if($comments)
@if($comments->count() > 0)

@foreach($comments as $comment)

<div class="social-footer">
    <div class="social-comment">
        <a href="#" class="float-left">
            <img class="rounded-circle" 
                 alt="image" 
                 src="img/profile/{{ $comment->userComment->photo }}">
        </a>
        <div class="media-body">
            <a href="#">
                {{ $comment->userComment->name }}
            </a><br>
                {!! $comment->comment  !!}
            <a onclick="deleteComent('{{ $comment->id }}')"><i class="glyphicon-trash mao pull-right text-danger m-1"></i>
            </a>
        </div>
    </div>
</div>

@endforeach

@endif
@endif

<div id="save_{{ $id_post }}"> 
    <div class="panel-footer">
        <div class="form-group row"> 
            <img class="rounded-circle" 
                 src="img/profile/{{ auth()->user()->photo }}" 
                 style="max-height: 40px;" 
                 alt="image">
            <div class="col-md-11">                
                <input class="form-control comment"
                       id="{{ $id_post }}" 
                       placeholder="Faça um comentario..."> 
            </div>
        </div>
    </div>    
</div>

<script>

$('.comment').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13') {
               requisicao('{{ route('save_comment') }}', 'POST', this.id,this.value)
               .then(result => {
                    $('#save_'+this.id).html(result); 
                    let num_comment = document.getElementById(`num_comment_${this.id}`);
                    num_comment.textContent = parseInt(num_comment.textContent) + 1;

                    }).catch(error => {
                        console.log(error);
                }); 
        }
});

</script>