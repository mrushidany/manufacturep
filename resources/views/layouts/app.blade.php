
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>{!! config('app.name') !!} | </title>

    <!-- Bootstrap -->
    <link href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('public/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Select 2  -->
    <link rel="stylesheet" href="{!! asset('public/vendors/select2/dist/css/select2.min.css') !!}">

    <!-- Toast  -->
    <link rel="stylesheet" href="{!! asset('public/css/toastr.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/vendors/izitoast/dist/css/iziToast.min.css') !!}"


    <!-- Custom Theme Style -->
    <link href="{{asset('public/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="modal fade" id="main_modal" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{!! route('dashboard') !!}" class="site_title"><i class="fa fa-gears"></i> <span>&nbsp;manufacturep</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('public/images/img.jpg')}}" alt="" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span></span><br/><h2>{{Auth::user()->first_name." ".substr(Auth::user()->middle_name,0,1)." ".Auth::user()->last_name}}</h2>

                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3></h3>
                        <ul class="nav side-menu">
                            <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a>
                            </li>
                            <li><a><i class="fa fa-product-hunt"></i> Products <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('products.products_list.index')}}">Products List</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-gavel"></i>Materials<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('basic_materials.index')}}">Basic Materials</a></li>
                                    <li><a href="{{route('compound_materials.index')}}">Basic Compound Materials</a></li>
                                    <li><a href="{{route('semi_finished_compound_materials.index')}}"><span>Semi Finished Compound Materials</span></a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-wrench"></i> Measurement Units <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('basic.basic_units_list.index')}}">Basic Measurements</a></li>
                                    <li><a href="{{route('compound.compound_units_list.index')}}">Compound Measurements</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{url('public/images/img.jpg')}}" alt="">{{Auth::user()->first_name." ".substr(Auth::user()->middle_name,0,1)." ".Auth::user()->last_name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        <p>Log out</p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="{{url('public/images/img.jpg')}}" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{asset('public')}}.
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="{{url('public/images/img.jpg')}}" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{asset('public')}}.
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="{{url('public/images/img.jpg')}}" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{asset('public')}}.
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="{{url('public/')}}images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{asset('public')}}.
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
             @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
               Bizytech, Company Limited &copy; {{date('Y')}}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('public/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('public/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('public/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('public/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('public/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('public/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('public/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('public/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('public/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('public/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('public/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('public/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('public/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('public/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

<!-- Select 2 -->
<script src="{!! asset('public/vendors/select2/dist/js/select2.min.js') !!}"></script>

<!-- Toast -->
<script src="{!! asset('public/js/toastr.min.js') !!}"></script>
<script src="{!! asset('public/vendors/izitoast/dist/js/iziToast.min.js') !!}"></script>




<!-- Custom Theme Scripts -->
<script src="{{asset('public/build/js/custom.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    var main_modal = $('#main_modal');
    function create(url) {
        createOrEdit(url, 'create');
    }
    function store(form) {
        storeOrUpdate(form);
    }
    function edit(url) {
        createOrEdit(url, 'edit');
    }
    function update(form) {
        storeOrUpdate(form);
    }
    // Ajax call to destroy a record
    function mainAjax(url, method) {
        $.ajax({
            url: url,
            type: method,
            // beforeSend: function() {
            //     startSpinner();
            // },
            success: function (data) {
            //     if ( typeof mainAjaxSuccess === 'function' ) {
            //         mainAjaxSuccess();
            //     } else {
            //         onAjaxSuccess(data);
            //     }
            },
            // error: function (xhr, textStatus, error) {
            //     onAjaxError(xhr, textStatus, error);
            // },
            // complete: function() {
            //     stopSpinner();
            // }
        });
    }
    function destroy(url) {
        // swal({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         type: "warning",
        //         showCancelButton: true,
        //         cancelButtonText: 'No, cancel!',
        //         confirmButtonText: "Yes, delete it!",
        //         confirmButtonColor: "#d33",
        //         closeOnConfirm: true,
        //         allowOutsideClick: true
        //     });
            $.ajax(
                {
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        _method : 'DELETE'
                    },
                    success: function (){
                        main_datatable.draw();
                    },
                });

    }

    function publish(url,action) {
        swal({
                title: "Are you sure?",
                text: "You want "+action+" this!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: "Yes, "+action+" it!",
                confirmButtonColor: "#f39c12",
                closeOnConfirm: true,
                allowOutsideClick: true
            },
            function () {
                mainAjax(url, 'GET');
            });
    }

    function createOrEdit(url, action) {
        $.ajax({
            url: url,
            type: "GET",
            beforeSend: function () {
                startSpinner();
            },
            success: function (data) {
                onAjaxSuccess(data, action);
            },
            error: function (data, textStatus, error) {
                onAjaxError(data, textStatus, error);
            },
            complete: function() {
                stopSpinner();
            }
        });
    }
    function storeOrUpdate(form) {
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            beforeSend: function() {
                disableSubmitBtn();
                startSpinner();
            },
            success: function (data) {
                onAjaxSuccess(data);
            },
            error: function (xhr, textStatus, error) {
                onAjaxError(xhr, textStatus, error);
            },
            complete: function() {
                enableSubmitBtn();
                stopSpinner();
            }
        });
    }
    // Ajax Supporting functions =======================
    function onAjaxSuccess(data, action=null) {
        if(action === 'create' || action === 'edit') { // Loading a create/edit form

            if(data.state === 'Fail') {
                toastr.info(data.msg, data.title);
                return;
            }
            else if(data.state === 'Error') {
                toastr.error(data.msg, data.title);
                return;
            }

            main_modal.find('.modal-content').empty().append(data);
            main_modal.modal('show');
            onModalShown();

            var form = main_modal.find('form');
            form.on('submit', function(event) {
                event.preventDefault();
                form.attr('method', (action === 'create' ? 'POST' : 'PUT'));
                storeOrUpdate(form);
            });
        } else {
            if(data.state === 'Done') {
                toastr.success(data.msg, data.title);
                main_modal.modal('hide');

                if ( typeof main_datatable !== 'undefined') {
                    main_datatable.draw();
                }
            }
            else if(data.state === 'Fail') {
                toastr.info(data.msg, data.title);
            }
            else if(data.state === 'Error') {
                toastr.error(data.msg, data.title);
            }
            else {
                var num = 0;
                jQuery.each(data, function (k, v) {
                    if (num === 0) toastr.error(v);
                    num++;
                });
            }
        }
    }
    function onAjaxError(data, textStatus, error) {
        toastr.error(error, textStatus.toUpperCase());
        switch(error) {
            case 'Unauthorized': // Server respond: Unauthenticated
                break;
            case 'Forbidden': // Server respond: Unauthorized
                break;
            case 'Internal Server Error':
                break;
            case 'Method Not Allowed':
                break;
            case 'Unknown status':
                break;
            case 'Not Imlemented':
                break;
            default:
                break;
        }
        console.log(data);
    }
    function onModalShown() {
        $('.select2s').select2({'width':'100%'});
        // $('.datepickers').datepicker({
        //     format: "mm/dd/yyyy",
        //     autoclose: true
        // });
        $(".editor").wysihtml5();
        $('input, textarea').focusin(function() {
            return $(this).select();
        });

        if ( typeof modalScripts === 'function' ) {
            modalScripts();
        }
    }
    {{--// ===== CRUD Operations functions -  end  ==========--}}

    function startSpinner() {
        // $.showLoading({name: 'square-flip'});
    }
    function stopSpinner() {
        // $.hideLoading();
    }

    // Enable/Disable Submit buttons ===================
    function enableSubmitBtn() {
        var btn = main_modal.find('button[type=submit]');
        btn.prop('disabled', false).text(' Save ');
    }
    function disableSubmitBtn() {
        var btn = main_modal.find('button[type=submit]');
        btn.prop('disabled', true).text('Saving, Please wait...');
    }
</script>

@yield('scripts')

</body>
</html>
