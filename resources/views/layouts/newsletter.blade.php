<div>
    @if (session('msgc'))
        <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
    @endif  

    <form action="{{ route('subscribe.subscribe') }}" method="post">
        {{-- Returning false stops the page from reloading --}}
        <h5><i class="fa fa-newspaper-o"></i>&nbsp;NEWSLETTER</h5>
        <p>Be the first to know about exciting and upcoming projects, and many more!</p>   
        @csrf
        <input type="email" 
        name="email" id="email" 
        class="form-control @error('name') is-invalid @enderror('email')" 
        placeholder="&#xf0e0; Gmail Account" style="font-family:Arial, FontAwesome"
        required>
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror       
        <button type="submit" class="btn btn-outline-info pull-right m-2">
            <i class="fa fa-bell-o"></i>
            Subscribe
        </button>
    </form> 
</div>