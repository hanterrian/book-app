<div class="col-md-3 text-end">
    <a href="{{ route('auth.login') }}" class="{{ checkUrl(route('auth.login')) ? 'btn btn-primary' : 'btn btn-outline-primary' }} me-2">Login</a>
    <a href="{{ route('auth.register') }}" class="{{ checkUrl(route('auth.register')) ? 'btn btn-primary' : 'btn btn-outline-primary' }}">Sign-up</a>
</div>
