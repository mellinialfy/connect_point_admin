<?php
//inisialisasi session
session_start();
 
//mengecek username pada session
if( !isset($_SESSION['email_admin'],$_SESSION['id_admin']) ){
  $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
  header("location:/connect-point/api/login_register.php");
} else{
    include "halaman/connection.php";
    
    $id_admin = $_SESSION['id_admin'];
    
    $sql="SELECT nama_lengkap, email_admin, profile_pict FROM `tb_admin` WHERE id_admin=$id_admin";
    $result=mysqli_query($connect,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $nama_lengkap = $row['nama_lengkap'];
        $email_admin = $row['email_admin'];
        $profile_pict = $row['profile_pict'];
        
    }
    
    $query_count_instansi = mysqli_query($connect, "SELECT COUNT(tb_requested_instansi.id_requested_instansi) AS count_instansi FROM tb_requested_instansi WHERE tb_requested_instansi.status_requested = 0");
    $query_count_tenant = mysqli_query($connect, "SELECT COUNT(tb_req_kat_tenant.id_req_kat_tenant) AS count_kat_tenant FROM tb_req_kat_tenant WHERE tb_req_kat_tenant.status_req_kat_tenant = 0");
    $query_count_event = mysqli_query($connect, "SELECT COUNT(tb_req_kat_event.id_req_kat_event) AS count_kat_event FROM tb_req_kat_event WHERE tb_req_kat_event.status_req_kat_event = 0");
    
    while($row_instansi=mysqli_fetch_assoc($query_count_instansi)){
        $count_instansi = $row_instansi['count_instansi'];
    }
    
    while($row_tenant=mysqli_fetch_assoc($query_count_tenant)){
        $count_kat_tenant = $row_tenant['count_kat_tenant'];
    }
    
    while($row_event=mysqli_fetch_assoc($query_count_event)){
        $count_kat_event = $row_event['count_kat_event'];
    }
    
    mysqli_free_result($sql);
    mysqli_close($connect);
}
 
?>

