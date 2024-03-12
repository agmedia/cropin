@if(session('success'))
    <!-- Success alert -->
    <div class="notification success " role="alert">

        <p>{{ session('success') }}</p>
    </div>

@endif
@if(session('error'))
    <p class="notification  reject" role="alert">

        <p>{{ session('error') }}</p>
    </div>

@endif
@if(session('warning'))
    <div class="notification waitforreview" role="alert">

        <p>{{ session('warning') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
