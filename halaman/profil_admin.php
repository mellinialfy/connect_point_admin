<?php
$title = 'Profil Admin';

include "connection.php";

$id_admin = $_SESSION['id_admin'];

$sql="SELECT nama_lengkap, email_admin, profile_pict FROM `tb_admin` WHERE id_admin=$id_admin";
$result=mysqli_query($connect,$sql);

while($row=mysqli_fetch_assoc($result)){
    $nama_lengkap = $row['nama_lengkap'];
    $email_admin = $row['email_admin'];
    $profile_pict = $row['profile_pict'];
    
}

mysqli_free_result($sql);
mysqli_close($connect);

?>

<!--begin::Portlet-->
<div class="kt-portlet">
	<div class="kt-portlet__head">
	    <div class="kt-portlet__head-label">
	        <h3 class="kt-portlet__head-title">
	            Profil Admin
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<form class="kt-form kt-form--label-right" id="form_profil" name="form_profil" action="halaman/update_profil_admin.php" method="POST" enctype="multipart/form-data">
		<div class="kt-portlet__body">
		    <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
			<div class="form-group row">
			    <div class="col-lg-6">
			        <?php
			        if($profile_pict != null || "") {
			            echo '
			            <img class="kt-widget7__img" src="'.$profile_pict.'" alt="" width="200" height="200">';
			        } else {
			            echo '
			            <img class="kt-widget7__img" src="assets/media/my_icons/private-account.png" alt="" width="200" height="200">';
			        }
			        ?>
					
				</div>
				<div class="col-lg-6">
					<input type="file" class="form-control" id="profile_pict" name="profile_pict" style="visibility: hidden">
				</div>
			</div>
			<div class="form-group row">
			    <div class="col-lg-6">
					<label>Nama:</label>
					<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $nama_lengkap?>" readonly>
					<div class="invalid-feedback d-none" id="alert_nama">Nama tidak boleh kosong.</div>
				</div>
				<div class="col-lg-6">
					<label>Email:</label>
					<input type="email" class="form-control" id="email_admin" name="email_admin" value="<?php echo $email_admin?>" required="email" readonly>
					<div class="invalid-feedback d-none" id="alert_email">Email tidak boleh kosong.</div>
					<input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
				</div>
			</div>
		</div>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-lg-6">
						<button type="button" class="btn btn-primary" id="btn_save" name="btn_save" style="visibility: hidden" data-toggle="modal" data-target="#modal_submit">Simpan</button>
						<button type="reset" class="btn btn-secondary" id="btn_cancel" style="visibility: hidden" onclick="hideButton(this)">Batal</button>
					</div>
					<div class="col-lg-6 kt-align-right">
						<button type="button" class="btn btn-danger" id="btn_edit" onclick="showButton(this)">Edit</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!--end::Form-->
</div>


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
                <p>Apakah anda ingin menyimpan perubahan?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit" onclick="confirmSubmit(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>



<!--end::Portlet-->

<script type="text/javascript">

function showButton(select){
	document.getElementById('btn_save').style.visibility = "visible";
	document.getElementById('btn_cancel').style.visibility = "visible";
	document.getElementById('profile_pict').style.visibility = "visible";
	document.getElementById('nama_lengkap').removeAttribute('readonly');
	document.getElementById('email_admin').removeAttribute('readonly');
    
    $('#btn_edit').addClass('disabled');
}

function hideButton(select){
	document.getElementById('btn_save').style.visibility = "hidden";
	document.getElementById('btn_cancel').style.visibility = "hidden";
	document.getElementById('profile_pict').style.visibility = "hidden";
    $('#nama_lengkap').attr('readonly', true);
    $('#email_admin').attr('readonly', true);
    
    $('#btn_edit').removeClass('disabled');
    

}


function confirmSubmit(select){
    
    
    var nama = document.getElementById("nama_lengkap").value.trim();
    var email = document.getElementById("email_admin").value.trim();
    
    $('#alert_nama').addClass('d-none');
    $('#nama_lengkap').removeClass('is-invalid');
    $('#alert_email').addClass('d-none');
    $('#email_admin').removeClass('is-invalid');
        
    if(nama == '') {
        $('#modal_submit').modal('hide');
        $('#alert_nama').removeClass('d-none');
        $('#nama_lengkap').addClass('is-invalid');
        
            // setTimeout(() => {
            //     // $('.alert').alert('close');
            //     $('#alert_form').addClass('d-none');
            // }, 2000);
            
        
    } 
    if (email == '') {
        $('#modal_submit').modal('hide');
        $('#alert_email').removeClass('d-none');
        $('#email_admin').addClass('is-invalid');
    } else {
        $('#form_profil').submit();
        // document.getElementById('form_profil').submit();
        // $('#modal_submit').modal('hide');
        
    } 
}

        </script>