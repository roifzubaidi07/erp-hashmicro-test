<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full border divide-y divide-gray-200">
                        <tr>
                            <th class="bg-gray-50 px-6 py-3 text-left"><span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Customer</span></th>
                            <th class="bg-gray-50 px-6 py-3 text-left"><span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Barang</span></th>
                            <th class="bg-gray-50 px-6 py-3 text-left"><span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">QTY</span></th>
                            <th class="bg-gray-50 px-6 py-3 text-left"><span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Subtotal</span></th>
                            </tr>
                            <?php $temp_customer_id = '' ?>
                            @foreach($customers as $customer)
                                @foreach($transactions as $transaction)
                                    @if($customer->id == $transaction->customer->id)
                                        <tr class="table-default bg-white" id="{{ $transaction->customer->id }}">
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ $temp_customer_id == $customer->id ?'' : $customer->company->name }}</td>
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ $transaction->product }}</td>
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ $transaction->qty }}</td>
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">{{ $transaction->total }}</td>
                                        </tr>
                                    <?php $temp_customer_id = $customer->id ?>
                                    @endif
                                @endforeach
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
