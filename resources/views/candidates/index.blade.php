<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mt-4">
                        @foreach($candidates as $candidate)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $candidate->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $candidate->email}}</h6>
                                        <div class="text-right mt-4">
                                            <a href="{{route('candidate.show', $candidate->id)}}" class="card-link btn btn-primary">See details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $candidates->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
