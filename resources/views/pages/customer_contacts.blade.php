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
            Customer Contact Details
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
                            <select id = "company_name_list" type="text" class="form-control select2" onchange="get_all_cust_contact_list()">
                                <option value = "">Please select a company</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <div class="col-md-8" id="dynamic_cont_tbl_div" style="display: none">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Contacts Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="dynamic_cont_tbl" class="table table-bordered table-striped example1">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
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
                        <button type="button" class="btn btn-primary" onclick="show_new_contact_form()">New Contact</button>
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
                <h3 class="box-title">New Contact Form</h3>
            </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Name</label>
                            <input  id="name" class="form-control">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input  id="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact</label>
                            <input id="contact" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.box -->
                <div class="row">
                    </div>

                <div class="col-md-6">

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="save_cust_contact()">Save Details</button>
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
                <h3 class="box-title">Contact Edit Form</h3>
            </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Name</label>
                            <input  id="name_edit" class="form-control">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input  id="email_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact</label>
                            <input id="contact_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.box -->
                <div class="row">
                </div>

                <div class="col-md-6">

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="save_edit_contact()">Save Details</button>
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

    <div id="dialog-confirm" title="Remove this Contact" style="display: none">
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


    function validate_form(){

        var company_name_id =  $("#company_name_list").val();

        var name = $("#name").val();
        var email = $("#email").val();
        var contact = $("#contact").val();


        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return -1;
        }else{//sucess
            if(name == '' || name == ' ' || name == null){//fail

                note('Please enter name', 'warning');
                return -1;
            }else{//success
                if(email == '' || email == ' ' || email == null){

                    note('Please enter an email address', 'warning');
                    return -1;
                }else{
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(regex.test(email)){
                        if (contact == "" || contact == " " || contact == null) {
                            note('Please enter a contact number', 'warning');
                            return -1;
                        }else{
                            return 0;
                        }
                    }else{
                        note('Please enter an valid email address', 'warning');
                        return -1;
                    }
                }
            }

        }
    }


    edit_id = 0 ;
    function get_all_cust_contact_list()
    {

       var company_name_id =  $("#company_name_list").val();
        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            clear_table_rows();
            return;
        }
        load_contacts_table();


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
        get_contact_detail(id);
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
        $("#name").val(" ");
        $("#email").val(" ");
        $("#contact").val(" ");
        $("#contact_form").hide();
        $("#contact_form").show();
        hide_edit_contact_form();
        $('html,body').animate({scrollTop: $("#contact_form").offset().top}, 800);
    }
    function hide_new_contact_form(){

        $('html,body').animate({scrollTop: $("body").offset().top}, 800);
       $("#name").val(" ");
        $("#email").val(" ");
        $("#contact").val(" ");
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

    function save_cust_contact(){

        var company_name_id =  $("#company_name_list").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var contact = $("#contact").val();



        if(company_name_id == 0 || company_name_id == '' || company_name_id == null){
            note('Please select a company', 'warning');
            return -1;
        }else{//sucess
            if(name == '' || name == ' ' || name == null){//fail

                note('Please enter name', 'warning');
                return -1;
            }else{//success
                if(email == '' || email == ' ' || email == null){

                    note('Please enter an email address', 'warning');
                    return -1;
                }else{
                    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

                    if(pattern.test(email)){
                        if (contact == "" || contact == " " || contact == null) {
                            note('Please enter a contact number', 'warning');
                            return -1;
                        }else{
                            $.getJSON("/save_cust_contact",
                                    {
                                        company_name_id:company_name_id,
                                        name:name,
                                        email:email,
                                        contact:contact
                                    },
                                    function (a) {
                                        if(a){

                                            note('Contact Added Sucessfully', 'success');
                                            get_all_cust_contact_list();
                                            hide_new_contact_form();
                                        }

                                    });
                        }
                    }else{
                        note('Please enter an valid email address', 'warning');
                        return -1;
                    }
                }
            }

        }


    }

    function load_contacts_table(){

        $("#dynamic_cont_tbl_div").show();
        var company_name_id =  $("#company_name_list").val();
        table = $('#dynamic_cont_tbl').DataTable();


        $.getJSON("/get_all_cont",
                {
                    company_name_id:company_name_id
                },
                function (a) {

                    table.rows().remove().draw();
                    for (var b in a) {
                        table.row.add([ a[b]['name'],
                            a[b]['email'],
                            a[b]['contact'],
                            '<button type="button" class="btn btn-warning" onclick="show_edit_contact_form('+ a[b]['id'] +')">Edit</button>',
                            '<button type="button" class="btn btn-danger" onclick="remove_contact('+ a[b]['id'] +')">Remove</button>'
                        ]);
                    }
                    table.draw();

                });

    }

    function remove_contact(id){

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
                    $.getJSON("/remove_contact",
                            {
                                id:id
                            },
                            function (a) {
                                if(a){

                                    note('Removed Sucessfully', 'success');
                                    get_all_cust_contact_list();
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

    function get_contact_detail(id){

        edit_id = id;
        $.getJSON("/get_contact_detail",
                {
                    id:id
                },
                function (a) {
                    if(a){

                       $("#name_edit").val(a[0]['name']);
                        $("#email_edit").val(a[0]['email']);
                        $("#contact_edit").val(a[0]['contact']);

                    }

                });
    }

    function save_edit_contact(){


        var name = $("#name_edit").val();
        var email = $("#email_edit").val();
        var contact = $("#contact_edit").val();

            if(name == '' || name == ' ' || name == null){//fail

                note('Please enter name', 'warning');
                return -1;
            }else{//success
                if(email == '' || email == ' ' || email == null){

                    note('Please enter an email address', 'warning');
                    return -1;
                }else{
                    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

                    if(pattern.test(email)){
                        if (contact == "" || contact == " " || contact == null) {
                            note('Please enter a contact number', 'warning');
                            return -1;
                        }else{
                            $.getJSON("/save_edit_contact",
                                    {
                                        id:edit_id,
                                        name:name,
                                        email:email,
                                        contact:contact
                                    },
                                    function (a) {
                                        if(a){

                                            note('Edited Sucessfully', 'success');
                                            get_all_cust_contact_list();
                                            hide_edit_contact_form();
                                            edit_id= 0;
                                        }

                                    });
                        }
                    }else{
                        note('Please enter an valid email address', 'warning');
                        return -1;
                    }
                }
            }



    }


</script>