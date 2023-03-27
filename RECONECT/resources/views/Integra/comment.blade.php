<style>
.social-footer {
    border-radius: 15px;
}

.form-control {
    border-radius: 10px;
}

.hide {
    display: none;
}
</style>

@if($comments)
@if($comments->count() > 0)

@foreach($comments as $comment)

<div class="social-footer" id="div_comment_{{ $comment->id }}">
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
            @if($comment->users_id == auth()->user()->id)    
                <a onclick="deleteComment('{{ $comment->id }}', '{{ $id_post }}')">
                    <i class="fa fa-trash-o pull-right text-danger"></i>
                </a>
            @endif
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

function deleteComment(id_comment, id_post)
{
    if(confirm("DESEJA RELAMENTE EXCLUIR ESSE COMENTARIO ?")) {
        requisicao('{{ route('delete_comment') }}', 'POST', id_comment, id_post)
        .then(result => {
            $('#save_'+id_post).html(result);
            let num_comment = document.getElementById(`num_comment_${id_post}`);
            num_comment.textContent = parseInt(num_comment.textContent) - 1;
            let div = document.getElementById(`div_comment_${id_comment}`);
            div.innerText = "";

        }).catch(error => {
            console.log(error);
        }); 
    } else {
        return false;
    }
}

</script>