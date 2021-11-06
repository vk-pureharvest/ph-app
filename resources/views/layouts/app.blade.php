<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('header')
<body>
    <div id="app">
    <title>PH Data | Forms</title>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PH Data') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        @if(Auth::user()->role_id==1)
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                <a class="dropdown-item" href="{{ route('users.show',['id'=>Auth::user()->id]) }}">
                                        {{ __('Download Reports') }}
                                    </a>
                                  <!--  
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                        {{ __('Priva Reports') }}
                                    </a>
                                </div> -->
                            </li>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--
                                    <a class="dropdown-item" href="{{ route('users.show',['id'=>Auth::user()->id]) }}">
                                        {{ __('My Profile') }}
                                    </a>
                                    -->
                                    <a class="dropdown-item" href="{{ route('complaints.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Customer Complaint') }}
                                    </a>
                                    
                                     <!-- Right Side Of Navbar 

                                    <a class="dropdown-item" href="{{ route('meter_readings.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Climate Metrics') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('dimensions.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Fruit Size and Weight') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('brixs.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add BRIX') }}
                                    </a>
                                    -->
                                    <a class="dropdown-item" href="{{ route('productions.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Hourly Production') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('fruit_measures.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Quality Measures') }}
                                    </a>    
                                    <a class="dropdown-item" href="{{ route('packingqc.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Add Packing QC') }}
                                    </a>   
                                    <a class="dropdown-item" href="{{ route('alain_utilities.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Al Ain Utilities Readings') }}
                                    </a>     
                                    <a class="dropdown-item" href="{{ route('inventories.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Cold Storage Closing Stock') }}
                                    </a>      
                                    <a class="dropdown-item" href="{{ route('nahel_utilities.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Nahel Utilities Readings') }}
                                    </a>      
                                    <a class="dropdown-item" href="{{ route('leafy_green_harvest.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Leafy Green Harvest Details') }}
                                    </a>            
                                    <a class="dropdown-item" href="{{ route('leafy_green_package.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Leafy Green Packaging Details') }}
                                    </a>          
                                    <a class="dropdown-item" href="{{ route('pallet_tracker.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Pallet Tracking') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('class2_prod.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Product Sorting') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cold_storage_temps.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Record Cold Storage Temperature') }}
                                    </a>                            
                                    <a class="dropdown-item" href="{{ route('incidents.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Report Incident') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('shelflifetests.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Shelf Life Testing - Tomatoes') }}
                                    </a> 
                                    <a class="dropdown-item" href="{{ route('shelflifeberry.create',['id'=>Auth::user()->id]) }}">
                                        {{ __('Shelf Life Testing - Strawberry') }}
                                    </a>       
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
