<!DOCTYPE html>
<html>

<head>
    @include('header')
</head>

<body>
    <div id="wrapper">
        @include('leftnavigation_dealer')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('topnavigation')
            <div class="wrapper wrapper-content animated fadeIn">


               <div class="row">

                 <div class="col-lg-3">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-automobile fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total volume sold </span>

                                <h2 class="font-bold">{!! $total !!} ltr</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-inr fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Today income</span>
                                <h2 class="font-bold">&#8377; {!! $income !!}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-male fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span>Registered customers</span>
                                <h2 class="font-bold">{{ count($cust) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-mobile fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Registered Devices</span>
                                <h2 class="font-bold">{!! $counter !!}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            

            <div class="p-w-md m-t-sm">
                <div class="row">

                 
                    <div class="col-sm-4">
                    </div>
                    
                    <div class="col-sm-4 text-center">

                        <div class="row m-t-xs">
                            <div class="col-xs-6">
                                <h5 class="m-b-xs">Diesel Price</h5>
                                <h1 class="no-margins">{!!$dealer->diesel_price!!}</h1>
                                <div class="font-bold text-navy"><a  href="" data-toggle="modal" data-target="#check" >Change</a> <i class="fa fa-bolt"></i></div>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="m-b-xs">Petrol Price</h5>
                                <h1 class="no-margins">{!!$dealer->petrol_price!!}</h1>
                                <div class="font-bold text-navy"><a href="" data-toggle="modal" data-target="#check">Change</a> <i class="fa fa-bolt"></i></div>
                            </div>
                        </div>


                        <table class="table small m-t-sm">
                            
                        </table>



                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="small pull-left col-md-3 m-l-lg m-t-md">
                            <strong>View your</strong> sales of previous days graphically.
                        </div>
                        <div class="small pull-right col-md-3 m-t-md text-right">
                            <strong>Increase</strong> your sales.
                        </div>
                        <div class="flot-chart m-b-xl">
                            <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
                        </div>
                    </div>
                </div>



                <div class="wrapper wrapper-content animated fadeIn">
                   <div class="signup-form" id="error">
                    @if($errors->has())
                    <p>
                      {{$errors->first('name',':message')}} </p>
                      <p>  {{$errors->first('customer_code',':message')}} </p>
                      <p>  {{$errors->first('contact',':message')}} </p>
                      <p>  {{$errors->first('email',':message')}} </p>
                      <p>  {{$errors->first('password',':message')}} </p>
                      <p>  {{$errors->first('city',':message')}} </p>
                      <p>  {{$errors->first('pump_name',':message')}} </p>
                      
                      @endif
                  </div>


                  <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Transactions</h5>
                            </div>
                            <div class="ibox-content">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                placeholder="Search in table">

                                <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Number</th>
                                            <th >Type</th>
                                            <th >Volume filled</th>
                                            <th >Cost</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($transaction)
                                        @foreach($transaction as $t)
                                        <tr class="gradeX">
                                            <td>{{$t->customer}}</td>
                                            <td>{{$t->vehicle_number}}</td>
                                            <td>{{$t->type}}</td>
                                            <td class="center">{{$t->volume}}</td>
                                            <td class="center">{{$t->total_cost}}</td>
                                            <td class="center">{{$t->created_at}}</td>

                                            
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="gradeX">
                                            <td colspan="6"><center>NO TRANSACTIONS DONE YET</center></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
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
@if(Session::has('check'))
@if(Session::get('check'))
<script type="text/javascript">
$(window).load(function(){
    $('#check').modal('show');
});
</script>
@endif
@endif
<script type="text/javascript">

document.getElementById('diesel').addEventListener('keydown', function(e)
{
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


document.getElementById('petrol').addEventListener('keydown', function(e)
{
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
             return;
         }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

</script>

@if(Session::has('success'))
<script>
$(document).ready(function() {
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success("{{Session::get('success')}}");

    }, 1300);

});
</script>
@endif

@if(Session::has('failure'))
<script>
$(document).ready(function() {
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.error("{{Session::get('failure')}}");

    }, 1300);

});
</script>
@endif

<script>
$(document).ready(function() {

    var sparklineCharts = function(){
        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });

        $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });

        $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1C84C6',
            fillColor: "transparent"
        });
    };

    var sparkResize;

    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineCharts, 500);
    });

    sparklineCharts();




    var data1 = [
    [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
    ];
    var data2 = [
    [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
    ];
    $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
        data1,  data2
        ],
        {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,

                borderWidth: 2,
                color: 'transparent'
            },
            colors: ["#1ab394", "#1C84C6"],
            xaxis:{
            },
            yaxis: {
            },
            tooltip: false
        }
        );

});
</script>
<script src="js/plugins/footable/footable.all.min.js"></script>
<script>
$(document).ready(function() {

    $('.footable').footable();
    $('.footable2').footable();

});

</script>


</body>
</html>