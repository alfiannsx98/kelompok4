$(document).ready(function(){
    $("#edit-btn").click(function(){
        $("#edit-btn").prop('hidden', true);
        $("#save-btn").prop('hidden', false);
        $(".title-1").html("Edit Data");
        $("#nim").prop('disabled', false);
        $("#nama").prop('disabled', false);
        $("#jk").prop('disabled', false);
        $("#alamat").prop('disabled', false);
        $("#hp").prop('disabled', false);
        $("#email").prop('disabled', false);
        $("#prodi").prop('disabled', false);
        $("#semester").prop('disabled', false);
    });

    $("#edit-btn").click(function(){
        $("#edit-btn").prop('hidden', true);
        $("#save-btn").prop('hidden', false);
        $(".title-1").html("Edit Data");
        $("#nip").prop('disabled', false);
        $("#nm-ds").prop('disabled', false);
        $("#jk-ds").prop('disabled', false);
        $("#almt-ds").prop('disabled', false);
        $("#hp-ds").prop('disabled', false);
        $("#email-ds").prop('disabled', false);
        $("#prodi-ds").prop('disabled', false);
        $("#role").prop('disabled', false);
    });
});