@include("head")
<link href="{{ asset('my/css/my/card.css') }}" rel="stylesheet" />

<body>

  <div class="hero_area">
    <!-- header section strats -->
    @include("top")
    <!-- end header section -->
    @include("banner")
  </div>  <!-- end hero_area -->

  <!-- about section -->

  <section class="about_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('my/img/my/main_image_edit.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box my_font_background">
            <div class="heading_container">
              <h1 style="font-weight: bold; font-size: 1.95em;">
				@if (session()->exists("name")) {{ session()->get("name") . " 님" }}<br/>@endif
                MegaLand에 오신 것을 환영합니다!
              </h1>
            </div>
            <p style="padding-left: 10%; padding-right: 10%; font-weight: 600;">
              MegaLand는 2023년에 개장한 놀이공원으로 세계 최대의 규모를 자랑합니다.
			  원더 익스프레스, 미라클 스윙, 마법 대탐험 등 MegaLand의 대표적인 놀이기구는 물론
			  동물원, 스키장, 오락실 등의 다양한 경험을 할 수 있는 시설도 마련되어 있습니다.
            </p>
            <a href="" style="-webkit-text-fill-color: white">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h1 style="margin-bottom: 20px;">
          서비스 제공
        </h1>
        <p>
          MegaLand에서는 다음과 같은 특별한 서비스를 제공해요
        </p>
      </div>

      <div class="service_container card-container" onClick="moveF();">
	  
        <div class="box card" id="card1">
          <div>
            <img src="{{ asset('my/img/my/s-1.png') }}" alt="">
			<h5>
              지도 제공
            </h5>
            <p>
              지도를 이용하여 어떤 놀이기구가 어느 곳에 위치해 있는지 빠르게 찾을 수 있어요
            </p>
          </div>
        </div>
		
        <div class="box card" id="card2">
          <div>
            <img src="{{ asset('my/img/my/s-2.png') }}" alt="">
			<h5 style="text-align: center;">
              혼잡도 확인
            </h5>
            <p>
              놀이기구 입장을 위해 어느정도 시간이 걸릴지 앱으로 확인 가능해요
            </p>
          </div>
        </div>
		
        <div class="box card" id="card3">
          <div>
            <img src="{{ asset('my/img/my/s-3.png') }}" alt="">
			<h5>
              입장권 예약
            </h5>
            <p>
              스마트폰 앱을 통해 미리 예약하여 빠르게 입장이 가능해요
            </p>
          </div>
        </div>
		
        <div class="box card" id="card4">
          <div>
            <img src="{{ asset('my/img/my/s-4.png') }}" alt="">
			<h5>
              방송
            </h5>
            <p>
              어디서든 여러 유용한 정보를 얻거나 음악을 즐길 수 있어요
            </p>
          </div>
        </div>
		
		
      </div>
      <div class="btn-box">
        <a onClick="moveB();" style="cursor: pointer;">
          Close
        </a>
      </div>
    </div>
  </section>
  <!-- end service section -->

  <!-- team section -->

  <section class="team_section layout_padding2-bottom" style="margin-top: 5%;">
    <div class="container">
      <div class="heading_container my_font_background">
        <h1>
          인기 놀이기구
        </h1>
        <p>
          남녀노소 모두가 좋아할만한 놀이기구를 모아 봤어요
        </p>
      </div>
    </div>
    <div class="team_container">
      <div class="box b-1">
        <div class="img-box">
          <img src="{{ asset('my/img/my/main1.jpg') }}" alt="" style="border-radius: 1.5rem;">
        </div>
        <div class="detail-box main_theme_color">
          <h5>
            문보트
          </h5>
          <p>
            연인과 함께 보트 위에서 로맨틱한 시간을 보내보세요
          </p>
          <div class="social_box">
            <a href="">
              <img src="{{ asset('my/img/my/fb.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/twitter.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/linkedin.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/insta.png') }}" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="box b-2">
        <div class="img-box">
          <img src="{{ asset('my/img/my/main2.jpg') }}" alt="" style="border-radius: 1.5rem;">
        </div>
        <div class="detail-box main_theme_color">
          <h5>
            원더 익스프레스
          </h5>
          <p>
            원더 익스프레스를 타고 동화같은 환상의 나라를 경험해보세요
          </p>
          <div class="social_box">
            <a href="">
              <img src="{{ asset('my/img/my/fb.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/twitter.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/linkedin.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/insta.png') }}" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="box b-3">
        <div class="img-box">
          <img src="{{ asset('my/img/my/main3.jpg') }}" alt="" style="border-radius: 1.5rem;">
        </div>
        <div class="detail-box main_theme_color">
          <h5>
            와일드 러너
          </h5>
          <p>
            거친 야생의 환경을 무사히 지나갈 수 있을까요?
          </p>
          <div class="social_box">
            <a href="">
              <img src="{{ asset('my/img/my/fb.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/twitter.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/linkedin.png') }}" alt="">
            </a>
            <a href="">
              <img src="{{ asset('my/img/my/insta.png') }}" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end team section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container my_font_background">
        <h1>
          방문 후기
        </h1>
        <p>
          메가랜드에 실제로 방문한 사람들의 이야기를 들어보세요
        </p>
      </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('my/img/my/s_nowman.png') }}" alt="" style="border-radius: 5rem;">
              </div>
              <div class="detail-box main_theme_color">
                <h6>
                  스 노우맨
                </h6>
                <p>
                  메가랜드 정말 재미있습니다... <br/>하하하
                </p>
                <img src="{{ asset('my/img/my/quote.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('my/img/my/client.png') }}" alt="">
              </div>
              <div class="detail-box main_theme_color">
                <h6>
                  이준서
                </h6>
                <p>
                  정말 즐거웠어요. 특히 원더 익스프레스가 재밌었어요.<br/>근데 줄 서는 시간이 너무 긴거 같아요.
                </p>
                <img src="{{ asset('my/img/my/quote.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('my/img/my/client.png') }}" alt="">
              </div>
              <div class="detail-box main_theme_color">
                <h6>
                  익명의 사용자
                </h6>
                <p>
                  놀이기구뿐만 아니라<br/>퍼레이드나 공연이 너무 재밌었어요~~!
                </p>
                <img src="{{ asset('my/img/my/quote.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel_btn-container">
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

  </section>

  <!-- end client section -->

  <div class="footer_bg"">

    <!-- contact section -->
    <section class="contact_section layout_padding" id="contactLink" style="padding: 15vh;">
      <div style="height: 100px;">
	  </div>
    </section>


    <!-- end contact section -->
	<script type="text/javascript" src="{{ asset('my/js/my/card.js') }}"></script>
    @include("bottom")

  </div>

  

</body>

</html>