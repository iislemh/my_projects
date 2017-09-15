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
            idMovie: "required",
            idTheater: "required",
            date: "required",
            language: "required",
            subtitles: "required"
        },
        messages: {
            idMovie: "Veuillez renseigner tous les champs",
            idTheater: "Veuillez renseigner tous les champs",
            date: "Veuillez renseigner tous les champs",
            language: "Veuillez renseigner tous les champs",
            subtitles: "Veuillez renseigner tous les champs"           
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
            idMovie: "required",
            idTheater: "required",
            date: "required",
            language: "required",
            subtitles: "required"
        },
        messages: {
            idMovie: "Veuillez renseigner tous les champs",
            idTheater: "Veuillez renseigner tous les champs",
            date: "Veuillez renseigner tous les champs",
            language: "Veuillez renseigner tous les champs",
            subtitles: "Veuillez renseigner tous les champs"           
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

