$().ready(function() {
    $("#addForm").validate({
        submitHandler: function() {
            var formData = $("#addForm").serialize();
            $.ajax({
                type: "POST",
                url: "php/queries/insert.php",
                cache: false,
                data: formData,
                success: onSuccess,
                error: onError
            });
            return false;
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            name: {
                required: "Veuillez renseigner le nom du genre",
                minlength: "Au moins 2 caractères"
            }
        }
    });

$("#modificationForm").validate({
        submitHandler: function() {
                var formData = $("#modificationForm").serialize();
                $.ajax({
                    type: "POST",
                    url: "php/queries/update.php",
                    cache: false,
                    data: formData,
                    success: onSuccess,
                    error: onError
                });
                return false;
            },
        rules: {
            name: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            name: {
                required: "Veuillez renseigner le nom du genre",
                minlength: "Au moins 2 caractères"
            }
        }
    });
    
      $("#archiveForm").validate({
         submitHandler: function() {
                var formData = $("#archiveForm").serialize();
                $.ajax({
                    type: "POST",
                    url: "php/queries/archive.php",
                    cache: false,
                    data: formData,
                    success: onSuccess,
                    error: onError
                });
                return false;
            },
        rules: {
            id: "required"
        },
        messages: {
            id: "Veuillez renseigner l'id du film"
        }
    });
    
});

