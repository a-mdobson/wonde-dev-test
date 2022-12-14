<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Wonde\Endpoints\Employees;

$school_id = "A1930499544";
// $response = Http::withToken(access_token)->get("https://api.wonde.com/v1.0/schools/{$school_id}/employees");
// var_dump($response->body());

class ApiCallsController extends Controller
{
    public function __construct()
    {
        $this->client = new \Wonde\Client(env('UNIQUE_AUTH_KEY'));
    }

    public function schoolIndex() {
        $employees = $this->client->school(env('UNIQUE_SCHOOL_KEY'))->employees->all(
            ['employment_details'],
            // ["per_page" => 10]        //meta property is private, couldn't find a workaround for the time it would've taken.
        ); 

        /*--Used the below as opposed to using pagination for better usability */

        $current_employees = [];
        
        foreach ($employees as $employee){
            $employee_details = $employee->employment_details->data; //avoid repetition on line below

            //If current and is a teacher, add to current employees array
            $employee_details->current && $employee_details->teaching_staff ? array_push( $current_employees, $employee ) : ''; 
        }
        
        $employees_sorted = [];

        foreach ($current_employees as $employee){
        $ref = $employee->forename . $employee->surname;
            $employees_sorted[$ref]=$employee;
        }

        ksort($employees_sorted);
        
        return view('employees', ['employees' => $employees_sorted]);
    }

    public function classesForEmployee($employeeId){
        $employee = $this->client->school(env('UNIQUE_SCHOOL_KEY'))->employees->get(
            $employeeId,
            ['classes']
        ); 

        $employeeName = $employee->forename;
        $employeesClasses = $employee->classes->data;
        
        return view('employeeClasses', ['employee' => $employeeName, 'classes' => $employeesClasses]);
    }

    public function studentsInClass($classId){
        $class = $this->client->school(env('UNIQUE_SCHOOL_KEY'))->classes->get(
            $classId,
            ['students'],
        );
        


        $students = $class->students->data;
        
        return view('classView', ['class' => $class, 'students' => $students]);
    }
}

