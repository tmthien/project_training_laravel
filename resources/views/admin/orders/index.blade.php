@extends('adminlte::layouts.app')
@section('css')
<style>
  span.abe:hover {
            cursor: not-allowed;
        }
</style>
@endsection
@section('main-content')    

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{Session::get('thongbao')}}
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                    <tr>
                                        
                                        @php($json_decode = json_decode($item->products, true))
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>
                                        @foreach($json_decode['info'] as $info)
                                            <span>{{$info['name']}} | {{$info['price']}} | x{{$info['quantity']}}</span> </br> </span>
                                        @endforeach 
                                        </td>
                                        <td>{{$json_decode['totalQuantity']}}</td>
                                        <td>{{$json_decode['totalPrice']}}</td>
                                        <td class="text-left">
                                          <div>
                                            
                                          </div>
                                          @if($item->approve_id == 4 || $item->approve_id == 5)
                                              <span class="label-color btn btn-sm abe" id="status-{{ $item->id }} " disabled
                                                    data-id="{{ $item->id }}"
                                                    style="background-color: {{ optional($item->approve)->color }};">{{ optional($item->approve)->name }}</span>
                                          @else
                                              <span class="label-color btn btn-sm status-btn" id="status-{{ $item->id }}"
                                                    data-id="{{ $item->id }}"
                                                    style="background-color: {{ optional($item->approve)->color }};">{{ optional($item->approve)->name }}</span>
                                          @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $order->links() }}
                    </div>
                </div>  
			</div>
		</div>
	</div>
@endsection

@include('admin.orders.modal')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('body').on('click', '.status-btn', function () {
    $('#modal-status-js').modal('show');
    var id = $(this).data("id");
    $.ajax({
      url: 'orders/ajax/getModalStatus/' + id,
      type: 'GET',
      success: function(response) {
        if (response.success = true) {
          var data = response.data;
            $("input[name=book_id]").val(data.id);
            $("#approve_id").val(data.approve_id);

        }
      },
    });
  });
  $(".btn-change-status").click(function (e) {
      e.preventDefault();
      var id = $("input[name=book_id]").val();
      var approve = $("select[name='approve']").val();
      $.ajax({
          type: "PUT",
          url: 'orders/ajax/updateModalStatus',
          data: {
              _token: '{{ csrf_token() }}',
              'id': id,
              'approve_id': approve
          },
          success: function(response) {
            if (response.success = true) {
              alert('Cập nhập trạng thái đơn hàng thành công!');
              var loaded = false;
              var time = 1000;
              window.onload = function() {
                loaded = true;
              };
              setTimeout(function() {
                if (!loaded) {
                  window.location.reload();
                }
              }, time);
            }
          },
        });
  });

</script>