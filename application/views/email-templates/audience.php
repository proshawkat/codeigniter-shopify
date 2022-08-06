<div style="width: 100%; background-color: #EEEEEE; min-height: 300px; margin: 0; padding: 50px 0; font-family: sans-serif; color: #444;">
    <div style="width: 100%; max-width: 768px; min-height: 300px; margin: 0 auto;">

        <!-- Mail header -->
        <div style="height: 70px;">
            <div style="width: 50%; float: left; font-size: 35px; font-weight: bold; font-family: sans-serif;">Fogzee.com</div>
            <div style="width: 50%; float: left;">
                <a href="<?php echo $shop_url;?>" target="_blank" style="width:200px;height:40px;display:block;text-align:center;text-decoration:none;background-color:#444444;color:#FFFFFF;border: 0;line-height:40px;font-weight:bold;letter-spacing:3px;float:right;margin-top: 5px;">Visit Website</a>
            </div>
        </div>

        <!-- Mail content -->
        <div style="background-color: #FFFFFF; min-height: 350px; border-top: 15px solid #ec77d3; padding: 30px;">
            <h1 style="font-size: 25px; font-weight: normal;">Welcome to <?php echo $event_info->{Events::EVENT_NAME};?></h1>
            <h3>Hello <?php echo $name;?></h3>
            <p>Below is your event information</p>

            <p style="border: 2px dotted #CCC; padding: 30px; font-size: 18px; color: #555;">Event will start at: <span style="color: #ec77d3; font-weight: bold; letter-spacing: 2px;"><?php echo format_date($event_info->{Events::EVENT_START_DATE});?>, <?php echo date("h:i a", strtotime($event_info->{Events::EVENT_START_TIME}));?> (<?php echo $event_info->{Events::TIME_ZONE};?>)</span></p>

            <p style="font-size: 20px;">To get pre event promotions visit the event page now.</p>
            <a href="<?php echo (isset($audience_url)) ? $audience_url: '';?>" target="_blank" style="display: block; margin: 0 auto; text-align: center; text-decoration: none; color: #FFF; width: 200px; height: 50px; background-color: #222; line-height: 50px; font-size: 20px;">Visit Event Page</a>
        </div>

        <!-- Mail footer -->
        <div style="height:200px;background-color:#d6dad2;padding:0 30px 30px;">
            <div style="display:block;margin: 0 auto 30px;width:0;height:0;border:15px solid transparent;border-top-color:#FFF;"></div>
            <h4>Thanks for registering for the event.</h4>
            <div style="font-size: 35px; font-weight: bold; font-family: sans-serif;">Fogzee.com</div>

            <div style="border-top:1px solid #CCC;margin-top:50px;padding-top:15px;">
                <ul style="list-style: none; margin: 0 auto; padding: 0; max-width: 400px;">
                    <li style="display: inline-block"><a href="#" style="display: block; padding: 10px 15px; text-align: center; text-decoration: none; color: #666;">Home</a></li>
                    <li style="display: inline-block"><a href="#" style="display: block; padding: 10px 15px; text-align: center; text-decoration: none; color: #666;">About Us</a></li>
                    <li style="display: inline-block"><a href="#" style="display: block; padding: 10px 15px; text-align: center; text-decoration: none; color: #666;">Contact Us</a></li>
                    <li style="display: inline-block"><a href="#" style="display: block; padding: 10px 15px; text-align: center; text-decoration: none; color: #666;">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>