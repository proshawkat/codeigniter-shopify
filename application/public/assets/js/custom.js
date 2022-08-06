var getUrl = window.location.pathname;
var url_split = getUrl.split('/');
// console.log(url_split);
//start event setup page script
if((url_split[2] == "event" && url_split[3] == "add-new-event") || (url_split[2] == "event" && url_split[3] == "edit-event")){
    var eventCurrentTab = 0;
    showEventTab(eventCurrentTab);

    function showEventTab(n) {
        var x = document.getElementsByClassName("event-setup-tab");
        if($('input[name="event_type"]:checked').val() == 'talk_event'){
            x = document.getElementsByClassName("talk_event_tab");
        }else if($('input[name="event_type"]:checked').val() == 'private_event_session'){
            x = document.getElementsByClassName("private_session_tab");
        }
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Create Event";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
    }

    function eventNextPrev(n) {

        var x = document.getElementsByClassName("talk_event_tab");

        if($('input[name="event_type"]:checked').val() == 'talk_event'){
            x = document.getElementsByClassName("talk_event_tab");
        }else if($('input[name="event_type"]:checked').val() == 'private_event_session'){
            x = document.getElementsByClassName("private_session_tab");
        }

        x[eventCurrentTab].style.display = "none";

        eventCurrentTab = eventCurrentTab + n;
        if (eventCurrentTab == x.length) {
            document.getElementById("eventSetupForm").submit();
            return false;
        }
        showEventTab(eventCurrentTab);
    }
}
//end setup page script

