$(document).ready(function(){
    $("#close-btn").click(function(){
        $("#edit-btn").prop('hidden', false);
        $("#save-btn").prop('hidden', true);
        $(".title-1").html("Detail Data");
        $("#nim").prop('disabled', true);
        $("#nama").prop('disabled', true);
        $("#jk").prop('disabled', true);
        $("#alamat").prop('disabled', true);
        $("#hp").prop('disabled', true);
        $("#email").prop('disabled', true);
        $("#prodi").prop('disabled', true);
        $("#semester").prop('disabled', true);
    });

    $("#close-btn").click(function(){
        $("#edit-btn").prop('hidden', false);
        $("#save-btn").prop('hidden', true);
        $(".title-1").html("Detail Data");
        $("#nip").prop('disabled', true);
        $("#nm-ds").prop('disabled', true);
        $("#jk-ds").prop('disabled', true);
        $("#almt-ds").prop('disabled', true);
        $("#hp-ds").prop('disabled', true);
        $("#email-ds").prop('disabled', true);
        $("#prodi-ds").prop('disabled', true);
        $("#role").prop('disabled', true);
    });
});