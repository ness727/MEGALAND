@include("head")

<script>
	function find_text() {
		form1.action = "{{ route('account.index') }}";
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
          회원 조회
        </h2>
      </div>

      <div class="service_container">
		
		<div class="card text-center my_container">
		
			<div class="d-inline-flex" style="margin-top: 25px;">
				<div style="width: 78%;">
				</div>
				<form name="form1" method="get" action="">
					<div class="input-group input-group-sm" style="padding-right: 7%;">
						<input type="text" name="text1" value="{{ $text1 }}" class="form-control" placeholder="이름을 입력하세요" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" 
								style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; height: 33px;" >
						<button class="btn" type="button" onClick="find_text();" 
							style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;
								background-color: #d8bf36; color: #ffffff; margin-right: 5%; height: 33px; padding-top: 4px;">검색</button>
								
						<a href="{{route('account.create')}}" class="btn btn-success mybutton-blue my_button" style="padding-top: 5px; height: 33px; border-radius: 10px;">추가</a>
					</div>
				</form>
				
				
			</div>
			
		  <div class="card-body" style="overflow: auto;">
			<table class="table table-sm table-bordered table-hover my-1" style="border-style: hidden;">
				<tr class="my_table_color">
					<td width="10%" class="radius_top_left">이름</td>
					<td width="10%">비밀번호</td>
					<td width="10%">나이</td>
					<td width="15%">전화번호</td>
					<td width="10%">방문 횟수</td>
					<td width="10%">등급</td>
					<td width="25%">기타</td>
					<td width="10%" class="radius_top_right"></td>
				</tr>
				
				@foreach ($list  as  $row)       
				<tr>
					@if ($loop->last)
						<td class="radius_bottom_left">{{$row->name}}</td>
					@else
						<td>{{$row->name}}</td>
					@endif
					
					<td>{{$row->pwd}}</td>
					<td>{{$row->age}}</td>
					<td>
						@if (is_numeric($row->phone) && strlen($row->phone) == 11) 
							{{substr($row->phone, 0, 3) . "-" . substr($row->phone, 3, 4) . "-" . substr($row->phone, 7, 4) }}
						@else
							{{$row->phone}}
						@endif
					</td>
					<td>{{$row->visit_cnt}}</td>
					<td>{{$row->grade_name}}</td>
					<td>{{$row->etc}}</td>
					@if ($loop->last)
						<td class="radius_bottom_right">
					@else
						<td>
					@endif
						<div class="d-inline-flex">
							<a href="{{route('account.show', $row->id)}}{{ $tmp }}" class="btn btn-sm btn-secondary mybutton-blue my_button button_radius">수정</a>&nbsp
						</div>
					</td>
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