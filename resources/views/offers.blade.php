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
               <div class="signup-form" id="error">
                @if($errors->has())
                <p>
                  {{$errors->first('amount',':message')}} </p>
                  <p>  {{$errors->first('percent',':message')}} </p>
                  <p>  {{$errors->first('type',':message')}} </p>
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
                            <h5>Offers list</h5>
                            <div class="ibox-tools">
                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal5">Add new offer</a>


                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                            placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Discount Percent</th>
                                        <th>Discount Type</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($offers))
                                    <?php $i = 1;?>
                                    @foreach($offers as $offer)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$offer->discount_percent}}
                                        </td>
                                        <td>{{$offer->refill_type}}</td>
                                        <td>{{$offer->discount_volume}}</td>
                                        <td><a href = "{{URL::route('delete_offer',$offer->id)}}"class="btn btn-outline btn-danger" type="button">
                                            <i class="fa fa-trash-o"></i> <span class="bold">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @else
                                <tr class="gradeX">
                                    <td colspan="5"><center>NO OFFER ADDED</center></td>
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
                    <h4 class="modal-title">Add New Offer</h4>
                </div>
                <form method="post" action = "{{URL::route('add_offer')}}" class="form-horizontal">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group"><label class="col-sm-2 control-label">Discount On :</label>

                            <div class="col-sm-10"><select class="form-control m-b" required name="refill_type" onchange = "handler()" id="refill">
                                <option value = "" >Select Refill Type</option>
                                <option value = "ft">First Timers</option>
                                <option value = "diesel">Diesel</option>
                                <option value = "petrol">Petrol</option>
                            </select>
                        </div>
                    </div>
                    <div id = "amt" class="form-group"><label class="col-sm-2 control-label">Offer Availability</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" name = "discount_volume" id ="amount" placeholder = "Discount Available After Specified Amount Of Fuel Purchase" required  class="form-control"> <span class="input-group-addon">Liters</span></div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Discount Percentage</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" class="form-control" name = "discount_percent" id ="percent" maxlength = "2" placeholder = "Percentage Of Discount" required> <span class="input-group-addon">%</span></div>
                        </div>
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

function handler() {
    var str = document.getElementById("refill").value; 
    if(!str.localeCompare("ft")){
        document.getElementById("amount").value = "0";
        $('#amt').hide();
     }else{
        document.getElementById("amount").value = "";
        $('#amt').show();
        
    }
    
}

</script>


<script>
document.getElementById('amount').addEventListener('keydown', function(e)
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


document.getElementById('percent').addEventListener('keydown', function(e)
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

</body>
</html>
