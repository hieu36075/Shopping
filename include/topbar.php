<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap_home'])) {
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Làm ơn không để trống")</script>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_assoc($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
		
		        $_SESSION['Email'] = $row_dangnhap['email'];
		        $_SESSION['Phone'] = $row_dangnhap["phone"];
		        $_SESSION['Address'] = $row_dangnhap['address'];
		        $_SESSION['Password'] = $row_dangnhap['password'];


		        	header('Location: index.php?quanly=giohang');
      
							
			}else{
				echo '<script>alert("Tài khoản mật khẩu sai")</script>';
			}
		}
	// dang ky//
	}elseif(isset($_POST['dangky'])){
		$name = $_POST['name'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$password = md5($_POST['password']);
	 	$note = $_POST['note'];
	 	$address = $_POST['address'];
	 	$giaohang = $_POST['giaohang'];
 
 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
		
 		header('Location:index.php?quanly=giohang');
	}elseif (isset($_POST['update'])) {
		$Name = $_POST['name'];
	 	$Phone = $_POST['phone'];
	 	$Email = $_POST['email'];
	 	$Address = $_POST['address'];
	 	$ID = $_POST['khachhang_id'];
 		$sql_update = "UPDATE `tbl_khachhang` SET `name`='$Name',`phone`='$Phone',`address`='$Address',`email`='$Email' WHERE `khachhang_id`='$ID'";
 		if (mysqli_query($con, $sql_update)) {
 			echo '<script>alert("Update thành công")</script>';
 				// header('Location: index.php?quanly=giohang');
 			// code...
 		}else{echo '<script>alert("Update không thành công")</script>';}
		// code...
	}

?> 

<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>

						<?php
						if(isset($_SESSION['dangnhap_home'])){ 
						
						?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white">
								<i class="fas fa-truck mr-2"></i>My order : <?php echo $_SESSION['dangnhap_home'] ?></a>

								<?php 
								if(isset($_SESSION['dangnhap_home'])){
									echo '<p style="color:#000;">
									<a href="index.php?quanly=giohang&dangxuat=1">Đăng xuất</a></p>';
								}else{
									echo '';
								}
								?>
						</li>
						<?php
					}
						?>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0981747708
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Login </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#userprofile" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i> User Profile </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
	<!-- modals -->

	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap_home" value="Login">
						</div>
						
						<p class="text-center dont-do mt-3">You don't have an account?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Register</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
							<input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Note</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Register">
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- user profile -->
	<div class="modal fade" id="userprofile" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">User Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
									<form action="" method="post">
										<div class="form-group">
											<label class="col-form-label">Name</label>
											<input type="text" class="form-control" placeholder=" " name="name" value=<?= $_SESSION['dangnhap_home']; ?>>
										</div>
										<div class="form-group">
											<label class="col-form-label">Email</label>
											<input type="email" class="form-control" placeholder=" " name="email" value="<?= $_SESSION['Email']; ?>" >
										</div>
										<div class="form-group">
											<label class="col-form-label">Phone</label>
											<input type="text" class="form-control" placeholder=" " name="phone"  value=<?= $_SESSION['Phone']; ?>>
										</div>
										<div class="form-group">
											<label class="col-form-label">Address</label>
											<input type="text" class="form-control" placeholder=" " name="address"  value=<?= $_SESSION['Address']; ?>>
										</div>
										<div class="form-group">
											<label class="col-form-label">Password</label>
											<input type="password" class="form-control" placeholder=" " name="password"  value="<?= $_SESSION['Password']; ?>" disabled>
										</div>	
										<div class="form-group">
											
											<input type="hidden" class="form-control" placeholder=" " name="khachhang_id"  value=<?= $_SESSION['khachhang_id']; ?>>
										</div>		
										<div class="right-w3l">
											<input type="submit" class="form-control" name="update" value="Update">
										</div>							
									</form>
								</div>
				<!-- <div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" placeholder=" " name="name" value="<?php echo $row_khachhang['name']; ?>">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
							<input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Note</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						
						<div class="right-w3l">
							<input type="submit" class="form-control" name="update" value="Update">
						</div>
				
					</form>
				</div> -->
			</div>
		</div>
	</div>

	<!-- //modal -->

	<!-- //top-header -->
	
	
	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt=" " class="img-fluid">Hieu Store
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
								<input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="search_button" type="submit">Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->