<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/view/', $row[$first]['unique_id']; ?>" method="post" <?php if ($this->phase_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row[$first]['unique_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row[$first]['phase_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="phase_name_<?=$lang['language_id']?>">Title</label>
                                <input type="text" class="input-text required" name="phase_name_<?=$lang['language_id']?>" id="phase_name_<?=$lang['language_id']?>" value="<?php echo $row[$lang['language_id']]['phase_name']; ?>" />
                                <span class="help">Judul article</span>
                        </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <?php if ($this->phase_image == TRUE) : ?>
                    <p class="upload">
                        <?php if ($row[$first]['phase_image']) : ?>
                        <img class="delete-image" title="Delete Image" alt="<?php echo $this->url; ?>" id="phase_image" src="<?php echo base_url() , 'images/admin/delete.gif'; ?>" />
                        
                        <img class="load phase_image" src="<?php echo base_url(), 'images/admin/ajax-loader.gif'; ?>" />
                        
                        <?php endif; ?>
                        <label>Image</label>
                        
                        <?php if ($row[$first]['phase_image']) echo '<a class="hover-image" href="', base_url() , 'images/business/phase/' , $row[$first]['phase_image'] , '">&nbsp;</a>';
                        else echo '<span class="hover-image">&nbsp;</span>'; ?>
                        
                        <input type="text" class="input-text current-image" <?php if ($row[$first]['phase_image']) echo 'value="hover to view current image"'; ?> />
                        
                        <input type="file" class="input-file" name="phase_image" accept="jpg|jpeg|gif|png" size="36" />
                        
	                    <?php endif; ?>
                        
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>
                    </p>
                    
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/view_flag'); ?> 
            </div>
            
            <div class="clear"></div>
            
        </div>
    </form>
</div>