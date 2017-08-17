<!doctype html>
<html>

<body>
<!-- Modal -->
  <div class="modal fade" id="modal3" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" align="center">New Goods Detail</h3>
        </div>
        <div class="modal-body" id="form">
		
			<form  id="form" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method='POST' class="form-horizontal" style="width:300px;margin:auto;padding-top:20px;">
				
				<div class="form-group">
					<label class="control-label col-sm-4" >Goods Name&nbsp;<span id="remark">*</span></label>
					<input type='text' name='name' class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4"  >Related Department&nbsp;<span id="remark">*</span></label>
					<input type='text' name='dept' class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 ui-hidden-accessible">Imported From&nbsp;<span id="remark">*</span></label>
					 <input type='text' name='firm' class="form-control" required>
				</div>
				
				<br/><br/>
								
								
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="button" type="submit" name ='new_goods_detail' value ="submit">Submit</button>
									
			</form>
		 <br/>
					
        </div>
        <div class="modal-footer">
		   <h5 id="remark" align="center">*Fields are necessary</h5>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>
</body>
</html>