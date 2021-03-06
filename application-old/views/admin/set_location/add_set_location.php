<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post"enctype="multipart/form-data">
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="set_location_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="set_location_name_<?=$lang['language_id']?>" id="set_location_name_<?=$lang['language_id']?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
                    
                    <p class="select">
                        <label for="phase_id">Phase</label>
                        <select name="phase_id" id="phase_id" class="input-text required">
                        	<option value="">-- Select Phase --</option>
                            <?php foreach ($list_phase as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" data-img="<?php echo base_url('images/our/'.$item['phase_image']); ?>"><?php echo $item['phase_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <?php /*
                    <p class="select">
                        <label for="investment_id">Investment</label>
                        <select name="investment_id" id="investment_id" class="input-text required">
                            <option value="">-- Select Investment --</option>
                            <?php foreach ($list_investment as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>" data-img="<?php echo base_url('images/our/'.$item['investment_image']); ?>"><?php echo $item['investment_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>

                    */?>
                    <p>
                        <label>Highlights</label>
                        <label for="set_location_highlights_yes">
                            <input type="radio" id="set_location_highlights_yes" name="set_location_highlights" value="1"> Yes
                        </label>
                        <label for="set_location_highlights_no">
                            <input type="radio" id="set_location_highlights_no" name="set_location_highlights" value="0" checked> No
                        </label>
                    </p>
                    

                    <div class="clear"></div>

                    <div class="content-highlights hide">
                        <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                            <div class="language lang-<?=$lang['language_code']?> " <?php if ($x == 0) echo 'style="display:block"'; ?>>
                                <p>
                                    <label for="set_location_description_highlights_title_<?=$lang['language_id']?>">Title Highlights</label>
                                    <input type="text" name="set_location_description_highlights_title_<?=$lang['language_id']?>" id="set_location_description_highlights_title_<?=$lang['language_id']?>" class="input-text">
                                </p>
                                <p>
                                    <label for="set_location_description_highlights_<?=$lang['language_id']?>">Description</label>
                                    <textarea name="set_location_description_highlights_<?=$lang['language_id']?>" id="set_location_description_highlights_<?=$lang['language_id']?>" class="input-text"></textarea>
                                </p>
                            </div>
                        <?php $x++; endforeach;?>
                    </div>
                    <?php /*
                    <p>
                        <label>More Projects</label>
                        <label for="set_location_moreprojects_yes">
                            <input type="radio" id="set_location_moreprojects_yes" name="set_location_moreprojects" value="1"> Yes
                        </label>
                        <label for="set_location_moreprojects_no">
                            <input type="radio" id="set_location_moreprojects_no" name="set_location_moreprojects" value="0" checked> No
                        </label>
                    </p>
                    <div class="clear"></div>
                    
                    <div class="content-more hide">                        
                        <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                            <div class="language lang-<?=$lang['language_code']?> " <?php if ($x == 0) echo 'style="display:block"'; ?>>
                                <p>
                                    <label for="set_location_description_moreprojects_title_<?=$lang['language_id']?>">Title Projects</label>
                                    <input type="text" name="set_location_description_moreprojects_title_<?=$lang['language_id']?>" id="set_location_description_moreprojects_title_<?=$lang['language_id']?>" class="input-text">
                                </p>
                                <p>
                                    <label for="set_location_description_moreprojects_<?=$lang['language_id']?>">Description</label>
                                    <textarea name="set_location_description_moreprojects_<?=$lang['language_id']?>" id="set_location_description_moreprojects_<?=$lang['language_id']?>" class="input-text"></textarea>
                                </p>
                            </div>
                        <?php $x++; endforeach;?>
                    </div>
                    */?>
                </div>

            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>

            <div class="clear"></div>
            
            <div class="form-div boxmap in-map hide">     
                <h3>Drag Icon to Map</h3>
                <input type="hidden" name="set_location_position" class="required">           
                <div class="box-list-point">
                    <div class="btnPoint">
                        <span class="iconPhase"><img src="" alt="Icon"></span>
                    </div>
                </div>
            </div>

            <div class="form-div ckeditor in-map hide" style="width: 1170px">
                <div class="wrap-map">
                    <img src=" <?php echo base_url('images/our/map_idn.png');?>" class="img-responsive" style="width:100%;"/>
               
                </div>
            </div>

         </div>
    </form>
</div>

<script>
    $(function(){
        $( ".btnPoint" ).draggable({
            cursor: "move",
            containment: ".wrap-map",
            drag: function(e, u){
                $('input[name="set_location_position"]').val(u.position.top+ ',' + u.position.left);
            }
        });

        $(".wrap-map").droppable({ 
            accept: ".btnPoint", 
            drop: function(event, ui){
                var dropped = ui.draggable;
                var droppedOn = $(this);
                $(dropped).appendTo(droppedOn);
            }
        });

        $('select[name=phase_id]').change(function(){
            if($(this).val() != ''){
                $('.in-map').show();
                $('.btnPoint img').attr('src', $('option:selected', this).attr('data-img'));
            }else{
                $('.in-map').hide();
            }
        });

        $('input[name=set_location_highlights]').change(function(){
            if($(this).val() == 1){
                $('.content-highlights').show();
            }else{
                $('.content-highlights').hide();
                $('.content-highlights textarea, .content-highlights input').val('');
            }
        });

        $('input[name=set_location_moreprojects]').change(function(){
            if($(this).val() == 1){
                $('.content-more').show();
            }else{
                $('.content-more').hide();
                $('.content-more textarea, .content-more input').val('');
            }
        });
    })
</script>

<style>
    .hide{
        display: none;
    }

    div.boxmap{
        width: 125px;
    }
    .box-list-point{
        position: relative;
        height: 50px;
        text-align: center;
    }
    
    .box-list-point .btnPoint,
    .btnPoint{
        z-index: 1000;
        position: absolute;
        left: 0;
        right: 0;
        width: 27px;
        
    }

    .wrap-map{
        position: relative;
        z-index: 900;
    }
</style>