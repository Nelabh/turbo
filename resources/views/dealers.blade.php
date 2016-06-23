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
                                <a href="" class="btn btn-primary btn-xs">Add new dealer</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Project</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th data-hide="all">Company</th>
                                    <th data-hide="all">Completed</th>
                                    <th data-hide="all">Task</th>
                                    <th data-hide="all">Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Project - This is example of project</td>
                                    <td>Patrick Smith</td>
                                    <td>0800 051213</td>
                                    <td>Inceptos Hymenaeos Ltd</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td>Jul 14, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Alpha project</td>
                                    <td>Alice Jackson</td>
                                    <td>0500 780909</td>
                                    <td>Nec Euismod In Company</td>
                                    <td><span class="pie">6,9</span></td>
                                    <td>40%</td>
                                    <td>Jul 16, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Betha project</td>
                                    <td>John Smith</td>
                                    <td>0800 1111</td>
                                    <td>Erat Volutpat</td>
                                    <td><span class="pie">3,1</span></td>
                                    <td>75%</td>
                                    <td>Jul 18, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Gamma project</td>
                                    <td>Anna Jordan</td>
                                    <td>(016977) 0648</td>
                                    <td>Tellus Ltd</td>
                                    <td><span class="pie">4,9</span></td>
                                    <td>18%</td>
                                    <td>Jul 22, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Alpha project</td>
                                    <td>Alice Jackson</td>
                                    <td>0500 780909</td>
                                    <td>Nec Euismod In Company</td>
                                    <td><span class="pie">6,9</span></td>
                                    <td>40%</td>
                                    <td>Jul 16, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Project
                                        <small>This is example of project</small>
                                    </td>
                                    <td>Patrick Smith</td>
                                    <td>0800 051213</td>
                                    <td>Inceptos Hymenaeos Ltd</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td>Jul 14, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Gamma project</td>
                                    <td>Anna Jordan</td>
                                    <td>(016977) 0648</td>
                                    <td>Tellus Ltd</td>
                                    <td><span class="pie">4,9</span></td>
                                    <td>18%</td>
                                    <td>Jul 22, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Project
                                        <small>This is example of project</small>
                                    </td>
                                    <td>Patrick Smith</td>
                                    <td>0800 051213</td>
                                    <td>Inceptos Hymenaeos Ltd</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td>Jul 14, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Alpha project</td>
                                    <td>Alice Jackson</td>
                                    <td>0500 780909</td>
                                    <td>Nec Euismod In Company</td>
                                    <td><span class="pie">6,9</span></td>
                                    <td>40%</td>
                                    <td>Jul 16, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Betha project</td>
                                    <td>John Smith</td>
                                    <td>0800 1111</td>
                                    <td>Erat Volutpat</td>
                                    <td><span class="pie">3,1</span></td>
                                    <td>75%</td>
                                    <td>Jul 18, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Gamma project</td>
                                    <td>Anna Jordan</td>
                                    <td>(016977) 0648</td>
                                    <td>Tellus Ltd</td>
                                    <td><span class="pie">4,9</span></td>
                                    <td>18%</td>
                                    <td>Jul 22, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Alpha project</td>
                                    <td>Alice Jackson</td>
                                    <td>0500 780909</td>
                                    <td>Nec Euismod In Company</td>
                                    <td><span class="pie">6,9</span></td>
                                    <td>40%</td>
                                    <td>Jul 16, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Project
                                        <small>This is example of project</small>
                                    </td>
                                    <td>Patrick Smith</td>
                                    <td>0800 051213</td>
                                    <td>Inceptos Hymenaeos Ltd</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td>Jul 14, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Gamma project</td>
                                    <td>Anna Jordan</td>
                                    <td>(016977) 0648</td>
                                    <td>Tellus Ltd</td>
                                    <td><span class="pie">4,9</span></td>
                                    <td>18%</td>
                                    <td>Jul 22, 2013</td>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                </tr>
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
</body>
</html>
