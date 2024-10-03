<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/job-create.css') }}">

    <form action="{{ route('job.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="form-container">
                <h1 class="form-header text-xl font-semibold">Job Registration</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" class="form-control form-job-create-input" id="job_title" name="job_title" placeholder="Enter job title" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="salary">Salary</label>
                        <input type="number" class="form-control form-job-create-input" id="salary" name="salary" placeholder="Enter salary" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company">Company</label>
                        <select class="form-control form-job-create-input" id="company" name="company" required>
                            <option value="" disabled selected>Select a company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control form-job-create-input" name="city" id="city" placeholder="Enter city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <input type="text" class="form-control form-job-create-input" name="state" id="state" placeholder="Enter State" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Job Description</label>
                    <textarea class="form-control form-job-create-input" name="description" id="description" rows="4" placeholder="Enter job description" required></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary form-job-create-input">Register Job</button>
                </div>
            </div>
        </div>
    </form>

    @include('sweetalert::alert')

</x-app-layout>
