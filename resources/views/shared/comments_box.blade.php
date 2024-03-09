<div>
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="content" id="content"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
        
        <div class="d-flex align-items-start">
            <img style="width:35px; height: 35px; object-fit:cover;" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">
                        {{ $comment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted">
                        {{ $comment->created_at }}
                    </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach

</div>