<!-- BEGIN: main -->
    	<form name="f1" class="form-wrapper w1" action="{ACTION_FILE}" method="post">
    	   <input id="search" name="maso" type="text"/>
    	   <input id="submit" type="submit" name="confirm" value="{LANG.search}" />
    	</form>
    
    <h2>{NOTICE}</h2>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<colgroup>
				<col style="width:30%">
				<col style="width:30%">
			</colgroup>
			<!-- BEGIN: table -->
			<thead>
				<tr>
					<td>{LANG.sbd}</td>
					<td>{LANG.ho}</td>
					<td>{LANG.ten}</td>
					<td>{LANG.lop}</td>
					<td>{LANG.ngsinh}</td>
					<td>{LANG.phong}</td>
					<td>{LANG.toan}</td>
					<td>{LANG.ly}</td>
					<td>{LANG.hoa}</td>
					<td>{LANG.van}</td>
					<td>{LANG.su}</td>
					<td>{LANG.dia}</td>
					<td>{LANG.sinh}</td>
					<td>{LANG.anh}</td>
					<td>{LANG.gd}</td>
				</tr>
			</thead>
			<!-- END: table -->
			<!-- BEGIN: loop -->
			<tbody>
				<tr>
					<td>{TABLE.sbd}</td>
					<td>{TABLE.ho}</td>
					<td><a href="{NV_BASE_SITEURL}index.php?language=vi&nv=diemex&pr=lop&maso={TABLE.ten}" title="{LANG.trungten}{TABLE.ho} {TABLE.ten}" >{TABLE.ten}</a></td>
					<td><a href="{NV_BASE_SITEURL}index.php?language=vi&nv=diemex&pr=lop&maso={TABLE.lop}" title="{LANG.trunglop}{TABLE.ho} {TABLE.ten} ({TABLE.lop})" >{TABLE.lop}</a></td>
					<td>{TABLE.ngsinh}</td>
					<td><a href="{NV_BASE_SITEURL}index.php?language=vi&nv=diemex&pr=phong&maso={TABLE.phong}" title="{LANG.trungp}{TABLE.ho} {TABLE.ten} ({TABLE.phong})" >{TABLE.phong}</a></td>
					<td>{TABLE.toan}</td>
					<td>{TABLE.ly}</td>
					<td>{TABLE.hoa}</td>
					<td>{TABLE.van}</td>
					<td>{TABLE.su}</td>
					<td>{TABLE.dia}</td>
					<td>{TABLE.sinh}</td>
					<td>{TABLE.anh}</td>
					<td>{TABLE.gd}</td>        
				</tr>
			</tbody>
			<!-- END: loop -->
			<!-- BEGIN: tde_duoi -->
				<thead>
				<tr>
					<td>{LANG.sbd}</td>
					<td>{LANG.ho}</td>
					<td>{LANG.ten}</td>
					<td>{LANG.lop}</td>
					<td>{LANG.ngsinh}</td>
					<td>{LANG.phong}</td>
					<td>{LANG.toan}</td>
					<td>{LANG.ly}</td>
					<td>{LANG.hoa}</td>
					<td>{LANG.van}</td>
					<td>{LANG.su}</td>
					<td>{LANG.dia}</td>
					<td>{LANG.sinh}</td>
					<td>{LANG.anh}</td>
					<td>{LANG.gd}</td>
							</tr>
			</thead>
			<!-- END: tde_duoi -->
			<!-- BEGIN: icon -->
					<span class="print_icon"><a href="{PRINT}" target="_blank">{LANG.print}</a></span><br />
			<!-- END: icon -->
		</table>
	</div>

<!-- END: main -->