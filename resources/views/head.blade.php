<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>MegaLand</title>

    <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('my/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('my/css/my/bootstrap.css') }}" />

	

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('my/css/my/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('my/css/my/responsive.css') }}" rel="stylesheet" />
  
  <link href="{{ asset('my/css/my/my.css') }}" rel="stylesheet" />
  
	<link href="{{ asset('my/css/bootstrap5-datetimepicker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('my/css/all.min.css') }}" rel="stylesheet">
	
	<script src="{{ asset('my/js/jquery-3.6.0.min.js') }}"></script>
	
	<script>
		(function ($) {
        'use strict'
        setTimeout(function () {
            if (window.___browserSync___ === undefined && Number(localStorage.getItem('MessageShowed')) < Date.now()) {
                localStorage.setItem('MessageShowed', (Date.now()) + (15 * 60 * 1000))
                // eslint-disable-next-line no-alert
                alert('관리자로 로그인 해야 추가/수정/삭제가 가능합니다.')
            }
        }, 3000)
    })(jQuery)
	</script>
</head>