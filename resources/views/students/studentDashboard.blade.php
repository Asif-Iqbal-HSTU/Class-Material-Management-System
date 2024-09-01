@extends('layouts.master')

@section('content')
<div class="container mx-auto">
    <div class="w-full mb-5 p-6 bg-green-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mt-2 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user->name}}</h5>
        <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400">{{$user->degree}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Level: {{$user->level}}, Semester: {{$user->semester}}, Session: {{$user->session}}</p>
    </div>

    
    <p class="mt-2 mb-2 pl-2 font-semibold tracking-tight text-gray-900 dark:text-white">Cass Routine</h5>

    <div class="mb-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Day</th>
                    @for ($hour = 8; $hour < 17; $hour += 1.5)
                        <th scope="col" class="px-6 py-3 text-center">
                            {{ date('g:i A', strtotime($hour . ':00')) }} - {{ date('g:i A', strtotime(($hour + 1.5) . ':30')) }}
                        </th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $dayIndex => $day)
                    <tr class="border-b odd:bg-white even:bg-gray-50 dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $day }}
                        </th>
                        @for ($hour = 8; $hour < 17; $hour += 1.5)
                            <td class="px-6 py-4 text-center">
                                @php
                                    $timeSlot = date('g:i A', strtotime($hour . ':00')) . ' - ' . date('g:i A', strtotime(($hour + 1.5) . ':30'));
                                    $class = $routines->where('weekday', $day)->where('time_slot', $timeSlot)->first();
                                @endphp
                                {{ $class ? $class->class_name : '-' }}
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Your Courses</h5>
                <a href="{{ route('gotoStudentCoursesPage') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </a>
            </div>
            <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($courses as $course)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{$course->code}}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{$course->name}}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{$course->type}}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
            </div>
        </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mt-6">
        <a href="#" class="flex flex-col items-center bg-white border border-green-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">            
            <div class="flex flex-col justify-between p-6 leading-normal">
                <img src="{{ asset('images/assigned.png') }}" class="h-10 w-10 mb-2" alt="Logo" />
                <h5 class="mb-2 text-xl font-bold tracking-tight text-green-600 dark:text-white">Student Dashboard</h5>
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
