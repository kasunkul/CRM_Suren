@extends('index')
@section('css_ref')
@parent


@stop

@section('header_sidebar')
@parent


@stop


@section('Content_Wrapper')


    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">



                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                            <i class="fa fa-spin fa-refresh"></i>&nbsp;Dashboard is under Construction
                        </button>
                    </div>
                </div>
                <div class="ajax-content">
                </div>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </section>


@stop


@section('main_footer')
    @parent


@stop

@section('js_ref')
    @parent

@stop