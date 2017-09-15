$().ready(function() {
    $("#table td").click(function() {
        $("#table tr").removeAttr('id', 'selected');
        $("#titleAndFilter ul li a").removeClass('inactiveLink');
        $row = $(this).parent("tr");
        $row.attr('id', 'selected');
        $id = $row.data("id");

        $.ajax({
            url: "php/queries/rowSelection/employees.php",
            dataType: "JSON",
            data: {id: $id},
            cache: false,
            error: function() {
                alert("Erreur: veuillez contacter votre administrateur.");
            },
            success: function(data) {

                $("#modify .id").val(data[0]["id"]);
                $("#modify .lastname").val(data[0]["lastname"]);
                $("#modify .firstname").val(data[0]["firstname"]);
                $("#modify .birthDate").val(data[0]["birthDate"]);
                var $radios = $('#modify input:radio[name=sex]');
                if(data[0]["sex"]== "Male") {
                    $radios.filter('[value=Male]').prop('checked', true);
                }
                else {
                    $radios.filter('[value=Female]').prop('checked', true);
                }

                $("#modify .address").val(data[0]["address"]);
                $("#modify .city").val(data[0]["city"]);
                $("#modify .phoneHome").val(data[0]["phoneHome"]);
                $("#modify .phoneMobile").val(data[0]["phoneMobile"]);
                $("#modify .email").val(data[0]["email"]);
                $("#modify .job").val(data[0]["job"]);
                $("#modify .status #actualStatus").val(data[0]["status"]);
                $("#modify .status #actualStatus").html(data[0]["status"]);
                $("#modify .password").val(data[0]["password"]);
                // Archiving
                $("#archive .id").val(data[0]["id"]);
            }
        });
    });
});