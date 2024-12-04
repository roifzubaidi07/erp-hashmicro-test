<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Transactions') }}
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
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="customers" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Select your customer</label>
                                <select id="customers" name="customer_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" disabled selected>Select customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->company->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="include_ppn" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">PPN?</label>
                                <select id="include_ppn" name="include_ppn" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="setTotal()">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="product" value="Product">
                                  Product
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="product" name="product" value="{{ old('product') }}" type="text">
                                <x-input-error :messages="$errors->get('product')" class="mt-2" />
                              </div>
                            <div class="w-full md:w-1/3 px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qty" value="QTY">
                                QTY
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="qty" name="qty" value="{{ old('qty') }}" onkeyup="setTotal()" type="text" class="block mt-1 w-full" >
                              <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price" value="price">
                                  Price
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="price" name="price" onkeyup="setTotal()" value="{{ old('price') }}" type="text">
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subtotal" value="subtotal">
                                subtotal
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="subtotal" name="subtotal" value="{{ old('subtotal') }}" type="text" class="block mt-1 w-full" readonly>
                              <x-input-error :messages="$errors->get('subtotal')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="total_ppn" value="total_ppn">
                                  Total PPN
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="total_ppn" name="total_ppn" value="{{ old('total_ppn') }}" type="text" readonly>
                                <x-input-error :messages="$errors->get('total_ppn')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="total" value="total">
                                  Total
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="total" name="total" value="{{ old('total') }}" type="text" readonly>
                                <x-input-error :messages="$errors->get('total')" class="mt-2" />
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>