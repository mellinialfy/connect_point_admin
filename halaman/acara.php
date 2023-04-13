<?php 
$title = 'Daftar Acara';
?>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-ticket-alt"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Daftar Acara
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
					<th>No</th>
					<th>Nama Acara</th>
					<th>Nama Penyelenggara Acara</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			include "connection.php";
			
			$sql="SELECT tb_event.id_event, tb_event.nama_event, tb_user.id_user, tb_user.nama_user, tb_event.status_event FROM tb_event LEFT JOIN tb_user ON tb_user.id_user = tb_event.id_user WHERE tb_event.status_event NOT IN(2) ORDER BY tb_event.created_at DESC";
			$result=mysqli_query($connect,$sql);
			$no = 1;
			while($row=mysqli_fetch_assoc($result)){
			echo '
			<tr>
			<td>'.$no.'</td>
			<td>'.$row['nama_event'].'</td>
			<td><a href="?page=eo&id='.$row['id_user'].'">'.$row['nama_user'].'</a></td>
			<td>
			'. ($row['status_event'] == '0' ? '
			<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Aktif</span>' : 
			    ($row['status_event'] == '1' ? '<span class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">Nonaktif</span>' : 
			        '')).'
			 </td>
			 <td nowrap>
			 <a href="?page=acara&id='.$row['id_event'].'" class="btn btn-sm btn-clean btn-icon-md" id="btn_delete" title="Lihat">
			 <i class="la la-info-circle"></i>
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