<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    
    <!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->
		
		<!--begin::Page Vendors Styles(used by this page(user_tenant.php & user_eo.php, user_tenant.php & user_eo.php)) -->
		<link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->
		
		
		
		

		
		
		

		<!--begin:: Global Mandatory Vendors -->
		<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="assets/demo/demo9/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="assets/media/my_icons/logo_connect_point_logo.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page--loading-enabled kt-page--loading kt-page--fluid kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--skin-light kt-aside__brand--skin-light kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<!--<a href="index.html">-->
				<!--	<img alt="Logo" src="assets/media/logos/logo-9-sm.png" />-->
				<!--</a>-->
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container kt-container--fluid">

							<!-- begin: Header Menu -->
							<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
								<button class="kt-aside-toggler kt-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
							</div>

							<!-- end: Header Menu -->

							<!-- begin:: Brand -->
							<div class="kt-header__brand  kt-aside__brand--skin-light   kt-grid__item" id="kt_header_brand">
								<!--<a class="kt-header__brand-logo" href="index.html">-->
								<!--	<img alt="Logo" src="assets/media/my_icons/logo_connect_point.ico" />-->
								<!--</a>-->
							</div>

							<!-- end:: Brand -->

							<!-- begin:: Header Topbar -->
							<div class="kt-header__topbar kt-grid__item">

								



								

								

								<!--begin: User bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
										<span class="kt-header__topbar-username kt-visible-desktop"><?php echo $nama_lengkap?></span>
										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<?php 
										if($profile_pict != null || "") {
										    echo '<img alt="Pic" src="'.$profile_pict.'" />';
										} else {
										    echo '<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">';
    										
    										$result = strtoupper($nama_lengkap[0]);
    										echo $result;
    										
    										echo'</span>';
										}
										?>
										
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

										<!--begin: Head -->
										<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
											<div class="kt-user-card__avatar">
											    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											    <?php 
        										if($profile_pict != null || "") {
        										    
        										    echo '<img class="kt-hidden-" alt="Pic" src="'.$profile_pict.'" />';
        										} else {
        										    echo '<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">';
            										
            										$result = strtoupper($nama_lengkap[0]);
            										echo $result;
            										
            										echo'</span>';
        										}
        										?>
												
												
											</div>
											<div class="kt-user-card__name">
												<?php echo $nama_lengkap?>
											</div>
										</div>

										<!--end: Head -->

										<!--begin: Navigation -->
										<div class="kt-notification">
											<a href="?page=profil" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-calendar-3 kt-font-success"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														Profil Saya
													</div>
													<div class="kt-notification__item-time">
														Pengaturan akun dan lainnya
													</div>
												</div>
											</a>
											<!--<a href="#" class="kt-notification__item">-->
											<!--	<div class="kt-notification__item-icon">-->
											<!--		<i class="flaticon2-rocket-1 kt-font-danger"></i>-->
											<!--	</div>-->
											<!--	<div class="kt-notification__item-details">-->
											<!--		<div class="kt-notification__item-title kt-font-bold">-->
											<!--			Aktivitas Saya-->
											<!--		</div>-->
													<!--<div class="kt-notification__item-time">-->
													<!--	Logs and notifications-->
													<!--</div>-->
											<!--	</div>-->
											<!--</a>-->
											<div class="kt-notification__custom">
												<a href="halaman/logout_admin.php" target="_self" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
											</div>
										</div>

										<!--end: Navigation -->
									</div>
								</div>

								<!--end: User bar -->

							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
						<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">

							<!-- begin:: Aside -->
							<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
							<div class="kt-aside  kt-aside--skin-light kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

								<!-- begin:: Aside Menu -->
								<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
									<div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--skin-light " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
										<ul class="kt-menu__nav ">
										    
										    <li class="kt-menu__item " aria-haspopup="true"><a href="index.php" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-home"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
										    <li class="kt-menu__item " aria-haspopup="true"><a href="?page=admin" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-home"></i><span class="kt-menu__link-text">Admin</span></a></li>
										    <li class="kt-menu__item " aria-haspopup="true"><a href="?page=instansi" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-building"></i><span class="kt-menu__link-text">Instansi</span>
										        <?php 
											    if($count_instansi != 0 || null || "0" || "") { 
											    echo '<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">'. $count_instansi .' </span></span>';
											    }?>
											    </a>
										    </li>
										    <li class="kt-menu__item " aria-haspopup="true"><a href="?page=acara" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-calendar"></i><span class="kt-menu__link-text">Acara</span></a></li>
											
											<li class="kt-menu__section ">
												<h4 class="kt-menu__section-text">Pengguna</h4>
												<i class="kt-menu__section-icon flaticon-more-v2"></i>
											</li>
											<li class="kt-menu__item " aria-haspopup="true"><a href="index.php?page=tenant" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-store"></i><span class="kt-menu__link-text">Tenant</span></a></li>
											
											<li class="kt-menu__item " aria-haspopup="true"><a href="index.php?page=eo" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-ticket-alt"></i><span class="kt-menu__link-text">Penyelenggara Acara</span></a></li>
											
											<li class="kt-menu__section ">
												<h4 class="kt-menu__section-text">Kategori</h4>
												<i class="kt-menu__section-icon flaticon-more-v2"></i>
											</li>
											<li class="kt-menu__item " aria-haspopup="true"><a href="index.php?page=kategori_tenant" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-mortar-pestle"></i><span class="kt-menu__link-text">Kategori Tenant</span>
											    <?php 
											    if($count_kat_tenant != 0 || null || "0" || "") { 
											    echo '<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">'. $count_kat_tenant .' </span></span>';
											    }?>
											    </a>
											    
											</li>
											
											<li class="kt-menu__item " aria-haspopup="true"><a href="index.php?page=kategori_acara" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-microphone-alt"></i><span class="kt-menu__link-text">Kategori Acara</span>
											    <?php 
											    if($count_kat_event != 0 || null || "0" || "") { 
											    echo '<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">'. $count_kat_event .' </span></span>';
											    }?>
											    </a>
											</li>
											
											<!--<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-table"></i><span class="kt-menu__link-text">User</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>-->
											<!--	<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>-->
											<!--		<ul class="kt-menu__subnav">-->
											<!--			<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">User</span></span></li>-->
											<!--			<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tenant</span></a></li>-->
											<!--			<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Penyelenggara Acara</span></a></li>-->
											<!--		</ul>-->
											<!--	</div>-->
											<!--</li>-->
										</ul>
									</div>
								</div>

								<!-- end:: Aside Menu -->
							</div>

							<!-- end:: Aside -->
							<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

								<!-- begin:: Subheader -->
								<div class="kt-subheader   kt-grid__item" id="kt_subheader">
									
									<div class="kt-subheader__toolbar">
										<div class="kt-subheader__wrapper">
											<a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" style="pointer-events: none" data-toggle="kt-tooltip" data-placement="left" disabled="true">
												<span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Hari ini, </span>&nbsp;
												<span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date"><?php date_default_timezone_set("Asia/Makassar"); echo date("d M Y")?></span>

												<!--<i class="flaticon2-calendar-1"></i>-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect id="bound" x="0" y="0" width="24" height="24" />
														<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" id="check" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" id="Combined-Shape" fill="#000000" />
													</g>
												</svg> </a>
											<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
												<a href="" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
															<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
														</g>
													</svg>

													<!--<i class="flaticon2-plus"></i>-->
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<ul class="kt-nav">
														<li class="kt-nav__section kt-nav__section--first">
															<span class="kt-nav__section-text">Tambah Baru:</span>
														</li>
														<li class="kt-nav__item">
															<a href="?page=instansi" class="kt-nav__link">
																<i class="kt-nav__link-icon fa fa-building"></i>
																<span class="kt-nav__link-text">Instansi</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="?page=kategori_acara" class="kt-nav__link">
																<i class="kt-nav__link-icon fa fa-microphone-alt"></i>
																<span class="kt-nav__link-text">Kategori Acara</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="?page=kategori_tenant" class="kt-nav__link">
																<i class="kt-nav__link-icon fa fa-mortar-pestle"></i>
																<span class="kt-nav__link-text">Kategori Tenant</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- end:: Subheader -->



								<!-- begin:: Content -->
								<div class="kt-content kt-grid__item kt-grid__item--fluid">

									<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "halaman/home.php";
				echo "<title>".$title."</title>";
				break;
			case 'tenant':
			    if(isset($_GET['id'])) {
			        $id = $_GET['id'];
			        include "halaman/detail_tenant.php";
			        echo "\n<title>".$title."</title>\n";
			        break;
			        
			    }
				include "halaman/user_tenant.php";
				echo "\n<title>".$title."</title>\n";
				break;
			
			case 'eo':
			    if(isset($_GET['id'])) {
			        $id = $_GET['id'];
			        include "halaman/detail_eo.php";
			        echo "\n<title>".$title."</title>\n";
			        break;
			        
			    }
				include "halaman/user_eo.php";
				echo "\n<title>".$title."</title>\n";
				break;
			case 'verif_pengguna':
				include "halaman/verifikasi_user.php";
				echo "\n<title>".$title."</title>\n";
				break;
			case 'verified':
				include "halaman/user_terverifikasi.php";
				echo "\n<title>".$title."</title>\n";
				break;
			case 'kategori_tenant':
				include "halaman/kategori_tenant.php";
				echo "<title>".$title."</title>";
				break;
			case 'kategori_acara':
				include "halaman/kategori_acara.php";
				echo "<title>".$title."</title>";
				break;
			case 'instansi':
				include "halaman/instansi.php";
				echo "<title>".$title."</title>";
				break;
			
			case 'profil':
				include "halaman/profil_admin.php";
				echo "<title>".$title."</title>";
				break;
			case 'admin':
				include "halaman/admin.php";
				echo "<title>".$title."</title>";
				break;
			case 'acara':
			    if(isset($_GET['id'])) {
			        $id = $_GET['id'];
			        include "halaman/detail_acara.php";
			        echo "\n<title>".$title."</title>\n";
			        break;
			        
			    }
				include "halaman/acara.php";
				echo "<title>".$title."</title>";
				break;
				
				
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan!</h3></center>";
				break;
		}
	}else{
		include "halaman/home.php";
		echo "<title>".$title."</title>";
	}
 
	 ?>
								</div>

								<!-- end:: Content -->
							</div>
						</div>
					</div>

					<!-- begin:: Footer -->
					<div class="kt-footer kt-grid__item" id="kt_footer">
						<div class="kt-container">
							<div class="kt-footer__bottom">
								<div class="kt-footer__copyright">
									2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Connect Point</a>
								</div>
								
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		
		

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#591df1",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->
		
		
		<!--begin::Page Scripts(used by this page (kategori_acara.php & kategori_tenant.php)) -->
		<!--<script src="assets/app/custom/general/crud/datatables/basic/scrollable.js" type="text/javascript"></script>-->

		<!--end::Page Scripts -->

		<!--begin::Page Scripts(used by this page(user_tenant.php & user_eo.php)) -->
		<script src="assets/app/custom/general/crud/datatables/data-sources/html.js" type="text/javascript"></script>

		<!--end::Page Scripts -->
		
		<!--begin::Page Vendors(used by this page (kategori_acara.php & kategori_tenant.php, user_tenant.php & user_eo.php)) -->
		<script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

		<!--end::Page Vendors -->
		

		<!--begin:: Global Optional Vendors -->
		<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
		<script src="assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
		<script src="assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
		<script src="assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="assets/demo/demo9/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
		<script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="assets/app/custom/general/dashboard.js" type="text/javascript"></script>

		<!--end::Page Scripts -->
		
		
		
		
		

		<!--begin::Global App Bundle(used by all pages) -->
		<script src="assets/app/bundle/app.bundle.js" type="text/javascript"></script>

		<!--end::Global App Bundle -->
		
		
	</body>

	<!-- end::Body -->
</html>