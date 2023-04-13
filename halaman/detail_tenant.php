<?php
$title = 'Informasi Tenant';

include "connection.php";

$id_user = $_GET['id'];

$sql="SELECT nama_user, email, username, kategori_tenant, image_user, website, alamat, desc_user, status_user, verify_reason, instansi, surat_izin_usaha, npwp, ktp  FROM `tb_user` LEFT JOIN tb_kategori_tenant ON tb_kategori_tenant.id_kategori_tenant = tb_user.id_kategori_tenant LEFT JOIN tb_instansi ON tb_instansi.id_instansi = tb_user.id_instansi WHERE id_user=$id_user";
$result=mysqli_query($connect,$sql);

while($row=mysqli_fetch_assoc($result)){
    $nama_user = $row['nama_user'];
    $email = $row['email'];
    $username = $row['username'];
    $kategori_tenant = $row['kategori_tenant'];
    $image_user = $row['image_user'];
    $website = $row['website'];
    $alamat = $row['alamat'];
    $desc_user = $row['desc_user'];
    $status_user = $row['status_user'];
    $verify_reason = $row['verify_reason'];
    $instansi = $row['instansi'];
    $surat_izin_usaha = $row['surat_izin_usaha'];
    $npwp = $row['npwp'];
    $ktp = $row['ktp'];
    
}

mysqli_free_result($sql);
mysqli_close($connect);

?>

