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
            Customer Master Details
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer Details</h3>
            </div>

                     <div class="row">


                                <div class="col-md-6">
                                    <!-- general form elements -->


                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Company Name</label>
                                                    <input id = "company_name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <input id="address" type="text" class="form-control"  >
                                                </div>
                                            </div>

                                    </div>
                                    <!-- /.box -->

                                     <div class="col-md-6">
                                         <!-- general form elements -->


                                         <div class="box-body">
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Business Registration #</label>
                                                 <input id="brN" type="text" class="form-control"  >
                                             </div>
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Website</label>
                                                 <input id="website" type="text" class="form-control">
                                             </div>
                                         </div>
                                         <div class="box-footer">
                                             <button type="button" id="add_btn" class="btn btn-primary" onclick="add_new_customer()">Add Details</button>
                                             <button type="button" id="edit_btn" class="btn btn-default" onclick="edit_customer()" style=" display:none">Save Changes</button>
                                             <button type="button" id="cancel_btn" class="btn btn-warning" onclick="cancel_btn_click()" style=" display:none">Cancel</button>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Customer Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dynamic_cust_tbl" class="table table-bordered table-striped example1">
                            <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Business Reg #</th>
                                <th>Website</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Business Reg #</th>
                                <th>Website</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


@stop


@section('main_footer')
    @parent
@stop

@section('js_ref')
    @parent
@stop

<script>

    edit_id = -1;


    function validate_form() {

        var company_name = $("#company_name").val();
        var website = $('#website').val();
        var address = $("#address").val();
        var brN = $("#brN").val();





        if(company_name == '' || company_name == ' ' || company_name == null){//fail

            note('Please enter company name', 'warning');
            return -1;
        }else{//sucess
            if(address == '' || address == ' ' || address == null){//fail

                note('Please enter address', 'warning');
                return -1;
            }else{//success
                if(brN == '' || brN == ' ' || brN == null){

                    note('Please enter business registration number', 'warning');
                    return -1;
                }else{
                    if (website == "" || website == " " || website == null) {
                        note('Please enter a website url', 'warning');
                        return -1;
                    }else{
                        var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
                        if (re.test(website)) {//success
                           return 0;
                        }else{
                            note('Please enter valid website url', 'warning');
                            return -1;
                        }
                    }


                }
            }

        }







    }
    function cancel_btn_click(){
        clear_all_fields();
        $("#cancel_btn").hide();
        $("#edit_btn").hide();
        $("#add_btn").show();
    }
    function show_edit_btns(){
        $("#add_btn").hide();
        $("#edit_btn").show();
        $("#cancel_btn").show();
    }

    function load_cust_table(){


        table = $('#dynamic_cust_tbl').DataTable();

        $.getJSON("/get_all_cust",
                function (a) {

                    table.rows().remove().draw();
                    for (var b in a) {


                        table.row.add([ a[b]['company_name'],
                                        a[b]['address'],
                                        a[b]['busi_reg_num'],
                                        a[b]['website'],
                                        '<button type="button" class="btn btn-warning" onclick="get_cust_details('+ a[b]['id'] +')">Edit</button>',
                                        '<button type="button" class="btn btn-danger" onclick="remove_customer('+ a[b]['id'] +')">Remove</button>'
                        ]);

                    }
                    table.draw();

                });

    }

    function add_new_customer(){

        var company_name = $("#company_name").val();
        var website = $('#website').val();
        var address = $("#address").val();
        var brN = $("#brN").val();





        if(company_name == '' || company_name == ' ' || company_name == null){//fail

            note('Please enter company name', 'warning');
            return -1;
        }else{//sucess
            if(address == '' || address == ' ' || address == null){//fail

                note('Please enter address', 'warning');
                return -1;
            }else{//success
                if(brN == '' || brN == ' ' || brN == null){

                    note('Please enter business registration number', 'warning');
                    return -1;
                }else{
                    if (website == "" || website == " " || website == null) {
                        note('Please enter a website url', 'warning');
                        return -1;
                    }else{
                        var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
                        if (re.test(website)) {//success

                            $.getJSON("/add_new_cust",
                                    {
                                        company_name:company_name,
                                        address:address,
                                        brN:brN,
                                        website:website

                                    },
                                    function (a) {
                                        note('Added Succesfully...', 'success');
                                        $("#company_name").val("");
                                        $("#address").val("");
                                        $("#brN").val("");
                                        $("#website").val("");
                                        load_cust_table();
                                        clear_all_fields();
                                    });


                        }else{
                            note('Please enter valid website url', 'warning');
                            return -1;
                        }
                    }


                }
            }

        }



    }

    function remove_customer(id){

        $.getJSON("/remove_customer",
                {
                    id:id

                },
                function (a) {
                    note('Company removed Succesfully...', 'success');
                    load_cust_table();
                });
    }

    function edit_customer(){

        if(edit_id == -1 || edit_id == 0){

            note('Please select row to edit', 'warning');
        }

        var id = edit_id;
        var company_name = $("#company_name").val();
        var address = $("#address").val();
        var brN = $("#brN").val();
        var website = $("#website").val();






        if(company_name == '' || company_name == ' ' || company_name == null){//fail

            note('Please enter company name', 'warning');
            return -1;
        }else{//sucess
            if(address == '' || address == ' ' || address == null){//fail

                note('Please enter address', 'warning');
                return -1;
            }else{//success
                if(brN == '' || brN == ' ' || brN == null){

                    note('Please enter business registration number', 'warning');
                    return -1;
                }else{
                    if (website == "" || website == " " || website == null) {
                        note('Please enter a website url', 'warning');
                        return -1;
                    }else{
                        var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
                        if (re.test(website)) {//success

                            $.getJSON("/edit_customer",
                                    {
                                        id:edit_id,
                                        company_name:company_name,
                                        address:address,
                                        brN:brN,
                                        website:website
                                    },
                                    function (a) {
                                        note('Details edited Succesfully...', 'success');
                                        load_cust_table();
                                        edit_id = -1;
                                        clear_all_fields();
                                        cancel_btn_click();
                                    });

                        }else{
                            note('Please enter valid website url', 'warning');
                            return -1;
                        }
                    }


                }
            }

        }

    }

    function get_cust_details(id){

        clear_all_fields();
        show_edit_btns();

        $.getJSON("/get_cust_details",
                {
                    id:id

                },
                function (a) {

                    $("#company_name").val(a[0]['company_name']);
                    $("#address").val(a[0]['address']);
                    $("#brN").val(a[0]['busi_reg_num']);
                    $("#website").val(a[0]['website']);
                    edit_id = a[0]['id'];

                });

    }

    function clear_all_fields(){

        $("#company_name").val(" ");
        $("#address").val(" ");
        $("#brN").val(" ");
        $("#website").val(" ");
    }

    window.onload = function() {
        load_cust_table();
    };


    function note(msg,head)
    {
        Lobibox.notify(head, {
            msg: msg
        });

    }




</script>