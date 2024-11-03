<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="mb-4">
                                <h5 class="text-xl font-semibold">Candidates's details:</h5>
                            </div>
                            <div class="text-muted">
                                <p><strong>Name:</strong> {{ $candidate->name }}</p>
                            </div>
                            <div class="text-muted">
                                <p><strong>Email:</strong> {{ $candidate->email }}</p>
                            </div>
                            <div class="mb-4">
                            <br>
                            <p class="card-text mt-2" style="max-height: 150px; overflow: hidden; white-space: pre-line;">Technologies: </p>
                                @foreach ($userTechs as $tech)
                                    <li>{{ $tech->value }}</li>
                                @endforeach
                            </div>
                            <div class="text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary form-job-create-input">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
