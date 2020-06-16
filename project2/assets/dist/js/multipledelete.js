$(document).ready(function(){
    // ENABLE MULTIPLE DELETE
    $("button#check").click(function(){
        $("button#dellall1").prop('hidden', false);
        $("button#cls").prop('hidden', false);
        $("button#check").prop('hidden', true);
        $("th#all1").prop('hidden', false);
        $("th#all").prop('hidden', false);
        $("td#list").prop('hidden', false);
        $("th#acc").prop('hidden', true);
        $("td#bt").prop('hidden', true);
        $("button#add").prop('hidden', true);
    });

    // DISABLE MULTIPLE DELETE
    $("button#cls").click(function(){
        $("button#dellall1").prop('hidden', true);
        $("button#dellall").prop('hidden', true);
        $("button#cls").prop('hidden', true);
        $("button#checkall").prop('hidden', false);
        $("button#uncheckall").prop('hidden', true);
        $("button#check").prop('hidden', false);
        $("th#all1").prop('hidden', true);
        $("th#all").prop('hidden', true);
        $("td#list").prop('hidden', true);
        $("input#cb").prop('checked', false);
        $("th#acc").prop('hidden', false);
        $("td#bt").prop('hidden', false);
        $("button#add").prop('hidden', false);
    });


    // ENABLE CHECK ALL
    $("button#checkall").click(function(){
        $("button#uncheckall").prop('hidden', false);
        $("button#checkall").prop('hidden', true);
        $("input#cb").prop('checked', true);
    });

    // DISABLE CHECK ALL
    $("button#uncheckall").click(function(){
        $("button#checkall").prop('hidden', false);
        $("button#uncheckall").prop('hidden', true);
        $("input#cb").prop('checked', false);
    });

    // CHANGE CHECK ALL
    $("input#cb").change(function(){
        $("button#uncheckall").prop('hidden', true);
        $("button#checkall").prop('hidden', false);

        if($("input#cb:checked").length > 0){
            $("button#dellall1").prop('hidden', true);
            $("button#dellall").prop('hidden', false);
        } else {
            $("button#dellall1").prop('hidden', false);
            $("button#dellall").prop('hidden', true);
        }
    });
});