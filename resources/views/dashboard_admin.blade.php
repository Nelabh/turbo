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
                            <a href="{{URL::asset('logout')}}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="wrapper wrapper-content animated fadeIn">

                <div class="p-w-md m-t-sm">
                    <div class="row">

                      @if(count($dealer))
                      
                        <div class="col-sm-4">

                            <div class="row m-t-xs">
                                <div class="col-xs-6">
                                    <h5 class="m-b-xs">Total Volume</h5>
                                    <h1 class="no-margins">{!! $dealer->total !!}</h1>
                                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                </div>
                                <div class="col-xs-6">
                                    <h5 class="m-b-xs">Sals current year</h5>
                                    <h1 class="no-margins">42,120</h1>
                                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                </div>
                            </div>


                           
                        </div>
                        @endif

                    </div>

                    <div class="row">
                       
                            <div class="flot-chart m-b-xl">
                                <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">



                                <div class="ibox-content">

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">

                                                <label class="control-label" for="product_name">S.No<label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label" for="product_name">Customer Code<label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                           <div class="form-group">
                                                <label class="control-label" for="pump_name">Pump name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" for="count">Total customers added</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" for="total_volume">Total sales</label>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                           <?php $id=0;  ?>

                                            <tbody>
                                                @if(count($dealer))

                                                @foreach($dealer as $deal)

                                                
                                                <tr>
                                                    <td><?php ++$id ?></td>
                                                    <td>{!! $deal->customer_code !!}</td>
                                                    <td>{!! $deal->Pump_name !!}</td>
                                                    <td>{!! $deal->customers !!}</td>
                                                    <td>{!! $deal->volume !!}</td>
                                                    
                                                </tr>

                                                
                                                @endforeach
                                                

                                                @else

                                              <center>  <td colspan = "5">No Dealer Added</td></center>
                                              @endif
                                            </tbody>
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

@if(Session::has('success'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.success("{{Session::get('success')}}");

            }, 1300);

        });
          </script>
          @endif
@if(Session::has('login'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.success("{{Session::get('login')}}");

            }, 1300);

        });
          </script>
          @endif

</body>
</html>
