@auth()
    
    <h4> Share yours ideas </h4>
    <div class="row">

        <form action="{{ route('idea.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                @error('content')
                    <span class="fs-6 text-danger mt-2 d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth

@guest()
    <h4>Login to Share your Ideas</h4>
@endguest