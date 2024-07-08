@include("head")

<script>
	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
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
          통계 추가
        </h2>
      </div>

    <div class="service_container">
		
		<div class="card text-center my_container">		  
			<div class="card-body" style="margin-top: 20px;">
				<form name="form1" method="post" action="{{ route('stats.store') }}{{ $tmp }}">
				@csrf
				@method('POST')
					<input type="hidden" name="visit_cnt" value="0"/>
					<table class="table table-sm table-bordered table-hover mymargin5" style="border-style: hidden;">
						<tr>
							<td class="mycolor2 my_table_color radius_top_left">날짜</td>
							<td class="radius_top_right" align="left">
								<div class="d-inline-flex" style="width: 30%;">		
									<div class="input-group input-group-sm date" id="text1">
										<span class="input-group-text">날짜</span>
										<input type="text" name="run_day" size="10" value="" class="form-control">
										<span class="input-group-text">
											<div class="input-group-addon">
												<i class="far fa-calendar-alt fa-lg"></i>
											</div>
										</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color">놀이기구명</td>
							<td>
								<div class="fd-inline-flex">
									<select name="attraction_id" class="form-select form-select-sm">
										<option value="" selected>선택하세요.</option>
										@foreach ($list as $row)
											<option value="{{ $row->id }}">{{ $row->name }}</option>
										@endforeach
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td class="mycolor2 my_table_color radius_bottom_left">이용객 수</td>
							<td class="radius_bottom_right">
								<div class="fd-inline-flex">
									<input type="text" name="customer_cnt" class="form-control form-control-sm input_bottom_right" value="{{ old('etc') }}">
								</div>
							</td>
						</tr>
					</table>
					
					<div align="center">
						<input type="submit" value="저장" class="btn hmycolor1 btn-success my_button button_radius">
						<!-- <input type="button" value="이전화면" class="btn btn-sm hmycolor1 btn btn-sm btn-primary"> -->
					</div>
				</form> 
			</div>
		  </div>
    </div>
	
	<div class="btn-box">
		<a href="{{ route('stats.index') }}{{ $tmp }}">
		  이전화면
		</a>
	</div>
	
	</section>
	<!-- end service section -->

	<div class="footer_bg">

    <!-- contact section -->
    


    <!-- end contact section -->

	@include("bottom")


</body>

</html>