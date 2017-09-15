
    function clearForm()
    {
        $('form').find("input[type=text], input[type=password], input[type=email],textarea").val("");
        $('#cboxClose').trigger('click');
    }

    function onSuccess(data, status)
    {
        console.log("Success.");
        clearForm();
    }

    function onError(data, status)
    {   
        console.log("Failure.");
        console.log("Erreur, veuillez contacter l'administrateur.");
    }