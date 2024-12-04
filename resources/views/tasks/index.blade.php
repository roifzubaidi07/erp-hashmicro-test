<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Task 2') }}
        </h2>
    </x-slot>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
@endif
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="input_1" value="input_1">
                                  Input 1
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="input_1" name="input_1" value="{{ old('input_1') }}" type="text" onkeyup="setPercent()">
                                <x-input-error :messages="$errors->get('input_1')" class="mt-2" />
                              </div>
                            <div class="w-full md:w-1/3 px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="input_2" value="input_2">
                                Input 2
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="input_2" name="input_2" value="{{ old('input_2') }}" onkeyup="setPercent()" type="text" class="block mt-1 w-full" >
                              <x-input-error :messages="$errors->get('input_2')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="hasil" value="hasil">
                                  Hasil (%)
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="hasil" name="hasil" onkeyup="setPercent()" value="{{ old('hasil') }}" type="text" readonly>
                                <x-input-error :messages="$errors->get('hasil')" class="mt-2" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>