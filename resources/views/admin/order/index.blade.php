@extends('admin.layout.master')
@section('content') 
<div style="background:  #66CC33;height: 40px">
     <h3 style="text-align: center;color:white"><i>Chào mừng bạn tới trang đặt hàng</i></h3> <br> 
  </div> 
        @if(session('status'))
    <div style="background: #66CC33;height: 50px;margin-bottom: -25px">
      <p style="text-align: center;color:white">{{session('status')}}</p>
      </div><br>
  @endif
  <div class="form-inline" style="margin-top: 40px;margin-left: 800px;margin-bottom: -20px">
         <form class="search-form" method="get" action="{{route('search-order')}}">
             @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."  name='key' id='key'>
                <button class="search" type="submit"><i class="fa fa-search" style="width: 20px;height: 20px"></i></button>
          </form>
                        </div>
    <div class="loc" >                    
        <select name="statusID" id="statusID">
          <option value="0">--Lọc theo trạng thái--</option>
          <option value="1">Đã nhận đơn</option>
          <option value="2">Đã giao hàng </option>
          <option value="3">Đã hũy đơn</option>
       </select>
    </div>
    <table class="table table-hover">
      <thead>
        <tr style="background:#666666 ;color:white;border: 1px solid black" >
          <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black ">ID</th>
             <th style=" text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">Ngày đặt hàng</th>
              <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">Người nhận</th>
               <th style="text-align: center; border-right: 1px solid black;border-bottom: 1px solid black">Địa chỉ</th>
                 <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">Số điện thoại</th>
                    <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">Khách hàng</th>
                     <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">Chú thích</th>
                      <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black" >Trạng thái</th>
                        <th style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black" >Thao tác</th>
                          <th style="text-align: center;border-bottom: 1px solid black"></th>


          </tr>
        </thead>
        <tbody>

       @foreach($order as $item)
      <?php 
        $user=App\User::where('id',$item->user_id)->first();
        ?>

          <tr>
            <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black"><b>{{$item->id}}</b></td>
                <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">{{$item->time_order}}</td>
                 <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black"><b>{{$item->name}}</b></td>
                   <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">{{$item->address}}</td>
                       <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">{{$item->phone}}</td>
                         <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black"><b>{{$user->name}}</b></td>
                          <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black">{{$item->note}}</td>
                           <td style="text-align: center;color: red;border-right: 1px solid black;border-bottom: 1px solid black"><b>{{$item->status}}</b></td>
                             <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black"><a href="{{route('detail-order',$item->id)}} " class="btn btn-primary"><i class='fas fa-edit'></i></a> </td> 
                                 <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black"> <form action="{{ route('delete-order',$item->id)}}" method="">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> 

            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
      <div class="pagina" >
                  <ul class="pagination" style="margin-left: 500px">
                      @if($order->currentPage()!=1)
                          <li><a href="{!!str_replace('/?','?',$order->url($order->lastPage()-1))!!}" style="font-size:120%">&laquo;</a></li>
                      @endif
                         @for($i=1;$i<=$order->lastPage();$i=$i+1)
                            <li><a href="{!!str_replace('/?','?',$order->url($i))!!}" style="font-size:120%" >{!!$i!!}|</a></li>
                         @endfor
                    @if($order->currentPage() !=$order->lastPage())
                          <li><a href="{!!str_replace('/?','?',$order->url($order->lastPage()+1))!!}" style="font-size:120%">&raquo;</a></li>
                    @endif
                </ul>
             </div>
  <script >
   $(document).ready(function() {
 alert('vuong');
   } );

  
  </script>
   
@endsection