<!--begin::Portlet-->
<div class="kt-portlet">
	<div class="kt-portlet__head">
	    <div class="kt-portlet__head-label">
	        <h3 class="kt-portlet__head-title">
	            Informasi Tenant
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<form class="kt-form kt-form--label-right">
		<div class="kt-portlet__body">
			<div class="form-group row">
			    <div class="col-lg-6">
			        <?php
			        if($image_user != null || "") {
			            echo '
			            <img class="kt-widget7__img" src="'.$image_user.'" alt="" width="200" height="200">';
			        } else {
			            echo '
			            <img class="kt-widget7__img" src="assets/media/my_icons/stand(1).png" alt="" width="200" height="200">';
			        }
			        ?>
					
				</div>
				<div class="col-lg-6">
					<label>Nama:</label>
					<input type="text" class="form-control" value="<?php echo $nama_user?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6">
					<label>Email:</label>
					<input type="email" class="form-control" value="<?php echo $email?>" readonly>
				</div>
				<div class="col-lg-6">
					<label class="">Username:</label>
					<input type="email" class="form-control" value="<?php echo $username?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6">
					<label>Kategori Tenant:</label>
					<input type="text" class="form-control" value="<?php echo $kategori_tenant?>" readonly>
				</div>
				<div class="col-lg-6">
					<label class="">Instansi:</label>
					<input type="text" class="form-control" value="<?php echo $instansi?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6">
					<label>Kontak:</label>
					<div class="form-group row">
					
					    <?php
					    $id_user = $_GET['id'];
					    $select_notelp = "SELECT notelp, jenis_perangkat FROM tb_notelp_user WHERE status_notelp=0 AND id_user=$id_user";
					    $result_notelp = mysqli_query($connect,$select_notelp);
					    $number_of_rows = mysqli_num_rows($result_notelp);
					    if($number_of_rows > 0){
					        while($row_notelp=mysqli_fetch_assoc($result_notelp)){
					            echo '
					            <div class="col-lg-6">
					            <input type="text" class="form-control" placeholder="Jenis Perangkat" value="'.$row_notelp['jenis_perangkat'].'" readonly>
					            </div>
					            <div class="col-lg-6">
					            <input type="text" class="form-control" placeholder="Nomor Telepon" value="'.$row_notelp['notelp'].'" readonly>
					            </div>
					            ';
					            
					        }
					    } else {
					        echo '
					        <div class="col-lg-6">
					        <input type="text" class="form-control" placeholder="Jenis Perangkat" value="" readonly>
					        </div>
					        <div class="col-lg-6">
					        <input type="text" class="form-control" placeholder="Nomor Telepon" value="" readonly>
					        </div>
					        ';
					        
					    }
					    mysqli_free_result($sql);
					    mysqli_close($connect);
					    ?>
					    
					</div>
				</div>
				<div class="col-lg-6">
				    <label class="">Website:</label>
					<!--<input type="url" class="form-control" value="<?php echo $website?>" readonly>-->
					<input type="button" style="text-align:left;" class="form-control" onclick="window.location.href = 'https://<?php echo $website?>';" value="<?php echo $website?>"/>
				</div>
				
			</div>
			<div class="form-group row">
			    <div class="col-lg-6">
			        <label>Alamat:</label>
			        <textarea class="form-control" id="kt_autosize_1" rows="3" readonly><?php echo $alamat?></textarea>
                </div>
			    <div class="col-lg-6">
			        <label>Deskripsi:</label>
			        <textarea class="form-control" id="kt_autosize_1" rows="3" readonly><?php echo $desc_user?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>File Tenant:</label>
                    <div class="row">
                        <?php echo ($ktp!= null || '' ? '
                        <div class="col-md-4">
                            <a href="'.$ktp.'" target="_blank">
        						<div class="kt-demo-icon">
        							<div class="kt-demo-icon__preview">
        								<i class="la la-file"></i>
        							</div>
        							<div class="kt-demo-icon__class">
        								KTP </div>
        						</div>
							</a>
						</div>
                        ' : '');?>
                        
                        <?php echo ($surat_izin_usaha != null || '' ? '
                        <div class="col-md-4">
                            <a href="'.$surat_izin_usaha.'" target="_blank">
    							<div class="kt-demo-icon">
    								<div class="kt-demo-icon__preview">
    									<i class="la la-file"></i>
    								</div>
    								<div class="kt-demo-icon__class">
    									Surat Izin Usaha </div>
    							</div>
							</a>
						</div>
                        ' : '');?>
                        
                        <?php echo ($npwp != null || '' ? '
                        <div class="col-md-4">
						    <a href="'.$npwp.'" target="_blank">
    							<div class="kt-demo-icon">
    								<div class="kt-demo-icon__preview">
    									<i class="la la-file"></i>
    								</div>
    								<div class="kt-demo-icon__class">
    									NPWP </div>
    							</div>
							</a>
						</div>
                        ' : '');?>
						
                    </div>
				</div>
				<div class="col-lg-6">
					<label>Status:</label>
				    <?php
				    if($status_user == 0) {
				        echo '<label class="kt-font-danger" name="status">Belum Terverifikasi</label>';
				        if($verify_reason != "" || null) {
				            echo '
				            <div class="alert alert-outline-danger alert-dismissible" role="alert">
				                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				                Anda <strong> &nbsp; menolak &nbsp;</strong> verifikasi pengguna ini karena '.$verify_reason.'
				            </div>';
				            
				        }
				    } else if($status_user == 1) {
				        echo '<label class="kt-font-color-4" name="status">Pengguna Nonaktif</label>';
				    } else if($status_user == 2) {
				        echo '<label class="kt-font-success" name="status">Terverifikasi</label>';
				    } else {
				        echo '
				        <label class="kt-font-warning" name="status">Menunggu Verifikasi</label>
				        <div class="kt-widget2">
				            <div class="kt-widget2__item kt-widget2__item--warning">
				            
				                <div class="kt-widget2__info col-4">
				                
				                    <label class="kt-widget2__title">Verifikasi pengguna ini?</label>
				                </div>
				                <div class="kt-widget2 btn-group btn-group" role="group">
				                
				                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_submit">Ya
				                    
				                    </button>
				                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_reason">Tidak
				                    
				                    </button>
				                </div>
				            </div>
				        </div>
				        ';
				    }
				    ?>
					
					
				</div>
			</div>
		</div>
		<!--<div class="kt-portlet__foot">-->
		<!--	<div class="kt-form__actions">-->
		<!--		<div class="row">-->
		<!--			<div class="col-lg-6">-->
		<!--				<button type="reset" class="btn btn-primary">Save</button>-->
		<!--				<button type="reset" class="btn btn-secondary">Cancel</button>-->
		<!--			</div>-->
		<!--			<div class="col-lg-6 kt-align-right">-->
		<!--				<button type="reset" class="btn btn-danger">Delete</button>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
	</form>

	<!--end::Form-->
</div>

<!--begin::Modal-->
<div class="modal fade" id="modal_reason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alasan Verifikasi Ditolak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
			    
				<form id="form_reason" name="form_reason" action="halaman/update_verify_user.php" method="POST">
				    <div class="alert alert-outline-danger d-none" role="alert" id="alert_form_reason">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				        Data tidak boleh kosong
				    </div>
					<div class="form-group">
						<label for="message-text" class="form-control-label">Pesan:</label>
						<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
						<input type="hidden" name="status_user" value="<?php echo '0'; ?>" />
						<input type="hidden" name="verified_by" value="<?php echo $_SESSION['id_admin']; ?>" />
						<textarea class="form-control" id="message_reason" name="message_reason"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="confirmSubmitReason(this)">Simpan</button>
			</div>
		</div>
	</div>
</div>

<!--end::Modal-->

<!-- Modal -->
<div class="modal fade" id="modal_submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin memverifikasi pengguna?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit" onclick="confirmSubmit(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>



<!--end::Portlet-->

<!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>-->
<script type="text/javascript">

function confirmSubmitReason(select){
    
    if($('#message_reason').val() == "" || null) {
        
        // $('#modal_reason').modal('hide');
        $('#alert_form_reason').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_reason').addClass('d-none');
            
        }, 2000);
    } else{
        $('#form_reason').submit();
    }    
}


function confirmSubmit(select){
    
    var id_admin = '<?php echo $_SESSION['id_admin']; ?>';
    var id_user = '<?php echo $id_user; ?>';
    
    // $.post( "halaman/update_verify_user.php", { status_user: "2", verified_by: id_admin, id_user: id_user } );
    $.post('halaman/update_verify_user.php', { status_user: '2', verified_by: id_admin, id_user: id_user}, function(result) {
        location.reload();
    });
    
    
}

            // var map;
            // var geocoder;
            // function loadMap() {
            //     // Using the lat and lng of Dehradun.
            //     var latitude = 30.3164945; 
            //     var longitude = 78.03219079999996;
            //     var latlng = new google.maps.LatLng(latitude,longitude);
            //     var feature = {
            //         zoom: 10,
            //         center: latlng,
            //         mapTypeId: google.maps.MapTypeId.ROADMAP
            //     };
            //     map = new google.maps.Map(document.getElementById("map_canvas"), feature);
            //     geocoder = new google.maps.Geocoder();
            //     var marker = new google.maps.Marker({
            //         position: latlng,
            //         map: map,
            //         title: "Test for Location"
            //     });
            // }
        </script>