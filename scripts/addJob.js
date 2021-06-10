$("#formTest").submit(function(e){
    e.preventDefault();
    var name = $("input[name='name']").val();
    var email = $("input[name='email']").val();
    var location = $("input[name='location']").val();
    var contact = $("input[name='contact']").val();

    $("#job-ads tbody").append("<tr data-name='"+name+"' data-email='"+email+"'data-location='"+location+"'data-contact='"+contact+"'><td>"+name+"</td><td>"+email+"</td><td>"+location+"</td><td>"+contact+"</td><td><button class='btn btn-info btn-xs btn-edit'>Edit</button><button class='btn btn-danger btn-xs btn-delete'>Delete</button></td></tr>");

    $("input[name='name']").val('');
    $("input[name='email']").val('');
    $("input[name='location']").val('');
    $("input[name='contact']").val('');
});

$("body").on("click", ".btn-delete", function(){
    $(this).parents("tr").remove();
});

$("body").on("click", ".btn-edit", function(){
    var name = $(this).parents("tr").attr('data-name');
    var email = $(this).parents("tr").attr('data-email');
    var location = $(this).parents("tr").attr('data-location');
    var contact = $(this).parents("tr").attr('data-contact');

    $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="'+name+'">');
    $(this).parents("tr").find("td:eq(1)").html('<input name="edit_email" value="'+email+'">');
    $(this).parents("tr").find("td:eq(2)").html('<input name="edit_location" value="'+location+'">');
    $(this).parents("tr").find("td:eq(3)").html('<input name="edit_contact" value="'+contact+'">');


    $(this).parents("tr").find("td:eq(4)").prepend("<button class='btn btn-info btn-xs btn-update'>Update</button><button class='btn btn-warning btn-xs btn-cancel'>Cancel</button>")
    $(this).hide();
});

$("body").on("click", ".btn-cancel", function(){
    var name = $(this).parents("tr").attr('data-name');
    var email = $(this).parents("tr").attr('data-email');
    var location = $(this).parents("tr").attr('data-location');
    var contact = $(this).parents("tr").attr('data-contact');

    $(this).parents("tr").find("td:eq(0)").text(name);
    $(this).parents("tr").find("td:eq(1)").text(email);
    $(this).parents("tr").find("td:eq(2)").text(location);
    $(this).parents("tr").find("td:eq(3)").text(contact);

    $(this).parents("tr").find(".btn-edit").show();
    $(this).parents("tr").find(".btn-update").remove();
    $(this).parents("tr").find(".btn-cancel").remove();
});

$("body").on("click", ".btn-update", function(){
    var name = $(this).parents("tr").find("input[name='edit_name']").val();
    var email = $(this).parents("tr").find("input[name='edit_email']").val();
    var location = $(this).parents("tr").find("input[name='edit_location']").val();
    var contact = $(this).parents("tr").find("input[name='edit_contact']").val();

    $(this).parents("tr").find("td:eq(0)").text(name);
    $(this).parents("tr").find("td:eq(1)").text(email);
    $(this).parents("tr").find("td:eq(2)").text(location);
    $(this).parents("tr").find("td:eq(3)").text(contact);

    $(this).parents("tr").attr('data-name', name);
    $(this).parents("tr").attr('data-email', email);
    $(this).parents("tr").attr('data-location', location);
    $(this).parents("tr").attr('data-contact', contact);

    $(this).parents("tr").find(".btn-edit").show();
    $(this).parents("tr").find(".btn-cancel").remove();
    $(this).parents("tr").find(".btn-update").remove();
});