//start event page builder script
if(url_split[2] == "event" && url_split[3] == "page"){
    var currentTab = 0; 
    showTab(currentTab); 

    function showTab(n) {
      var x = document.getElementsByClassName("page-tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Save";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
    }

    function nextPrev(n) {
      var x = document.getElementsByClassName("page-tab");
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      console.log(currentTab, x.length)
      if (currentTab == x.length) {
        document.getElementById("regForm").submit();
        return false;
      }
      showTab(currentTab);
    }
}

$('.post_promotion_type').change(function(){

    if($('.post_promotion_type').val() == "specific-collection") {
        $('#empty_div_choose').hide();
        $('#talk_collections_id').show(); 
    } else if($('.post_promotion_type').val() == 'site-wide') {
        $('#empty_div_choose').show(); 
        $('#talk_collections_id').hide(); 
    }

});

$('.private_post_promotion_type').change(function(){

    if($('.private_post_promotion_type').val() == "specific-collection") {
        $('#empty_div_choose').hide();
        $('#collections_id').show(); 
    } else if($('.private_post_promotion_type').val() == 'site-wide') {
        $('#empty_div_choose').show(); 
        $('#collections_id').hide(); 
    }
     
});


$(document).ready(function() {

    // var template = $("#editor-templated-textarea-content").val();
    // var html = JSON.parse(template);
    // $('#editor-templated-html-div').html(html);
    
    // document.getElementById('editor-templated-html-div').src = html;
})

function generalStyleEditorBtn(){
    if($('#editor-tab-panel-id1').hasClass('active')) {       
        $("#editor-tab-panel-id1").removeClass('active')
        $("#editor-tab-panel-id2").addClass('active');
    }else if($('#editor-tab-panel-id2').hasClass('active')){     
        $("#editor-tab-panel-id2").removeClass('active')
        $("#editor-tab-panel-id1").addClass('active');
    }
}

function pageLayoutEnable(status){
	$("#enable_page_layout").val(status);
	if($('#page-layout-img-1').hasClass('active')) {       
        $("#page-layout-img-1").removeClass('active')
        $("#page-layout-img-2").addClass('active');
    }else if($('#page-layout-img-2').hasClass('active')){     
        $("#page-layout-img-2").removeClass('active')
        $("#page-layout-img-1").addClass('active');
    }
}

function pageTeamplateChose(id){
	$("#template_id").val(id);       
    $('.page-template .page-template-img.active').removeClass('active')
    $('#page-template-id-'+id).addClass('active');
}

function this_element_div(e, eve){
    $(e).addClass('hover_show_my_border');
}

function this_element_div_out(e, eve){
    $(e).removeClass('hover_show_my_border');
}

function h_tag_update(e){
    var heading_text = $(e).text()
    $("#gender-heading-text-div").show();
    $("#gender-paragraph-text-div").hide();
    $("#heading_textarea_edit_box").val(heading_text);
    // console.log()
}

function p_tag_update(e){
    var p_text = $(e).text()
    $("#gender-heading-text-div").hide();
    $("#gender-paragraph-text-div").show();
    $("#paragraph_textarea_edit_box").val(p_text);
    // console.log()
}

$('.choose_where_page_appear').change(function(){
    console.log('hello world');
    if($('.choose_where_page_appear').val() == "specific-page") {
        $('.choose_specific_page_for_appear_md').show();
    } else {
        $('.choose_specific_page_for_appear_md').hide(); 
    }
});

function widgetTemplateClicked(item){
    $(".input_edit_widget_id").val(item.id)
    $(".input_edit_title_txt").val(item.title)
    $(".input_edit_btn_txt").val(item.btn_text)
    $(".edit_register_heading_text").text(item.title)
    $(".edit_register_btn_text").text(item.btn_text)
    $(".widget-template-wrp .custom-md-div").find('div').removeClass('active')
    $('.event_temp_active_cls_'+item.id).addClass('active')
}

function chooseColorPallet(id, color){
    $(".input_color_id").val(id);
    $(".input_color_code").val(color);
    $(".widget-color-wrp .custom-md-div").find('div').removeClass('active')
    $('.event_color_active_cls_'+id).addClass('active')
}


function chooseRibbonTxt(item){
    $(".input_ribbon_id").val(item.ribbon_id);
    $(".input_ribbon_txt").val(item.ribbon_text);
    $(".ribbon_txt_click").html(item.ribbon_text);
    $(".widget-ribbon-wrp .custom-md-div").find('div').removeClass('active')
    $('.event_ribbon_active_cls_'+item.ribbon_id).addClass('active')
}

$(function () {
    $(".edit_register_heading_text").dblclick(function (e) {
        if($(event.target).attr('class')!="thVal")
            {
                e.stopPropagation();
                var currentEle = $(this);
                var value = $(this).html();
                updateValHeadTxt(currentEle, value);
        }
    });

    $(".edit_register_btn_text").dblclick(function (e) {
        if($(event.target).attr('class')!="thVal"){
            e.stopPropagation();
            var currentEle = $(this);
            var value = $(this).html();
            updateValBtnTxt(currentEle, value);
        }
    });
});

function updateValHeadTxt(currentEle, value) {

    $(document).off('click');
    $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');
    $(".thVal").focus();

    $(".thVal").keyup(function (event) {
        if (event.keyCode == 13) {
            $(currentEle).html($(".thVal").val().trim());
            $(".input_edit_title_txt").val(currentEle.html());
        }
    });
}

function updateValBtnTxt(currentEle, value) {

    $(document).off('click');
    $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');
    $(".thVal").focus();

    $(".thVal").keyup(function (event) {
        if (event.keyCode == 13) {
            $(currentEle).html($(".thVal").val().trim());
            $(".input_edit_btn_txt").val(currentEle.html());
        }
    });
}

function extraEleShow(){
    if($('.extra_ele_div_show').hasClass('show_hide')) {
        $(".extra_ele_div_show").removeClass('show_hide')
        $(".empty_extra_ele_div").removeClass('show_hide_none')
        $('.input_extra_ele_boolean_status').val(0)
    }else{
        $(".extra_ele_div_show").addClass('show_hide');
        $(".empty_extra_ele_div").addClass('show_hide_none');
        $('.input_extra_ele_boolean_status').val(1)
    }
}

$('.choose_discount_money_off').on('click', function(){
    if($(this).is(':checked')) {
        $(".choosed_money_off").show();
        $(".choosed_percentage_off").hide();
    }
});

$('.choose_discount_percentage_off').on('click', function(){
    $(".choosed_percentage_off").show();
    $(".choosed_money_off").hide();
});

$('#ask_phone_number').click(function() {
    if( $(this).is(':checked')) {
        $("#ask_phone_number_input").show();
    } else {
        $("#ask_phone_number_input").hide();
    }
});

function productSearchChoiceDropDownPrePromotion() {
    document.getElementById("pre_promotion_product_give_dropdown_content").classList.toggle("show");
}

function productSearchChoiceDropDown() {
    document.getElementById("product_give_dropdown_content").classList.toggle("show");
}

function productSearchChoiceDropDownHighlight() {
    document.getElementById("highlight_product_give_dropdown_content").classList.toggle("show");
}

function liveProductReelBtn() {
    document.getElementById("live_product_reel_dropdown_content").classList.toggle("show");
}

var initialPreProductArray = [];
function choosePrePromotionnProduct(id) {
    if($('#json_pre_product_checkbox_'+id+' input[type="checkbox"]:checked').is(':checked')){
        var item = $('#json_pre_product_checkbox_'+id+' input[type="checkbox"]:checked').val();

        initialPreProductArray.push(id);
    }else{
        initialPreProductArray = initialPreProductArray.filter(function(item) {
            return id != item
        })
    }
    $("#pre_product_shop_products").val(JSON.stringify(initialPreProductArray))
}

var initialProductArray = [];
function chooseGiveProduct(id) {
    if($('#json_product_checkbox_'+id+' input[type="checkbox"]:checked').is(':checked')){
        var item = $('#json_product_checkbox_'+id+' input[type="checkbox"]:checked').val();
        initialProductArray.push(id);
    }else{
        initialProductArray = initialProductArray.filter(function(item) {
            return id != item
        })
    }
    $("#giveaway_shop_products").val(JSON.stringify(initialProductArray))
}

var initialHighlightProductArray = []
function chooseHighLightProduct(id) {
    if($('#json_highlight_product_checkbox_'+id+' input[type="checkbox"]:checked').is(':checked')){
        var item = $('#json_highlight_product_checkbox_'+id+' input[type="checkbox"]:checked').val();
        initialHighlightProductArray.push(id);
    }else{
        initialHighlightProductArray = initialHighlightProductArray.filter(function(item) {
            return id != item
        })
    }
    $("#highlight_products").val(JSON.stringify(initialHighlightProductArray))
}

var liveProductReelArray = []
function chooseProductReel(id) {
    if($('#json_product_reel_checkbox_'+id+' input[type="checkbox"]:checked').is(':checked')){
        var item = $('#json_product_reel_checkbox_'+id+' input[type="checkbox"]:checked').val();
        liveProductReelArray.push(id);
    }else{
        liveProductReelArray = liveProductReelArray.filter(function(item) {
            return id != item
        })
    }
    $("#live_products_reel_input").val(JSON.stringify(liveProductReelArray))
}

$("#change_live_coupon_code_submit").click(function(){
    var code = $('#change_live_coupon_code').val();
    var event_id = $('#event_id').val();
    var talk_event_id = $('#talk_event_id').val();
    var base_url = $('base').attr('href')+'event/live-coupon/update';


    $.ajax({
        type: "POST",
        url: base_url,
        data: { code:code, event_id:event_id, talk_event_id:talk_event_id },
        success: function( res ) {
            $(".change_live_coupon_code_wrp").removeClass('show_hide')
            $('#change_live_coupon_code').val('')
        }
    });


});


function divShowHide(){
    if($('.change_live_coupon_code_wrp').hasClass('show_hide')) {
        $(".change_live_coupon_code_wrp").removeClass('show_hide')
    }else{
        $(".change_live_coupon_code_wrp").addClass('show_hide');
    }
}

$('#percentage_off_order').on('click', function(){
    if($(this).is(':checked')) {
        $("#percentage_off_order_div_wrp_in").show();
        $("#products_giveaway_div_wrp").hide();
    }
});

$('#products_giveaway').on('click', function(){
    $("#products_giveaway_div_wrp").show();
    $("#percentage_off_order_div_wrp_in").hide();
});

// var selectedValues = [];

$('#highlight_multiple_product_select').change(function() {
    var selectedValues = $(this).val();
    var all_products = JSON.parse($('#highlight_product_ids_array').val());

    all_products.forEach(function (item) {
        if(selectedValues.indexOf(item.toString()) !== -1){
            $("#product_highlight_"+item).removeClass('show_hide_none')
        }else {
            $("#product_highlight_"+item).addClass('show_hide_none')
        }
    })

});