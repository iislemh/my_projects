$().ready(function() {
    $("#table td").click(function() {
        $("#table tr").removeAttr('id', 'selected');
        $("#titleAndFilter ul li a").removeClass('inactiveLink');
        $row = $(this).parent("tr");
        $row.attr('id', 'selected');
        $id = $row.data("id");
        
        $.ajax({
            url: "php/queries/rowSelection/theaters.php",
            dataType: "JSON",
            data: {id: $id},
            cache: false,
            error: function() {
                alert("Erreur: veuillez contacter votre administrateur.");
            },
            success: function(data) {
                $("#modify .id").val(data[0]["id"]);
                $("#modify .name").val(data[0]["name"]);
                $("#modify .numberOfPlace").val(data[0]["numberOfPlace"]);
                $("#modify .address").val(data[0]["address"]);
                $("#modify .phone").val(data[0]["phone"]);
                // Archiving
                $("#archive .id").val(data[0]["id"]);
            }
        });
    });
});