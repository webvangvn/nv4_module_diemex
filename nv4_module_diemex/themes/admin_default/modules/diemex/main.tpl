<!-- BEGIN: main -->
        	<form enctype="multipart/form-data" action="{IMP_ACTION}" method="post">
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
              <table class="tab1">
              <tr>
              <td><strong>File XML</strong>:</td>
              <td><input type="file" name="file" /></td>
              <td><input type="submit" value="Upload" /></td>
              </tr>
              </table>
 		 </form>
         <h4>{NOTICE.notice}</h4>
		 {LANG.banghi}{NUM_ROW} <a href="{IMP_ACTION}&del=ok" onclick="return confirm('{LANG.deleted_conf}')">({LANG.delete})</a>
<!-- END: main -->