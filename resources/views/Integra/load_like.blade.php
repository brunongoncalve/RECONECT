<style>
.social-footer {
    border-radius: 15px;
}

.form-control {
    border-radius: 10px;
}
</style>

@foreach($loadLike as $like)

<div class="social-footer" align='center'>
    <img class="rounded-circle" 
        alt="image" 
        src="img/profile/{{ $like->userLike->photo }}" 
        style="max-height: 40px;">
            <strong class="ml-3">{{ $like->userLike->name }}</strong>
</div>

@endforeach