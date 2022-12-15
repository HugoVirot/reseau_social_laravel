@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- formulaire ajout message --}}

    <form class="col-10 mx-auto m-4" action="{{ route('message.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <i class="fas fa-pen-fancy text-primary fa-2x me-2"></i><label for="content">écris un truc
                sympa (ou pas !)</label>
            <textarea required class="container-fluid mt-2" type="text" name="content" id="content"
                placeholder="salut les canards !"></textarea>
        </div>

        <div class="row mt-4 mx-auto">
            <div class="col-md-5">
                <i class="fas fa-hashtag text-primary fa-2x me-2"></i><label class="label">ajoute
                    des tags</label>
            </div>
            <div class="col-md-7">
                <input class="form-control" type="text" name="tags" placeholder="salut">
            </div>
        </div>

        <div class="d-grid w-50 mx-auto">
            <button type="submit" class="btn btn-primary mt-4">Quack !</button>
        </div>

    </form>
@endsection
