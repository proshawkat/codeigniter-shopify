<!-- Registration banner design -->
<div class="reg-banner-des-container warm-welcome-banner <?php echo (isset($hoverable) && $hoverable == true) ? 'selectable' : '';?>">
    <div class="banner-img-container">
        <img src="<?php echo base_url('public/assets/images/banner-templates/banner_template_warm_welcoming.png'); ?>" alt="<?php if(isset($banner_data->title)){echo $banner_data->title;} ?>" class="img-fluid">
        <img src="<?php echo base_url('public/assets/images/banner4.jpg'); ?>" alt="<?php if(isset($banner_data->title)){echo $banner_data->title;} ?>" class="img-fluid">
        <img src="<?php echo base_url('public/assets/images/banner4.jpg'); ?>" alt="<?php if(isset($banner_data->title)){echo $banner_data->title;} ?>" class="img-fluid">
    </div>
    <div class="banner-text-content">
        <?php if(isset($edit) && $edit == true){ ?>

            <div class="title-edit-input">
                <input type="text" name="edit_title_<?php echo $banner_data->id;?>" value="<?php if(isset($banner_data->title)){echo $banner_data->title;} ?>" class="form-control">
            </div>

            <div class="event-msg-edit-input">
                <input type="text" name="edit_event_msg_<?php echo $banner_data->id;?>" value="<?php if(isset($banner_data->event_msg)){echo $banner_data->event_msg;} ?>" class="form-control">
            </div>

            <div class="event-date-data">
                <?php if(isset($event_start_date)) echo $event_start_date; ?>
            </div>

            <div class="event-btn-text-edit-input">
                <input type="text" name="edit_btn_text_<?php echo $banner_data->id;?>" value="<?php if(isset($banner_data->btn_text)){echo $banner_data->btn_text;} ?>" class="form-control">
            </div>

        <?php }else{ ?>
            <h4><?php if(isset($banner_data->title)){echo $banner_data->title;} ?></h4>
            <h2><?php if(isset($banner_data->event_msg)){echo $banner_data->event_msg;} ?></h2>
            <p><?php if(isset($event_start_date)) echo $event_start_date; ?></p>
            <button class="btn btn-default reg-btn" type="button"><?php if(isset($banner_data->btn_text)){echo $banner_data->btn_text;} ?></button>
        <?php } ?>
    </div>
</div>