$jq =jQuery.noConflict();

$jq(document).ready(function(){
    $jq(".songer_multi_file").each(function(){

        var fieldId = $jq(this).attr("id");

        $jq(this).after("<div id='songer_upload_panel_"+ fieldId +"' ></div>");
        $jq("#songer_upload_panel_"+ fieldId).html("<input type='button' value='Add Files' class='songer_upload_btn' id='"+ fieldId +"' />");
        $jq("#songer_upload_panel_"+ fieldId).append("<div class='songer_preview_box' id='"+ fieldId +"_panel' ></div>");
        $jq(this).remove();
    });


	
    $jq(".songer_upload_btn").click(function(){
        
        
        var uploadObject = $jq(this);
        var sendAttachmentMeta = wp.media.editor.send.attachment;

        wp.media.editor.send.attachment = function(props, attachment) {
           
            $jq(uploadObject).parent().find(".songer_preview_box").append("<img class='songer_img_prev' style='with:75px;height:75px' src='"+ attachment.url +"' />");
            $jq(uploadObject).parent().find(".songer_preview_box").append("<input class='songer_img_prev_hidden' type='hidden' name='h_"+ $jq(uploadObject).attr("id")
                +"[]' value='"+ attachment.url +"' />");


            wp.media.editor.send.attachment = sendAttachmentMeta;
        }

        wp.media.editor.open();

        return false;   
    });
    
    
    $jq("body").on("dblclick", ".songer_img_prev" , function() {

        
        $jq(this).parent().find(".songer_img_prev_hidden").remove();
        $jq(this).remove();
    });


});
