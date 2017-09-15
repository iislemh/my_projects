$().ready(function() {
    $("#table td").click(function() {
        $("#table tr").removeAttr('id', 'selected');
        $("#table td a").addClass('inactiveLink');
        $("#table tr img").attr('src', 'resources/imgs/layout/pictureGrey.png');
        $row = $(this).parent("tr");
        $("#titleAndFilter ul li a").removeClass('inactiveLink');
        $("#titleAndFilter ul li a").removeClass('inactiveLink');     
        $row.find(".inactiveLink img").attr('src', 'resources/imgs/layout/picture.png');
        $row.find(".inactiveLink").removeClass('inactiveLink');
        $row.attr('id', 'selected');
        $id = $row.data("id");

        $.ajax({
            url: "php/queries/rowSelection/movies.php",
            dataType: "JSON",
             data: {id: $id},
            cache: false,
            error: function() {
                alert("Erreur: veuillez contacter votre administrateur.");
            },
            success: function(data) {      
                $("#modify .id").val(data[0]["id"]);
                $("#modify .title").val(data[0]["title"]);
                $("#modify .titleOriginal").val(data[0]["titleOriginal"]);
                $("#modify .realisator").val(data[0]["realisator"]);
                $("#modify .plot").val(data[0]["plot"]);
                $("#modify .actors").val(data[0]["actors"]);
                $("#modify .country").val(data[0]["country"]);
                $("#modify .type").val(data[0]["type"]);
                $("#modify .genre #actualGenre").val(data[0]["genre"]);
                $("#modify .genre #actualGenre").html(data[0]["genre"]);
                $("#modify .releaseDate").val(data[0]["releaseDate"]);
                $("#modify .runningTime").val(data[0]["runningTime"]);
                $("#modify .production").val(data[0]["production"]);
                $("#modify .distribution").val(data[0]["distribution"]);
                $("#modify .language").val(data[0]["language"]);
                $("#modify .warning").val(data[0]["warning"]);
                // Archiving
                $("#archive .id").val(data[0]["id"]);
            }
        });
    });
});