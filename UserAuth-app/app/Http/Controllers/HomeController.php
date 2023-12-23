<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard page.
    public function home()
    {
        try
        {
            $data = [];
            
            if(auth()->check())
            {
                $employees =  Employee::all();


                if(empty($employees->toArray()))
                {
                    return [];
                }


                // Employees where salary is less than 60k. Type A


                $employeeTypeA = (new EmployeeService)->getEmployeeTypeA($employees);


                // Employees where salary is more than 60k and less than 100k. Type B


                $employeeTypeB = (new EmployeeService)->getEmployeeTypeB($employees);


                // Employees where salary is more than  100k. Type C


                $employeeTypeC = (new EmployeeService)->getEmployeeTypeC($employees);


                $data = [
                    'typeA' => $employeeTypeA,
                    'typeB' => $employeeTypeB,
                    'typeC' => $employeeTypeC,
                ];
               
                return view('home')->with('data', $data);

            }
            
            return $data;
           
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }


        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
