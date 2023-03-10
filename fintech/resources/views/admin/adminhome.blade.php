@extends('admin.admin')
@section('users')



<div class="ag-format-container">
    <div class="ag-courses_box">
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid    fa-users ag-courses-item_title "> T o t a l &nbsp;  U s e r s </div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 50px" >{{ $users->count() }}</span>
          </div>
  
          
        </div>
      </div>
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-user ag-courses-item_title "> U s e r s  </div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 50px" >{{ $nusers->count() }}</span>
          </div>
  
          
        </div>
      </div>
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-store ag-courses-item_title "> V e n d o r s </div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 50px" >{{ $vendors->count() }}</span>
          </div>
  
          
        </div>
      </div>
  
      <div class="ag-courses_item mt-3">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-money-bill-trend-up mr-3 ag-courses-item_title "> T r a n s a c t i o n s</div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 50px" >{{ $transactions->count() }}</span>
          </div>
  
          
        </div>
      </div>
      <div class="ag-courses_item mt-3">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-circle-dollar-to-slot mr-3 ag-courses-item_title "> T o t a l &nbsp;&nbsp;B a l a n c e</div>
          <div class="ag-courses-item_title">
            <br><span style="margin:40px;font-size: 2.65rem" >{{$balance.'EGP'}}</span>
          </div>
  
          
        </div>
      </div>
    </div>
  </div>
@endsection



