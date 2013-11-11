<h2>Upload file(s)</h2>

<form action="<?php echo $this->Html->url(array('controller'=>'customerfiles', 'action'=>'batchupload', $this->request->data['id'])); ?>" id="CustomerFileBatchuploadForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
<div class="input file">
<input type="file" name="CustomerFile[]"  id="CustomerFileName" multiple="multiple" ></div>
<div class="submit"><input  type="submit" value="Upload"/></div></form>			</div>