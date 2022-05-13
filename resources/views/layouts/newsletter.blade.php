<div>
    @if (session('msgc'))
        <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
    @endif  
    <h5>NEWSLETTER</h5>
    <p>Be the first to know about exciting and upcoming projects, and many more!</p>
    <form action="{{ route('subscribe.subscribe') }}" method="post">
        {{-- Returning false stops the page from reloading --}}
        @csrf
        <div class="p-3"> 
            {{-- <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;"> --}}
            <label>Email</label>
            <input type="email" 
            name="email" 
            class="form-control @error('name') is-invalid @enderror('email')" 
            placeholder="Email" 
            id="email" 
            style="width: 100%;"
            required>
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>              
        <button type="submit" class="btn btn-info pull-right" style="color:aqua;">Subscribe</button>
    </form>
</div>