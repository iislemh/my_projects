$().ready(function() {
    $("#table td").click(function() {
        $("#table tr").removeAttr('id', 'selected');
        $("#titleAndFilter ul li a").removeClass('inactiveLink');
        $row = $(this).parent("tr");
        $row.attr('id', 'selected');
        $id = $row.data("id");

        $.ajax({
            url: "php/queries/rowSelection/languages.php",
            dataType: "JSON",
            data: {id: $id},
            cache: false,
            error: function() {
                alert("Erreur: veuillez contacter votre administrateur.");
            },
            success: function(data) {
                $("#modify .id").val(data[0]["id"]);
                $("#modify .name").val(data[0]["name"]);
                $("#modify .abbreviation").val(data[0]["abbreviation"]);
                // Archiving
                $("#archive .id").val(data[0]["id"]);
            }
        });
    });
});