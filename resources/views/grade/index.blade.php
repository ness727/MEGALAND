@include("head")

<script>
	function find_text() {
		form1.action = "{{ route('grade.index') }}";
		form1.submit();
	}
</script>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    @include("top")
    <!-- end header section -->
  </div>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          등급 조회
        </h2>
      </div>

      <div class="service_container">
		
		<div class="card text-center my_container">
		
			<div class="d-inline-flex" style="margin-top: 25px;">
				<div style="width: 78%;">
				</div>
				<form name="form1" method="get" action="">
					<div class="input-group input-group-sm" style="padding-right: 7%;">
						<input type="text" name="text1" value="{{ $text1 }}" class="form-control" placeholder="등급명을 입력하세요" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" 
								style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; height: 33px;" >
						<button class="btn" type="button" onClick="find_text();" 
							style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;
								background-color: #d8bf36; color: #ffffff; margin-right: 5%; height: 33px; padding-top: 4px;">검색</button>
							
						@if (session()->get("grade") == 99)							
							<a href="{{route('grade.create')}}" class="btn btn-success mybutton-blue my_button" style="padding-top: 5px; height: 33px; border-radius: 10px;">추가</a>
						@endif
					</div>
				</form>
				
				
			</div>
			
		  <div class="card-body" style="overflow: auto;">
			<table class="table table-sm table-bordered table-hover my-1" style="border-style: hidden;">
				<tr class="my_table_color">
					@if (session()->get("grade") == 99)
						<td width="10%" class="radius_top_left">번호</td> 
						<td width="25%">등급명</td>
						<td width="10%" class="radius_top_right"></td>
					@else
						<td class="radius_top_left radius_top_right">등급명</td>
					@endif
					
				</tr>
				
				@foreach ($list  as  $row)
					<tr>
						@if (session()->get("grade") == 99)
							@if ($loop->last)
								<td class="radius_bottom_left">{{$row->id}}</td>
							@else
								<td>{{$row->id}}</td>
							@endif
							
							<td>{{$row->name}}</td>
						
							@if ($loop->last)
							<td class="radius_bottom_right">
							@else
							<td>
							@endif
								<div class="d-inline-flex">
									<a href="{{route('grade.show', $row->id)}}{{ $tmp }}" class="btn btn-sm btn-secondary mybutton-blue my_button button_radius">수정</a>&nbsp
								</div>
							</td>
						@else
							@if ($loop->last)
								<td class="radius_bottom_left radius_bottom_right">{{$row->name}}</td>
							@else
								<td>{{$row->name}}</td>
							@endif
						@endif
					</tr>
				@endforeach
			</table>
		  </div>
		  
		  <div class="card-footer text-muted">
			{{ $list->appends(['text1' => $text1])->links('mypagination') }}
		  </div>
		  
		</div>
        
	
      </div>
    </div>
  </section>
  <!-- end service section -->

  <div class="footer_bg">

    <!-- contact section -->
    


    <!-- end contact section -->

	@include("bottom")


</body>

</html>