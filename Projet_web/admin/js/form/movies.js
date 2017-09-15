$(document).ready(function() {
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
            title: "required",
            titleOriginal: {
                minlength: 2
            },
            realisator: {
                minlength: 2
            },
            synopsis: {
                minlength: 10
            },
            actors: {
                minlength: 5
            },
            type: {
                minlength: 2
            },
            releaseDate: {
                minlength: 9
            },
            runningTime: {
                required: true,
                minlength: 2
            },
            production: {
                minlength: 2
            },
            distribution: {
                minlength: 2
            }
        },
        messages: {
            title: "Veuillez renseigner le titre du film",
            titleOriginal: {
                minlength: "Au moins 2 caracteres"
            },
            realisator: {
                minlength: "Au moins 2 caracteres"
            },
            synopsis: {
                minlength: "Au moins 10 caracteres"
            },
            actors: {
                minlength: "Au moins 5 caracteres"
            },
            type: {
                minlength: "Au moins 2 caracteres"
            },
            releaseDate: {
                minlength: "Au moins 9 caracteres"
            },
            runningTime: {
                required: "veuillez renseigner la durée du film",
                minlength: "Au moins 2 caracteres"
            },
            production: {
                minlength: "Au moins 2 caracteres"
            },
            distribution: {
                minlength: "Au moins 2 caracteres"
            },
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
            title: "required",
            titleOriginal: {
                minlength: 2
            },
            realisator: {
                minlength: 2
            },
            synopsis: {
                minlength: 10
            },
            actors: {
                minlength: 5
            },
            type: {
                minlength: 2
            },
            releaseDate: {
                minlength: 9
            },
            runningTime: {
                required: true,
                minlength: 2
            },
            production: {
                minlength: 2
            },
            distribution: {
                minlength: 2
            }
        },
        messages: {
            title: "Veuillez renseigner le titre du film",
            titleOriginal: {
                minlength: "Au moins 2 caracteres"
            },
            realisator: {
                minlength: "Au moins 2 caracteres"
            },
            synopsis: {
                minlength: "Au moins 10 caracteres"
            },
            actors: {
                minlength: "Au moins 5 caracteres"
            },
            type: {
                minlength: "Au moins 2 caracteres"
            },
            releaseDate: {
                minlength: "Au moins 9 caracteres"
            },
            runningTime: {
                required: "veuillez renseigner la durée du film",
                minlength: "Au moins 2 caracteres"
            },
            production: {
                minlength: "Au moins 2 caracteres"
            },
            distribution: {
                minlength: "Au moins 2 caracteres"
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

