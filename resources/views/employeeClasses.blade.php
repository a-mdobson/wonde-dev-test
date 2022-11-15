@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white text-center py-5">
            <h1 class="my-3">
                Hi, {{ $employee }}! Here is your current class list
            </h1>

            <table class="table w-50 mx-auto">
    
            @if ($classes)
            
                @foreach ($classes as $class)
                
                        <tr class="border border-grey">
                            <td>
                                <a href="{{ route('classView', ['id' => $class->id]) }}">
                                    {{ $class->name }}
                                </a>
                            </td>
                        </tr>
                @endforeach

            @else
                <h2 class="mt-5">You currently have no classes to show</h2>
                <h3 class="mb-5">Enjoy your child-free week!</h3>
            @endif
            
            </table>
            <a href="{{ route('home') }}">
                <button class="btn rounded-pill btn-outline-primary">Return to employee list</button>
            </a>
        </div>
    </div>
</div>
@endsection