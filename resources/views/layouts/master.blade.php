@include('layouts.template.head')
@include('layouts.template.main-header')
@include('layouts.template.sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @yield('title')
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('page')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--start of section content-->
        <div class="mx-2">
            @yield('content')
        </div>

    <!--end of section content-->

    </div>

@include('layouts.template.footer')



