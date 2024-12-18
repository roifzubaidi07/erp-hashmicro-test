<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white-800">
            {{ __('Customers') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
       
        @if (session('status'))
            <div class="sucess-alert">{{ session('status') ?? ''}} </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        @endif
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-white-200 bg-white p-6">
 
                    <a href="{{ route('customers.create') }}"
                       class="mb-4 inline-flex items-center rounded-md border border-white-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white-700 shadow-sm transition duration-150 ease-in-out hover:bg-white-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                        Create
                    </a>
 
                    <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-white-200">
                            <thead>
                            <tr>
                                <th class="bg-white-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-white-500">Name</span>
                                </th>
                                <th class="w-56 bg-white-50 px-6 py-3 text-left">
                                </th>
                            </tr>
                            </thead>
 
                            <tbody class="bg-white divide-y divide-white-200 divide-solid">
                                @foreach($customers as $customer)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap">
                                            {{ $customer->company->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap">
                                            <a href="{{ route('customers.edit', $customer) }}"
                                               class="inline-flex items-center rounded-md border border-white-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white-700 shadow-sm transition duration-150 ease-in-out hover:bg-white-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                                Edit
                                            </a>
                                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    Delete
                                                </x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>