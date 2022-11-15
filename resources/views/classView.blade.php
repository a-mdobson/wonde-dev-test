@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white text-center py-5">
            <h1 class="my-3">
                Showing students from class {{ $class->name }}
            </h1>

            <table class="table w-50 mx-auto">
                
            @foreach ($students as $student)
            
                    <tr class="border border-grey">
                        <td>
                            {{ $student->surname }}, {{ $student->forename }}
                        </td>
                    </tr>
            @endforeach
            
            </table>

            <a href="{{ route('home') }}">
                <button class="btn rounded-pill btn-outline-primary">Return to employee list</button>
            </a>

        </div>
    </div>
</div>
@endsection