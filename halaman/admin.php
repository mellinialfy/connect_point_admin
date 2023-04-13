<?php 
$title = 'Admin';
?>




<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-microphone-alt"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Admin
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="#form_tambah_data" id="btn_tambah_data" class="btn btn-brand btn-elevate btn-icon-sm" onclick="showKategori(<?php $row['req_kat_event']?>)">
                        <i class="la la-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
                <tr>
                    <th width="200px">No</th>
                    <th>Nama Admin</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $no = 1;
                $sql="SELECT id_admin, nama_lengkap, role, email_admin, password_admin FROM `tb_admin`";
                $result=mysqli_query($connect,$sql);
                
                while($row=mysqli_fetch_assoc($result)){
                    
                    echo '
                    <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['nama_lengkap'].'</td>
                    <td>'.$row['email_admin'].'</td>
                    <td>'.$row['password_admin'].'</td>
                    <td nowrap>
                        <a href="" onclick="showDetKategori(\''.$row['kategori_event'].'\',\''.$row['desc_kategori'].'\')" id="detKategoriBtn" name="detKategoriBtn" data-toggle="modal" data-target="#kt_modal_1_2" class="btn btn-sm btn-clean btn-icon-md" title="Lihat">
                            <i class="la la-info-circle"></i>
                        </a>
                        <a href="#form_edit_data" onclick="showEditKategori(\''.$row['id_kategori_event'].'\',\''.$row['kategori_event'].'\',\''.$row['desc_kategori'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Edit">
                            <i class="la la-edit"></i> 
                        </a> 
                        <a href="" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_kategori_event.php?id='.$row['id_kategori_event'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Hapus">
                            <i class="la la-trash"></i>
                        </a>
                    </td>
                    </tr>';
                    $no++;
                    
                }
                mysqli_free_result($sql);
                mysqli_close($connect);
                ?>
                
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>

<div class="kt-portlet" id="tambah_kategori" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Tambah Kategori
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_tambah_data" name="form_tambah_data" action="halaman/insert_kategori_event.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
            
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="id_req_kat_event" name="id_req_kat_event">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" id="kategori_event" name="kategori_event" required="text">
                </div>
                <label for="example-text-input" class="col-2 col-form-label">Deskripsi Kategori</label>
                <div class="col-4">
                    <textarea class="form-control" id="desc_kat_event" name="desc_kategori" required="text" rows="3" type="text"></textarea>
                    
                </div>
            </div>
        </div>
        
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="button" id="submitBtn" name="submitBtn" data-toggle="modal" data-target="#modal_submit" class="btn btn-success">Simpan</button>
                        <button type="reset" onclick="hideKategori(this)" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="kt-portlet" id="edit_kategori" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Edit Kategori
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_edit_data" name="form_edit_data" action="halaman/update_kategori_event.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form_edit">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
            
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="edit_id_kategori_event" name="id_kategori_event" required="text" readonly>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" id="edit_kategori_event" name="kategori_event" required="text">
                </div>
                <label for="example-text-input" class="col-2 col-form-label">Deskripsi Kategori</label>
                <div class="col-4">
                    <textarea class="form-control" id="edit_desc_kat_event" name="desc_kategori" required="text" rows="3" type="text"></textarea>
                    
                </div>
            </div>
        </div>
        
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="button" id="submitBtnEdit" name="submitBtnEdit" data-toggle="modal" data-target="#modal_submit_edit" class="btn btn-success">Simpan</button>
                        <button type="reset" onclick="hideEditKategori(this)" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--<div class="kt-portlet kt-portlet--mobile">-->
<!--    <div class="kt-portlet__head kt-portlet__head--lg">-->
<!--        <div class="kt-portlet__head-label">-->
<!--            <span class="kt-portlet__head-icon">-->
<!--                <i class="kt-font-brand fa fa-microphone-alt"></i>-->
<!--            </span>-->
<!--            <h3 class="kt-portlet__head-title">-->
<!--                Permintaan Kategori Acara-->
<!--            </h3>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="kt-portlet__body">-->
        <!--begin: Datatable -->
<!--        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">-->
<!--            <thead>-->
<!--                <tr>-->
<!--                    <th>No.</th>-->
<!--                    <th>Permintaan Kategori Acara</th>-->
<!--                    <th>Kategori Acara Sekarang</th>-->
<!--                    <th>Diminta oleh</th>-->
<!--                    <th>Tanggal Permintaan</th>-->
<!--                    <th>Aksi</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                
<!--                    </td>-->
<!--                    </tr>';-->
<!--                    $no++;-->
<!--                }-->
<!--                mysqli_free_result($sql);-->
<!--                mysqli_close($connect);-->
<!--                ?>-->
                
