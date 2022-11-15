@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white text-center py-5">
            <h1 class="my-3">
                Showing all employees
            </h1>

            <table class="table w-50 mx-auto">

            @foreach ($employees as $employee)
                    <tr class="border border-grey">
                        <td>
                            <a href="{{ route('employeeClasses', ['id' => $employee->id]) }}">
                                {{ $employee->forename }} {{$employee->surname}}
                            </a>
                        </td>
                    </tr>
            @endforeach

            </table>

            <!-- Don't seem to be able to access private meta property for pagination, but I think it would look something like this-->

            {{-- @if ($employees->meta->pagination->next)
                    
                <a href="{{ $employees->meta->pagination->next }}">
                    <button class="btn btn-outline-primary rounded-pill">
                        next
                    </button>
                </a>

            @endif
            @if ($employees->meta->pagination->previous)
                
                <a href="{{ $employees->meta->pagination->previous }}">
                    <button class="btn btn-outline-primary rounded-pill">
                        previous
                    </button>
                </a>
            
            @endif --}}


        </div>
    </div>
</div>
@endsection