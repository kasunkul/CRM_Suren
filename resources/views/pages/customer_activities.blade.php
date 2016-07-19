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
            Customer Activity Details
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer Details</h3>
            </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <select id = "company_name_list" type="text" class="form-control select2" onchange="get_all_cust_activity_list()">
                                <option value = "">Please select a company</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <div class="col-md-8" id="dynamic_cont_tbl_div" style="display:none">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Activity log Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dynamic_cont_tbl" class="table table-bordered table-striped example1">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Outcome</th>
                                    <th>Sales Person</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Outcome</th>
                                    <th>Sales Person</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <div class="col-md-12">

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="show_new_contact_form()">Set new Activity</button>
                    </div>

                </div>

            </div>
            <!--/.col (left) -->


        </div>
        <!-- /.row -->
    </section>
    <section class="content" id="contact_form" style="display: none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">New Activity Form</h3>
            </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Date</label>
                            <input  id="date" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <select  id="activity_type" class="form-control">
                                <option value="0">Please select a type</option>
                                <option value="Call">Call</option>
                                <option value="Email">Email</option>
                                <option value="Meeting">Meeting</option>
                            </select>
                            {{--<input  id="activity_type" class="form-control">--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Outcome</label>
                            <input id="outcome" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sales Person</label>
                            <input id="sales_per" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.box -->
                <div class="row">
                </div>

                <div class="col-md-6">

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="save_activity_contact()">Save Details</button>
                        <button type="button" class="btn btn-danger" onclick="hide_new_contact_form()">Cancel</button>
                    </div>

                </div>

            </div>
            <!--/.col (left) -->


        </div>
        <!-- /.row -->
    </section>
    <section class="content" id="contact_edits_form" style="display: none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Activity Edit Form</h3>
            </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Date</label>
                            <input  id="date_edit" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <select  id="activity_type_edit" class="form-control">
                                <option value="0">Please select a type</option>
                                <option value="Call">Call</option>
                                <option value="Email">Email</option>
                                <option value="Meeting">Meeting</option>
                            </select>
                            {{--<input  id="activity_type" class="form-control">--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Outcome</label>
                            <input id="outcome_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sales Person</label>
                            <input id="sales_per_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.box -->
                <div class="row">
                </div>

                <div class="col-md-6">

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="save_edit_activity()">Save Details</button>
                        <button type="button" class="btn btn-danger" onclick="hide_edit_contact_form()">Cancel</button>
                    </div>

                </div>

            </div>
            <!--/.col (left) -->


        </div>
        <!-- /.row -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>




    </head>
    <body>

    <div id="dialog-confirm" title="Remove this Activty" style="display: none">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>This item will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>



@stop


@section('main_footer')
    @parent
@stop

@section('js_ref')
    @parent
@stop

<script>
    edit_id = 0;

    function get_all_cust_activity_list()
    {

        var company_name_id =  $("#company_name_list").val();

        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            clear_table_rows();
            return;
        }
        load_activity_table();


    }
    function clear_table_rows(){
        table = $('#dynamic_cont_tbl').DataTable();

        table.rows().remove().draw();
    }


    function show_edit_contact_form(id){
        var company_name_id =  $("#company_name_list").val();
        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return;
        }
        $("#contact_edits_form").show();
        get_activity_detail(id);
        hide_new_contact_form();
        $('html,body').animate({scrollTop: $("#contact_edits_form").offset().top}, 800);
    }
    function hide_edit_contact_form(){

        $('html,body').animate({scrollTop: $("body").offset().top}, 800);
        $("#name_edit").val(" ");
        $("#email_edit").val(" ");
        $("#contact_edit").val(" ");
        $("#contact_edits_form").hide();
    }

    function show_new_contact_form(){
        var company_name_id =  $("#company_name_list").val();
        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return;
        }

        $("#date").val(" ");
        $("#activity_type").val(" ");
        $("#outcome").val(" ");
        $("#sales_per").val(" ");

        $("#contact_form").hide();
        $("#contact_form").show();

        hide_edit_contact_form();
        $('html,body').animate({scrollTop: $("#contact_form").offset().top}, 800);
    }
    function hide_new_contact_form(){

        $('html,body').animate({scrollTop: $("body").offset().top}, 800);
        $("#date").val(" ");
        $("#activity_type").val(" ");
        $("#outcome").val(" ");
        $("#sales_per").val(" ");

        $("#contact_form").hide();
    }



    window.onload = function() {
        $(".select2").select2();
        $("#company_name_list").select2({
            ajax: {
                url: "/get_all_cust_list_sel_2",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function (data) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 2
        });


    };


    function note(msg,head)
    {
        Lobibox.notify(head, {
            msg: msg
        });

    }

    function save_activity_contact(){

        var company_name_id =  $("#company_name_list").val();

        var date = $("#date").val();
        var activity_type = $("#activity_type").val();
        var outcome = $("#outcome").val();
        var sales_per = $("#sales_per").val();

        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return;
        }else {
            if (date == '' || date == ' ' || date == null) {//fail

                note('Please select a date', 'warning');
                return -1;
            } else {//success
                if (activity_type == '' || activity_type == 0 || activity_type == null) {

                    note('Please select a activity type', 'warning');
                    return -1;
                } else {
                    if (outcome == '' || outcome == ' ' || outcome == null) {

                        note('Please enter a outcome', 'warning');
                        return -1;
                    } else {
                        if (sales_per == '' || sales_per == ' ' || sales_per == null) {

                            note('Please enter a sales person', 'warning');
                            return -1;
                        } else {
                            $.getJSON("/save_activity_contact",
                                    {
                                        company_name_id:company_name_id,
                                        date:date,
                                        activity_type:activity_type,
                                        outcome:outcome,
                                        sales_per:sales_per
                                    },
                                    function (a) {
                                        if(a){

                                            note('Activity Added Sucessfully', 'success');
                                            get_all_cust_activity_list();
                                            hide_new_contact_form();
                                        }

                                    });


                        }


                    }


                }
            }

        }



    }

    function load_activity_table(){
        $("#dynamic_cont_tbl_div").show()
        var company_name_id =  $("#company_name_list").val();
        table = $('#dynamic_cont_tbl').DataTable();


        $.getJSON("/get_all_activity",
                {
                    company_name_id:company_name_id
                },
                function (a) {

                    table.rows().remove().draw();
                    for (var b in a) {
                        table.row.add([ a[b]['date'],
                            a[b]['type'],
                            a[b]['outcome'],
                            a[b]['sales_person'],
                            '<button type="button" class="btn btn-warning" onclick="show_edit_contact_form('+ a[b]['id'] +')">Edit</button>',
                            '<button type="button" class="btn btn-danger" onclick="remove_activity('+ a[b]['id'] +')">Remove</button>'
                        ]);
                    }
                    table.draw();

                });

    }

    function remove_activity(id){

        var company_name_id =  $("#company_name_list").val();
        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return;
        }
        $("#dialog-confirm").show();
        $( "#dialog-confirm" ).dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            position: { my: 'top', at: 'top+150' },
            buttons: {
                "Delete item": function() {
                    $.getJSON("/remove_activity",
                            {
                                id:id
                            },
                            function (a) {
                                if(a){

                                    note('Removed Sucessfully', 'success');
                                    get_all_cust_activity_list();
                                }

                            });
                    $( this ).dialog( "close" );
                    $("#dialog-confirm").hide();
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                    $("#dialog-confirm").hide();
                }
            }
        });



    }

    function get_activity_detail(id){

        edit_id = id;
        $.getJSON("/get_activity_detail",
                {
                    id:id
                },
                function (a) {
                    if(a){


                        $("#date_edit").val(a[0]['date']);
                        $('#date_edit').datepicker('setDate', a[0]['date']);
                        $("#activity_type_edit").val(a[0]['type']);
                        $("#outcome_edit").val(a[0]['outcome']);
                        $("#sales_per_edit").val(a[0]['sales_person']);




                    }

                });
    }

    function save_edit_activity(){


        var date_edit = $("#date_edit").val();

        var activity_type_edit= $("#activity_type_edit").val();
        var outcome_edit = $("#outcome_edit").val();
        var sales_per_edit = $("#sales_per_edit").val();


            if (date_edit == '' || date_edit == ' ' || date_edit == null) {//fail

                note('Please select a date', 'warning');
                return -1;
            } else {//success
                if (activity_type_edit == '' || activity_type_edit == 0 || activity_type_edit == null) {

                    note('Please select a activity type', 'warning');
                    return -1;
                } else {
                    if (outcome_edit == '' || outcome_edit == ' ' || outcome_edit == null) {

                        note('Please enter a outcome', 'warning');
                        return -1;
                    } else {
                        if (sales_per_edit == '' || sales_per_edit == ' ' || sales_per_edit == null) {

                            note('Please enter a sales person', 'warning');
                            return -1;
                        } else {
                            $.getJSON("/save_edit_activity",
                                    {
                                        id:edit_id,
                                        date_edit:date_edit,
                                        activity_type_edit:activity_type_edit,
                                        outcome_edit:outcome_edit,
                                        sales_per_edit:sales_per_edit
                                    },
                                    function (a) {
                                        if(a){

                                            note('Edited Sucessfully', 'success');
                                            get_all_cust_activity_list();
                                            hide_edit_contact_form();
                                            edit_id= 0;
                                        }

                                    });


                        }


                    }


                }
            }





    }


</script>