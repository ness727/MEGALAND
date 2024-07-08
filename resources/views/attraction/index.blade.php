@include("head")

<script>
	function find_text() {
		form1.action = "{{ route('attraction.index') }}";
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
          놀이기구 조회
        </h2>
      </div>

      <div class="service_container">
		
		<div class="card text-center my_container">
		
			<div class="d-inline-flex" style="margin-left: 13%; margin-top: 25px; margin-right: 1.5%;">
				<div style="width: 74%;">
				</div>
				<form name="form1" method="get" action="">
					<div class="input-group input-group-sm">
						<input type="text" name="text1" value="{{ $text1 }}" class="form-control" placeholder="놀이기구명을 입력하세요" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" 
								style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; height: 33px;">
						<button class="btn" type="button" onClick="find_text();" 
							style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;
								background-color: #d8bf36; color: #ffffff; margin-right: 5%; height: 33px; padding-top: 4px;">검색</button>
						@if (session()->get("grade") == 99)		
							<a href="{{route('attraction.create')}}" class="btn btn-success mybutton-blue my_button" style="padding-top: 5px; height: 33px; border-radius: 10px;">추가</a>
						@endif
					</div>
				</form>
			</div>
			
		  <div class="card-body" style="overflow: auto;">
			<table class="table table-sm table-bordered table-hover my-1" style="border-style: hidden;">
				<tr class="my_table_color">
					<td width="15%" class="radius_top_left">놀이기구명</td>
					<td width="10%">나이 제한</td>
					<td width="10%">시작 시간</td>
					<td width="10%">종료 시간</td>
					<td width="7%">정원</td>
					@if (session()->get("grade") == 99)
						<td width="7">사진</td>
						<td width="27%">기타</td>
						<td width="15%" class="radius_top_right"></td> 
					@else
						<td width="30%">기타</td>
						<td width="20%" class="radius_top_right"></td>
					@endif
				</tr>
				
				@foreach ($list  as  $row)       
				<tr>
					@if ($loop->last)
						<td class="radius_bottom_left">{{$row->name}}</td>
					@else
						<td>{{$row->name}}</td>
					@endif
					
					<td>{{$row->age_limit}}</td>
					<td>{{$row->start_time}}</td>
					<td>{{$row->end_time}}</td>
					<td>{{$row->capacity}}</td>
					
					@if (session()->get("grade") == 99)
						@if ($row->picture)
							<td>O</td>
						@else
							<td>X</td>
						@endif
					
						<td>{{$row->etc}}</td>
					
						@if ($loop->last)
							<td class="radius_bottom_right">
						@else
							<td>
						@endif
							<?
									$iname = $row->picture ? $row->picture : "";
									$pname = $row->name;
							?>
							<div class="d-inline-flex">
								<a href="{{route('attraction.show', $row->id)}}{{ $tmp }}" class="btn btn-sm btn-secondary mybutton-blue my_button button_radius">수정</a>&nbsp
							
							<div class="btn btn-sm btn-secondary mybutton-blue my_button button_radius"
									href="" data-bs-toggle='modal' data-bs-target='#zoomModal'
									onClick="document.getElementById('zoomModalLabel').innerText='{{ $pname }}';
									picname.src='{{ asset('/storage/attraction_imgs/' . $iname) }}'">
									사진
								</div>&nbsp
								</div>
						</td>
					@else
						<?
								$iname = $row->picture ? $row->picture : "";
								$pname = $row->name;
						?>
							<td>{{$row->etc}}</td>
						@if ($loop->last)
							<td class="radius_bottom_right">
						@else
							<td>
						@endif
							<div class="d-inline-flex">
								<div class="btn btn-sm btn-secondary mybutton-blue my_button button_radius"
									href="" data-bs-toggle='modal' data-bs-target='#zoomModal'
									onClick="document.getElementById('zoomModalLabel').innerText='{{ $pname }}';
									picname.src='{{ asset('/storage/attraction_imgs/' . $iname) }}'">
									사진 보기
								</div>&nbsp
							</div>
						</td>
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

	<!-- Zoom Modal -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true" style="z-index: 100000;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style=" border-radius: 1.5rem;">

			<div class="modal-header bg-light" style=" border-radius: 1.5rem !important;">
               <h5 class="modal-title" id="zoomModalLabel">상품명1</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body" align="center">
				<img src="#" id="picname" class="img-fluid img-thumbnail" style="cursor:pointer; border-radius: 1.5rem;" data-bs-dismiss="modal">
			</div>
		  
       </div>
   </div>
</div>

  <div class="footer_bg">

    <!-- contact section -->
    


    <!-- end contact section -->

	@include("bottom")


</body>

</html>