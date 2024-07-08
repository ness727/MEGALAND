@include("head")

<script>
	function find_text() {
		form1.action = "{{ route('stats.index') }}";
		form1.submit();
	}
	
	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
		});
		
		$('#text2').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
		});
		
		$("#text1").on("dp.change", function(e) {
			find_text();
		});
		
		$("#text2").on("dp.change", function(e) {
			find_text();
		});
	});
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
          통계
        </h2>
      </div>

      <div class="service_container">
		
		<div class="card text-center my_container" style="margin-bottom: 1%;">
			<script src="{{ asset('my/js/chart.min.js') }}"></script>
		
			<div class="card text-center my_container d-inline-flex mx-auto" style="margin: 3%;">
				<canvas id="myChart"></canvas>				
			</div>
			
			<script>
				const ctx = document.getElementById('myChart');
				const myChart = new Chart(ctx, {
					type: 'bar',
					data: {
							labels: [{!! $str_label !!}],
							datasets: [{
								label: '놀이기구 이용 통계',
								data: [ {{ $str_data }} ],
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(255, 159, 64, 0.2)',
									'rgba(255, 205, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(153, 102, 255, 0.2)',
									'rgba(201, 203, 207, 0.2)'
								],
								borderColor: [
								  'rgb(255, 99, 132)',
								  'rgb(255, 159, 64)',
								  'rgb(255, 205, 86)',
								  'rgb(75, 192, 192)',
								  'rgb(54, 162, 235)',
								  'rgb(153, 102, 255)',
								  'rgb(201, 203, 207)'
								],
								borderWidth: 1
							}]
					},
				});
			</script>
		</div>
		
		<div class="card text-center my_container">
		
			<div class="d-inline-flex" style="margin-left: 13%; margin-top: 25px; margin-right: 1.5%;  margin-left: 4%; color: black;">
			
				<form name="form1" method="get" action="" class="d-inline-flex" style="width: 100%;">
						
					<div class="input-group input-group-sm date" id="text1">
						<span class="input-group-text">날짜</span>
						<input type="text" name="text1" size="10" value="{{ $text1 }}" class="form-control" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" style="height: 38px;">
						<span class="input-group-text">
							<div class="input-group-addon">
								<i class="far fa-calendar-alt fa-lg"></i>
							</div>
						</span>
					</div>
					&nbsp~&nbsp
					<div class="input-group input-group-sm date" id="text2">
						<input type="text" name="text2" size="10" value="{{ $text2 }}" class="form-control" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" style="height: 38px;">
						<span class="input-group-text">
							<div class="input-group-addon">
								<i class="far fa-calendar-alt fa-lg"></i>
							</div>
						</span>
					</div>
						
					<div style="width: 150vh;">
					</div>
					
					<div class="input-group input-group-sm" style="width: 150vh;">
						<input type="text" name="text3" value="{{ $text3 }}" class="form-control" placeholder="놀이기구명을 입력하세요" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" 
								style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; height: 33px;" >
						<button class="btn" type="button" onClick="find_text();" 
							style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;
								background-color: #d8bf36; color: #ffffff; margin-right: 5%; height: 33px; padding-top: 4px;">검색</button>
						@if (session()->get("grade") == 99)		
							<a href="{{route('stats.create')}}" class="btn btn-success mybutton-blue my_button" style="padding-top: 5px; height: 33px; border-radius: 10px;">추가</a>
						@endif
					</div>
				</form>
			</div>
			
		  <div class="card-body" style="overflow: auto;">
			<table class="table table-sm table-bordered table-hover my-1" style="border-style: hidden;">
				<tr class="my_table_color">
				
					@if (session()->get("grade") == 99)
						<td width="15%" class="radius_top_left">날짜</td> 
						<td width="15%">놀이기구명</td>
						<td width="10%">이용객 수</td>
						<td width="5%" class="radius_top_right"></td>
					@else
						<td width="15%" class="radius_top_left">날짜</td>
						<td width="15%">놀이기구명</td>
						<td width="10%" class="radius_top_right">이용객 수</td>
					@endif
				</tr>
				
				@foreach ($list  as  $row)       
				<tr>
					@if ($loop->last)
						<td class="radius_bottom_left">{{$row->run_day}}</td>
					@else
						<td>{{$row->run_day}}</td>
					@endif
					
					<td>{{$row->attraction_name}}</td>
					
					@if (session()->get("grade") == 99)
						<td>{{$row->customer_cnt}}</td>
					
						@if ($loop->last)
							<td class="radius_bottom_right">
						@else
							<td>
						@endif
							<div class="d-inline-flex">
								<a href="{{route('stats.show', $row->id)}}{{ $tmp }}" class="btn btn-sm btn-secondary mybutton-blue my_button button_radius">수정</a>&nbsp
							</div>
						</td>
					@else
						@if ($loop->last)
							<td class="radius_bottom_right">{{$row->customer_cnt}}</td>
						@else
							<td>{{$row->customer_cnt}}</td>
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