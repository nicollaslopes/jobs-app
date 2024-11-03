<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <form action="{{ route('my.profile.store') }}" method="POST">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h5 class="text-xl font-semibold mb-4">Technologies:</h5>
                        <input type="text" id="techSearch" placeholder="Search technologies..." class="mb-4 p-2 border border-gray-300 rounded-md w-full" oninput="filterTechnologies()">

                        <div id="techList" class="flex flex-wrap mb-4">
                            @foreach ($techs as $tech)
                                <div class="mr-4 tech-item">
                                    <input type="checkbox" id="{{ strtolower(str_replace(' ', '_', $tech['name'])) }}" name="technologies[{{ $tech['value'] }}]" value="{{ $tech['name'] }}" class="mr-2" @if ($tech["checked"]) checked @endif>
                                    <label for="{{ strtolower(str_replace(' ', '_', $tech['value'])) }}" class="text-gray-700">{{ $tech['value'] }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-right mt-6">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-2">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('sweetalert::alert')

    <script>
        function filterTechnologies() {
            const input = document.getElementById('techSearch').value.toLowerCase();
            const techItems = document.querySelectorAll('.tech-item');

            techItems.forEach(item => {
                const label = item.querySelector('label').innerText.toLowerCase();
                item.style.display = label.includes(input) ? 'flex' : 'none';
            });
        }
    </script>
</x-app-layout>
