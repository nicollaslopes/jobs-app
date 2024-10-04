<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>

    <form action="{{ route('job.application.create', $job->id) }}" method="POST">
    @csrf
        <input type="hidden" value={{ $job->id}} name="job_id">
        <div class="py-12">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h1 class="font-bold text-2xl">{{ $job->title }}</h1>
                                @if (Auth::user()->role == "user") 
                                    <button class="btn btn-success" type="submit">Apply</button>
                                @endif
                            </div>
                            <div class="mb-4">
                                <h5 class="text-xl font-semibold">Job Description</h5>
                                <p class="card-text mt-2" style="max-height: 150px; overflow: hidden; white-space: pre-line;">{{ $job->description }}</p>
                            </div>
                            <div class="text-muted">
                                <p><strong>Location:</strong> {{ $job->city }}, {{ $job->state }}</p>
                            </div>
                            <div class="text-muted">
                                <p><strong>Salary:</strong> {{ $job_salary }}</p>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary form-job-create-input">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('sweetalert::alert')

</x-app-layout>
