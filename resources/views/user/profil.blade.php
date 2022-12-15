{{-- je me base sur la page app.blade.php --}}
@extends('layouts/app')

{{-- je choisis le titre --}}

@section('title')
Profil de {{ $user->pseudo }}
@endsection

@section('content')
{{-- code principal --}}
<h1>PROFIL</h1>
<p>Profil de {{ $user->pseudo }} </p>
@endsection