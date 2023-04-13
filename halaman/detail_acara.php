<?php
$title = 'Informasi Acara';

include "connection.php";

$id_event = $_GET['id'];

$sql="SELECT tb_event.id_event, tb_event.nama_event, tb_event.tglstart_event, tb_event.tglend_event, tb_event.lokasi_event, tb_event.desc_event, tb_event.jml_tenant, tb_event.benefit, tb_event.notelp_event, tb_event.surat_izin_event, tb_event.proposal_event, tb_event.id_user, tb_event.status_event, tb_user.nama_user, GROUP_CONCAT(tb_kategori_event.kategori_event) AS kategori
FROM tb_event LEFT JOIN tb_user ON tb_event.id_user = tb_user.id_user 
LEFT JOIN tb_det_kategori_event ON tb_event.id_event = tb_det_kategori_event.id_event 
LEFT JOIN tb_kategori_event ON tb_det_kategori_event.id_kategori_event = tb_kategori_event.id_kategori_event WHERE tb_event.id_event=$id_event";
$result=mysqli_query($connect,$sql);

$query_foto = mysqli_query($connect, "SELECT tb_det_img_event.image_event FROM tb_det_img_event WHERE tb_det_img_event.id_event = $id_event AND tb_det_img_event.status_img_event = 0");

while($row=mysqli_fetch_assoc($result)){
    $nama_event = $row['nama_event'];
    $row['tglstart_event'] = date("d M Y");
    $row['tglend_event'] = date("d M Y");
    $tglstart_event = $row['tglstart_event'];
    $tglend_event = $row['tglend_event'];
    $jamstart_event = date("g:i a", strtotime($row['tglstart_event']));
    $jamend_event = date("g:i a", strtotime($row['tglend_event']));
    $lokasi_event = $row['lokasi_event'];
    $desc_event = $row['desc_event'];
    $jml_tenant = $row['jml_tenant'];
    $benefit = $row['benefit'];
    $notelp_event = $row['notelp_event'];
    $surat_izin_event = $row['surat_izin_event'];
    $proposal_event = $row['proposal_event'];
    $id_user = $row['id_user'];
    $status_event = $row['status_event'];
    $nama_user = $row['nama_user'];
    $kategori = $row['kategori'];
    
}

$image_event = array();

while($row_foto=mysqli_fetch_assoc($query_foto)){
    $image_event[] = $row_foto['image_event'];
}
mysqli_free_result($sql);
mysqli_close($connect);

?>

<!--begin::Portlet-->
<div class="kt-portlet">
	<div class="kt-portlet__head">
	    <div class="kt-portlet__head-label">
	        <h3 class="kt-portlet__head-title">
	            Informasi Acara
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<form class="kt-form kt-form--label-right">
		<div class="kt-portlet__body">
			<div class="form-group row">
			    <div class="col-lg-12">
			        <?php
			        $num_img = count($image_event);
			        if($num_img > 0) {
			            foreach($image_event as $value){
			                echo '
			                <img class="kt-widget7__img" src="'.$value.'" alt="" width="200" height="200">';
			            }
			            
			        } else {
			            echo '
			            <img class="kt-widget7__img" src="assets/media/my_icons/woman.png" alt="" width="200" height="200">';
			        }
			        ?>
					
				</div>
				
			</div>
			<div class="form-group row">
			    <div class="col-lg-6">
					<label>Nama:</label>
					<input type="text" class="form-control" value="<?php echo $nama_event?>" readonly>
				</div>
				<div class="col-lg-6">
					<label>Kategori:</label>
					<input type="text" class="form-control" value="<?php echo $kategori?>" readonly>
				</div>
			</div>
			<div class="form-group row">
			    <div class="col-lg-6">
					<label class="">Lokasi:</label>
					<input type="text" class="form-control" value="<?php echo $lokasi_event?>" readonly>
				</div>
				<div class="col-lg-6">
					<label>Tanggal Acara:</label>
					<div class="form-group row">
					    <div class="col-lg-6">
				            <input type="text" class="form-control" placeholder="Tanggal Acara" value=" <?php echo $tglstart_event, ' - ', $tglend_event;?>" readonly>
				        </div>
				        <div class="col-lg-6">
				            <input type="text" class="form-control" placeholder="Jam Acara" value="<?php echo $jamstart_event, ' - ', $jamend_event;?>" readonly>
				        </div>
					    
					</div>
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6">
				    <label class="">Nama Penyelenggara Acara:</label>
				    
					<input type="button" style="text-align:left;" class="form-control" onclick="window.location.href = 'https://astungkarasarjana.com/connect-point/api/index.php?page=eo&id=<?php echo $id_user?>';" value="<?php echo $nama_user?>"/>
				</div>
				<div class="col-lg-3">
					<label class="">Nomor Telepon:</label>
					<input type="text" class="form-control" value="<?php echo $notelp_event?>" readonly>
				</div>
				<div class="col-lg-3">
				    <label class="">Jumlah Tenant yang Dibutuhkan:</label>
					<input type="text" class="form-control" value="<?php echo $jml_tenant?>" readonly>
				</div>
			</div>
			<div class="form-group row">
			    <div class="col-lg-6">
			        <label>Benefit:</label>
			        <textarea class="form-control" id="kt_autosize_1" rows="3" readonly><?php echo $benefit?></textarea>
                </div>
			    <div class="col-lg-6">
			        <label>Deskripsi:</label>
			        <textarea class="form-control" id="kt_autosize_1" rows="3" readonly><?php echo $desc_event?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>File Acara:</label>
                    <div class="row">
                        <?php echo ($surat_izin_event!= null || '' ? '
                        <div class="col-md-4">
                            <a href="'.$surat_izin_event.'" target="_blank">
        						<div class="kt-demo-icon">
        							<div class="kt-demo-icon__preview">
        								<i class="la la-file"></i>
        							</div>
        							<div class="kt-demo-icon__class">
        								Surat Izin Acara </div>
        						</div>
							</a>
						</div>
                        ' : '');?>
                        
                        <?php echo ($proposal_event != null || '' ? '
                        <div class="col-md-4">
                            <a href="'.$proposal_event.'" target="_blank">
    							<div class="kt-demo-icon">
    								<div class="kt-demo-icon__preview">
    									<i class="la la-file"></i>
    								</div>
    								<div class="kt-demo-icon__class">
    									Proposal Acara </div>
    							</div>
							</a>
						</div>
                        ' : '');?>
                        
						
                    </div>
				</div>
				<div class="col-lg-6">
					<label>Status Acara:</label>
				    <?php
				    if($status_event == 0) {
				        echo '
				        <label class="kt-font-warning" name="status">Menunggu Validasi</label>
				        <div class="kt-widget2">
				            <div class="kt-widget2__item kt-widget2__item--warning">
				                <div class="kt-widget2__info col-4">
				                    <label class="kt-widget2__title">Validasi acara ini?</label>
				                </div>
				                <div class="kt-widget2 btn-group btn-group" role="group">
				                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_submit">Ya
				                    
				                    </button>
				                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_reason">Tidak
				                    
				                    </button>
				                </div>
				            </div>
				        </div>';
				    } else if($status_event == 1) {
				        echo '<label class="kt-font-color-4" name="status">Nonaktif</label>';
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
                <p>Apakah anda yakin memvalidasi acara ini?</p>
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