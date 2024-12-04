<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    function setTotal() {

        var qty = parseInt($('#qty').val());
        var price = parseInt($('#price').val());
        var include_ppn = parseInt($('#include_ppn').val())
        var subtotal = qty * price;

        console.log(qty);

        $('#subtotal').val(subtotal || 0);

        if(include_ppn == 1){
            $('#total').val(subtotal || 0);
            $('#total_ppn').val(0);
        }else{
            var total_ppn = (11/100)*subtotal
            $('#total_ppn').val(total_ppn || 0);
            var total = subtotal + total_ppn;
            $('#total').val(total || 0);
        }
    }
    
    function setPercent(){
        var input_1 = $('#input_1').val();
        var input_2 = $('#input_2').val();
        var input_1_length = $('#input_1').val().length;
        var array_return = [];
        var filtered_array = [];
        var filtered_array_keys = [];

        var char_2 = jQuery.map((input_2 + '').split(''), function(n) {
            return n
        });

        let filtered_char_2 = [...new Set(char_2.map(item => item))];

        var count = 0;

        for (let index = 0; index < filtered_char_2.length; index++) {

            if(input_1.indexOf(filtered_char_2[index]) != -1){
                count++;
            }
        }

        var hasil = (count/input_1_length)*100;
        $('#hasil').val(hasil,' %');
    }

</script>
