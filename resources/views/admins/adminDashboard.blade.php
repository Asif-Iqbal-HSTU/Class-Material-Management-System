@extends('layouts.master')

@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
        
        <a href="#" class="flex flex-col items-center bg-white border border-green-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">            
            <div class="flex flex-col justify-between p-6 leading-normal">
            <img src="{{ asset('images/assigned.png') }}" class="h-10 w-10 mb-2" alt="Logo" />
                <h5 class="mb-2 text-xl font-bold tracking-tight text-green-600 dark:text-white">Add Course</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Honorable chairmans/deans can distribute courses to teachers from here.</p>
            </div>
        </a>

        <a href="#" class="flex flex-col items-center bg-white border border-green-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">            
            <div class="flex flex-col justify-between p-6 leading-normal">
            <img src="{{ asset('images/online-course.png') }}" class="h-10 w-10 mb-2" alt="Logo" />
                <h5 class="mb-2 text-xl font-bold tracking-tight text-green-600 dark:text-white">Add Teacher</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Each courses' details activity can be accessed easily from here.</p>
            </div>
        </a>

        <a href="#" class="flex flex-col items-center bg-white border border-green-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">            
            <div class="flex flex-col justify-between p-6 leading-normal">
            <img src="{{ asset('images/assigned.png') }}" class="h-10 w-10 mb-2" alt="Logo" />
                <h5 class="mb-2 text-xl font-bold tracking-tight text-green-600 dark:text-white">Add Student</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Honorable chairmans/deans can distribute courses to teachers from here.</p>
            </div>
        </a>

    </div>

</div>


@endsection
