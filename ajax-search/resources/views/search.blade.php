@extends('layouts.app')

@section('content')


<div class="table-responsive">
    <h3 class="center">Total Data : <span id="total_records"></span></h3>
    <div class="form-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
    </div>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

{{-- scrip --}}
<script>
    $(document).ready(function(){
            fetch_customer_data();
        })

        function fetch_customer_data(query = ''){
            $.ajax({
                url:"{{ route('search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data){
                    //replace tbody dan total record dari controller
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup','#search',function(){
            //record input 
            var query = $(this).val();

            //return
            fetch_customer_data(query);
        })
</script>
@endsection