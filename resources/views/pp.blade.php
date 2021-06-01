<!-- @extends('layouts.app') -->

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                           
                        </div>

                        <!-- Table -->
                        <form>
                            <body>
                                <form action="submit" method="POST">
                                <input type="text" name="name" placeholder = "Product name">
                                <br><br>

                                <input type="text" name="type" placeholder = "Product type">
                                <br><br>
                                <button type="submit"> Add new Product </button>
                                </form>
                            </body>                    
                        </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

