@extends('layouts.layoutadmin')

@section('content')
    <div class="container mx-auto py-12">
        <div class="card mt-6">
            <div class="card-header flex flex-row justify-between">
                <h1 class="h6">Klas Resultaten PDF Genereren</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.class-results.generate') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="class_year_id" class="block text-sm font-medium text-gray-700">Selecteer Klas</label>
                        <select id="class_year_id" name="class_year_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            @foreach($classYears as $classYear)
                                <option value="{{ $classYear->id }}">{{ $classYear->schoolClass->name.' - '.$classYear->schoolYear->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="period_id" class="block text-sm font-medium text-gray-700">Selecteer Periode</label>
                        <select id="period_id" name="period_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            @foreach($periods as $period)
                                <option value="{{ $period->id }}">{{ $period->period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-teal-500 text-white rounded-md">Genereer PDF</button>
                </form>
            </div>
        </div>
    </div>
@endsection
