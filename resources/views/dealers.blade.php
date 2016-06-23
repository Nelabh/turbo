<!DOCTYPE html>
<html>

<head>
    @include('header')
</head>

<body>
    <div id="wrapper">
        @include('leftnavigation_admin')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to TURBO.</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="wrapper wrapper-content animated fadeIn">
               <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Dealers list</h5>
                            <div class="ibox-tools">
                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal5">Add new dealer</a>


                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                            placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                    <tr>
                                        <th>Customer Code</th>
                                        <th>Pump Name</th>
                                        <th data-hide="phone,tablet">Name Of Dealer</th>
                                        <th data-hide="phone,tablet">Contact</th>
                                        <th data-hide="phone,tablet">City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($dealers == NULL)
                                    @foreach($dealers as $deal)
                                    <tr class="gradeX">
                                        <td>{{$deal->customer_code}}</td>
                                        <td>{{$deal->pump_name}}
                                        </td>
                                        <td>{{$deal->name}}</td>
                                        <td class="center">{{$deal->contact}}</td>
                                        <td class="center">{{$deal->city}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="gradeX">
                                        <td colspan="5"><center>NO DEALERS ADDED</center></td>
                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <ul class="pagination pull-right"></ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add New Dealer</h4>
                    </div>
                    <form method="post" action = "{{URL::route('add_dealer')}}" class="form-horizontal">

                        <div class="modal-body">

                            <div class="form-group"><label class="col-sm-2 control-label">Customer Code</label>

                                <div class="col-sm-10"><input type="text" name = "customer_code" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10"><input type="text" name = "name" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Contact</label>

                                <div class="col-sm-10"><input type="text" name = "contact" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Pump Name</label>

                                <div class="col-sm-10"><input type="text" name = "pump_name" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">City</label>

                                <div class="col-sm-10"><input type="text" name = "city" class="form-control"></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">E-mail</label>

                                <div class="col-sm-10"><input type="text" name = "email" class="form-control"></div>
                            </div> 
                        </div>

                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="row">

                    </div>
                </div>
                @include('footer')
            </div>
        </div>

    </div>
</div>

@include('js')
<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>
<script>
$(document).ready(function() {

    $('.footable').footable();
    $('.footable2').footable();

});

</script>

</body>
</html>
