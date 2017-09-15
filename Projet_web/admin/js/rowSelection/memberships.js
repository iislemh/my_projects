$().ready(function() {
        if ($('main').data('session') == 1) {
        $("#table td").click(function() {
        $("#table tr").removeAttr('id', 'selected');
        $("#titleAndFilter ul li a").removeClass('inactiveLink');
        $row = $(this).parent("tr");
        $row.attr('id', 'selected');
        $id = $row.data("id");

        $.ajax({
            url: "php/queries/rowSelection/memberships.php",
            dataType: "JSON",
            data: {id: $id},
            cache: false,
            error: function() {
                alert("Erreur: veuillez contacter votre administrateur.");
            },
            success: function(data) {
                
                $("#modify .id").val(data[0]["id"]);
                $("#modify .firstname").val(data[0]["firstname"]);
                $("#modify .lastname").val(data[0]["lastname"]);
                $("#modify .password").val(data[0]["password"]);
                $("#modify .password2").val(data[0]["password"]);
                $("#modify .plot").val(data[0]["plot"]);
                $("#modify .cardNumber").val(data[0]["cardNumber"]);
                $("#modify .username").val(data[0]["username"]);
                $("#modify .sex").val(data[0]["sex"]);
                $("#modify .phoneHome").val(data[0]["phoneHome"]);
                $("#modify .phoneMobile").val(data[0]["phoneMobile"]);
                $("#modify .neighborhood").val(data[0]["neighborhood"]);
                $("#modify .city").val(data[0]["city"]);
                $("#modify .country").val(data[0]["country"]);
                $("#modify .email").val(data[0]["email"]);
                $("#modify .status #actualStatus").val(data[0]["status"]);
                $("#modify .status #actualStatus").html(data[0]["status"]);
                $("#modify .activity #actualActivity").val(data[0]["activity"]);
                $("#modify .activity #actualActivity").html(data[0]["activity"]);
//                $("#modify .membership").val(data[0]["membership"]);
                var $radios = $('#modify input:radio[name=membership]');
                if(data[0]["membership"]== "Subscriber") {
                    $radios.filter('[value=Subscriber]').prop('checked', true);
                }
                else {
                    $radios.filter('[value=Member]').prop('checked', true);
                }
//                $("#modify .newsletter").val(data[0]["newsletter"]);
                var $radios = $('#modify input:radio[name=newsletter]');
                if(data[0]["newsletter"]== "Yes") {
                    $radios.filter('[value=Yes]').prop('checked', true);
                }
                else {
                    $radios.filter('[value=No]').prop('checked', true);
                }

                // Archiving
                $("#archive .id").val(data[0]["id"]);
            }
        });
    });
}
});