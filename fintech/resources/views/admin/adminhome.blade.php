@extends('admin.admin')
@section('users')



<div class="ag-format-container">
    <div class="ag-courses_box">
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-store   fa-users ag-courses-item_title ">Total Users </div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 80px" >{{ $users->count() }}</span>
          </div>
  
          
        </div>
      </div>
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-user ag-courses-item_title "> U s e r s </div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 80px" >{{ $nusers->count() }}</span>
          </div>
  
          
        </div>
      </div>
      <div class="ag-courses_item">
        <div class="ag-courses-item_link">
          <div class="ag-courses-item_bg "></div>
          <div class="fa-solid fa-store ag-courses-item_title ">V e n d o r s</div>
          <div class="ag-courses-item_title">
            <br><span style="margin:130px;font-size: 80px" >{{ $vendors->count() }}</span>
          </div>
  
          
        </div>
      </div>
  
 
  
    </div>
  </div>
@endsection



