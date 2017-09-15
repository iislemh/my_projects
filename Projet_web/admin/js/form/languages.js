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
            name: "required",
            abbreviation: {
                required: true,
                minlength: 2,
                maxlength: 2
            }
        },
        messages: {
            name: {
                required: "Veuillez renseigner le nom du pays"
            },
            abbreviation: {
                required: "Veuillez specifier l'abbréviation.",
                minlength: "Pour respecter la norme alpha-2, rentrez obligatoirement 2 caractères.",
                maxlength: "N'excédez pas 2 caractères."
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
            name: "required",
            abbreviation: {
                required: true,
                minlength: 2,
                maxlength: 2
            }
        },
        messages: {
            name: {
                required: "Veuillez renseigner le nom du pays"
            },
            abbreviation: {
                required: "Veuillez specifier l'abbréviation.",
                minlength: "Pour respecter la norme alpha-2, rentrez obligatoirement 2 caractères.",
                maxlength: "N'excédez pas 2 caractères."
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
            }
    });
    
    
});
