 <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>@yield('title')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
