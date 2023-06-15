<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

                        * {
                        box-sizing: border-box;
                        }


                        html {
                        font-family: "Lucida Sans", sans-serif;
                        }

                        .header {
                        background-color: #e3dbe7;
                        color: #ffffff;
                        padding: 15px;
                        text-align: right;
                        }



                        /* For desktop: */
                        .col-1 {width: 8.33%;}
                        .col-2 {width: 16.66%;}
                        .col-3 {width: 25%;}
                        .col-4 {width: 33.33%;}
                        .col-5 {width: 41.66%;}
                        .col-6 {width: 50%;}
                        .col-7 {width: 58.33%;}
                        .col-8 {width: 66.66%;}
                        .col-9 {width: 75%;}
                        .col-10 {width: 83.33%;}
                        .col-11 {width: 91.66%;}
                        .col-12 {width: 100%;}

                        @media only screen and (max-width: 768px) {
                        /* For mobile phones: */
                        [class*="col-"] {
                        width: 100%;
                        }
                        }
                    .pagraph{
                        border: 1px solid black;
                        padding: 25px 50px 75px 100px;
                        background-color: lightblue;
                    }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))

            <div class="header float-right">


                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>


            </div>



            @endif
            

            <div class="max-w-7xl mx-auto p-2 lg:p-4">
                <div class="mt-6">
                    <div class="grid grid-cols-2 md:grid-cols-16 gap-6 lg:gap-8">
                        <p class="pagraph">
                            The formation of the city of Bangalore and the beginning of St. Mary’s Church are found to be interlinked in the History of Karnataka. During the 17th Century, few Christians, hailing from Ginjee in the state of Tamil Nadu, settle down in the fertile land and gave the name ‘Bili akki palli’ because the rice they cultivated in that kind white and white birds flocked to the paddy fields. Being Christians, they built a small thatched roofed church and named it
                             ‘KANIKKAI MADHA CHAPEL’.
                             

                            The Italian Jesuits of the Malabar Mission were the founders of the Mysore Mission in the 17th Century. They were succeeded by the French Jesuits from Madura and 
                            Carnatic Missions in the 18th Century.

                            In 1799, at the siege of Srirangapatnam, Fr. Jean Dubois, a Catholic Priest, came with the English troops and only when he said the Mass in the Church, people did recognize him as a Catholic Priest. When the Cantonment was established in Bangalore, the Christians, both Europeans and Indians were attending the Mass said by Fr. Jean Dubois In 1811, he built a small chapel with a residence for priests.

                        </p>



                    </div>
                </div>

             
            </div>
        </div>
    </body>
</html>
