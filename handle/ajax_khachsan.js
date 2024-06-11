
document.querySelector(document).ready(function () {
    $("#select_branch").change(function(){
        var id = document.querySelector("#select_branch").value;
        alert(id);
        document.querySelector.post("handle_select.php",{id : id} , function(date)
        {
            $("#select_hotel").html(date);
        });
    })
})