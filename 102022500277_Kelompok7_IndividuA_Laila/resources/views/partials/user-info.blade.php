<span>
    Halo, <strong>{{ auth()->user()->username }}</strong> ({{ ucfirst(auth()->user()->role) }})
    <form method="POST" action="{{ route('logout') }}" style="display:inline;margin-left:10px">
        @csrf
        <button type="submit" class="btn" style="padding:5px 10px;font-size:13px">Keluar</button>
    </form>
</span>
