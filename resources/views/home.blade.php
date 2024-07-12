@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
.card{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.card-header{
    background-color: rgb(75 75 75) !important;
}
</style>
