<?php 
$title = 'Daftar Penyelenggara Acara';
?>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-ticket-alt"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Daftar Penyelenggara Acara
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
				<tr>
					<th>ID</th>
					<th>Nama Penyelenggara Acara</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			include "connection.php";
			
			$sql="SELECT id_user, nama_user, username, email, status_user FROM `tb_user` WHERE id_jenis_user=2 ORDER BY id_user";
			$result=mysqli_query($connect,$sql);
			
			while($row=mysqli_fetch_assoc($result)){
			echo '
			<tr>
			<td>'.$row['id_user'].'</td>
			<td>'.$row['nama_user'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.$row['email'].'</td>
			<td>
			'. ($row['status_user'] == '0' ? '
			<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">Belum Terverifikasi</span>' : 
			    ($row['status_user'] == '1' ? '<span class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">Nonaktif</span>' : 
			        ($row['status_user'] == '2' ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Terverifikasi</span>' : 
			            ($row['status_user'] == '3' ? '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Menunggu Verifikasi</span?' : 
			            '')))).'
			 </td>
			 <td nowrap>
			 <a href="?page=eo&id='.$row['id_user'].'" class="btn btn-sm btn-clean btn-icon-md" id="btn_delete" title="Lihat">
			 <i class="la la-info-circle"></i>
			 </a>
			 </td>
			 </tr>';
			 }
			 mysqli_free_result($sql);
			 mysqli_close($connect);
			 
			 ?>
			 </tbody>
		</table>

		<!--end: Datatable -->
    
    </div>
</div>
