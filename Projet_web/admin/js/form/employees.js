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
            lastname: "required",
            firstname: "required",
            birthDate: {
                required: true,
                minlength: 8
            },
            address: {
                required: true,
                minlength: 8
            },
            city: {
                minlength: 2
            },
            phoneHome: {
                required: true,
                minlength: 9,
                digits: true
            },
            phoneMobile: {
                required: true,
                minlength: 9,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            job: "required",
            status: "required"
        },
        messages: {
            lastname: {
                required: "Veuillez specifier votre nom."
            },
            firstname: "Veuillez spécifier votre prénom",
            birthDate: {
                required: "Veuillez renseigner votre date de naissance",
                minlength: "Au moins 8 chiffres"
            },
            address: {
                required: "Veuillez spécifier votre adresse",
                minlength: "Au moins 8 caracteres"
            },
            city: {
                minlength: "Au moins 2 caracteres"
            },
            telHome: {
                required: "Veuillez renseigner votre téléphone fixe",
                minlength: "Au moins 9 chiffres",
                digits: "Seulement des chiffres"
            },
            telMobile: {
                required: "Veuillez renseigner votre téléphone mobile",
                minlength: "Au moins 9 chiffres",
                digits: "Seulement des chiffres"
            },
            email: "Please enter a valid email address",
            job: {
                required: "Renseignez le poste occupé"
            },
            status: {
                required: "Renseignez le statut du contrat"
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
            lastname: "required",
            birthDate: {
                required: true,
                minlength: 8
            },
            address: {
                required: true,
                minlength: 8
            },
            city: {
                minlength: 2
            },
            phoneHome: {
                required: true,
                minlength: 9,
                digits: true
            },
            phoneMobile: {
                required: true,
                minlength: 9,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            job: "required",
            status: "required"
        },
        messages: {
            lastname: {
                required: "Veuillez specifier votre nom."
            },
            birthDate: {
                required: "Veuillez renseigner votre date de naissance",
                minlength: "Au moins 8 chiffres"
            },
            address: {
                required: "Veuillez spécifier votre adresse",
                minlength: "Au moins 8 caracteres"
            },
            city: {
                minlength: "Au moins 2 caracteres"
            },
            telHome: {
                required: "Veuillez renseigner votre téléphone fixe",
                minlength: "Au moins 9 chiffres",
                digits: "Seulement des chiffres"
            },
            telMobile: {
                required: "Veuillez renseigner votre téléphone mobile",
                minlength: "Au moins 9 chiffres",
                digits: "Seulement des chiffres"
            },
            email: "Please enter a valid email address",
            job: {
                required: "Renseignez le poste occupé"
            },
            status: {
                required: "Renseignez le statut du contrat"
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

