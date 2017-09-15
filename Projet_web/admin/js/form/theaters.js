$().ready(function() {
     $("#addForm").validate({
        submitHandler: function() {
                var formData = $("#addForm").serialize();
                // alert(formData);
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
            numberOfPlace: {
                required: true,
                digits: true
            },
            address: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength: 9,
                digits: true
            }
        },
        messages: {
            name: {
                required: "Veuillez specifier le nom de la salle."
            },
            numberOfPlace: {
                required: "Veuillez spécifier le nombre de places",
                digits: "Un nombre est attendu"
            },
            address: {
                required: "Veuillez renseigner l'adresse",
                minlength: "Au moins 5 caracteres"
            },
            phone: {
                required: "Veuillez renseigner le numéro de téléphone",
                minlength: "Au moins 9 chiffres",
                digits: "Des chiffres sont attendus"
            }
        }
    });
    
    $("#modificationForm").validate({
        submitHandler: function() {
                var formData = $("#modificationForm").serialize();
                // alert(formData);
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
            numberOfPlace: {
                required: true,
                digits: true
            },
            address: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength: 9,
                digits: true
            }
        },
        messages: {
            name: {
                required: "Veuillez specifier le nom de la salle."
            },
            numberOfPlace: {
                required: "Veuillez spécifier le nombre de places",
                digits: "Un nombre est attendu"
            },
            address: {
                required: "Veuillez renseigner l'adresse",
                minlength: "Au moins 5 caracteres"
            },
            phone: {
                required: "Veuillez renseigner le numéro de téléphone",
                minlength: "Au moins 9 chiffres",
                digits: "Des chiffres sont attendus"
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