<!--            </tbody>-->
<!--        </table>-->
        <!--end: Datatable -->
<!--    </div>-->
<!--</div>-->


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
                <p>Apakah anda yakin ingin menyimpan data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit" onClick="confirmSubmitTambah(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_submit_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin mengubah data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit_edit" onClick="confirmSubmitEdit(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_submit_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit_delete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_1_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<div class="kt-scroll" data-scroll="true" data-height="200">
				    <h6>Kategori Acara:</h6>
				    <p id="txt_kategori_acara"></p>
				    <h6>Deskripsi Kategori Acara:</h6>
					<p id="txt_desc_kat_acara"></p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				
			</div>
		</div>
	</div>
</div>

<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="modal_change_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Permintaan Kategori Acara</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
			    
				<form id="form_reason" name="form_reason" action="halaman/update_kategori_event_lainnya.php" method="POST">
				    <div class="alert alert-outline-danger d-none" role="alert" id="alert_form_reason">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				        Data tidak boleh kosong
				    </div>
					<div class="form-group">
					    <div class="form-group">
					        <!--<label for="message-text" class="form-control-label">Ubah instansi menjadi:</label>-->
					        <!--<input type="text" name="kategori" id="kategori" value=""/>-->
					        
							<label for="exampleSelect1">Kategori Acara Ditambahkan</label>
							<select class="custom-select form-control" id="exampleSelect1" name="exampleSelect1">
							    
							    <option value="1">Ya</option>
							    <option value="2">Tidak</option>
							    
							</select>
							<label for="desc_acara">Deskripsi Acara</label>
							<p id="desc_acara"></p>
							
							
							
						</div>
						
						<input type="hidden" name="id_event" id="id_event" />
						<input type="hidden" name="verified_by" value="<?php echo $_SESSION['id_admin']; ?>" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="confirmSubmitChange(this)">Simpan</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
function showKategori(id_req_kat_event, req_kat_event){
	document.getElementById('tambah_kategori').style.display = "block";
	if(req_kat_event!=undefined && id_req_kat_event!=undefined) {
	    document.getElementById("kategori_event").value = req_kat_event;
	    document.getElementById("id_req_kat_event").value = id_req_kat_event;
	    
	}
	
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
}

function hideKategori(select){
	document.getElementById('tambah_kategori').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}

function showEditKategori(id_kat, kat, desc){
	document.getElementById('edit_kategori').style.display = "block";
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
    $("#edit_kategori_event").val(kat);
    $("#edit_id_kategori_event").val(id_kat);
    $("#edit_desc_kat_event").val(desc);
    
    
}

function hideEditKategori(kategori){
	document.getElementById('edit_kategori').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}

function confirmSubmitTambah(select){
    
    if($('#kategori_event').val() == "" || null) {
        
        $('#modal_submit').modal('hide');
        $('#alert_form').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form').addClass('d-none');
            
        }, 2000);
    } else if($('#desc_kat_event').val() == "" || null) {
        $('#modal_submit').modal('hide');
        $('#alert_form').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form').addClass('d-none');
            
        }, 2000);
    }
    else{
        $('#form_tambah_data').submit();
    }    
}

function confirmSubmitEdit(select){
    
    if($('#edit_kategori_event').val() == "" || null) {
        
        $('#modal_submit_edit').modal('hide');
        $('#alert_form_edit').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_edit').addClass('d-none');
            
        }, 2000);
    } else if($('#edit_desc_kat_event').val() == "" || null) {
        $('#modal_submit_edit').modal('hide');
        $('#alert_form_edit').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_edit').addClass('d-none');
            
        }, 2000);
    }
    else{
        $('#form_edit_data').submit();
    }    
}

function confirmSubmitDelete(delete_url){
    
    document.getElementById('modal_submit_delete').style.display = "block";

    document.getElementById('confirm_submit_delete').onclick = function() {
        window.open(delete_url,"_self")
        
    };
    
}

function setId(id_event, desc_acara, status_publish){
    
    document.getElementById("id_event").value = id_event;
    document.getElementById("desc_acara").innerHTML = desc_acara;
    $("#exampleSelect1").val(status_publish);
}

function confirmSubmitChange(select){
    
    if($('#exampleSelect1').val() == "" || null) {
        
        // $('#modal_reason').modal('hide');
        $('#alert_form_reason').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_reason').addClass('d-none');
            
        }, 2000);
    } else{
        $('#form_reason').submit();
    }    
}

function showDetKategori(kat, desc_kat){
    // document.getElementById("btn_tambah_data").disabled = false;
    document.getElementById("txt_kategori_acara").innerHTML = kat;
    document.getElementById("txt_desc_kat_acara").innerHTML = desc_kat;
}


</script>

