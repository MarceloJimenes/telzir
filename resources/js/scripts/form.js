$(() => {
    $('.modal-btn').on('click', async function(e){
        e.preventDefault();

        const formData = $('form').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        const url = document.getElementById('request-url').value.replace(':origin', formData.origin).replace(':destination', formData.destination).replace(':minutes', formData.minutes).replace(':plan', formData.plan);

        await $.ajax({
            url: url,
            type: 'GET',
            success: async function(response){
                console.log(response);
                $('#from').html(response.from);
                $('#for').html(response.for);
                $('#minutes').html(response.minutes + ' minutos');
                $('#plan').html(response.plan);
                $('#with').html('R$ ' + response.withPlan);
                $('#without').html('R$ '+ response.withoutPlan);
                $('#modal').modal('show');
            },
            error: function(e){
                toastr.info('Houve um erro na requisição. Por favor, verifique se todos os campos estão preenchidos e tente novamente!', 'Erro', {
                    "positionClass": "toast-top-right",
                    "fadeIn": 300,
                    "fadeOut": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000
                });
            }
        });
    })
})
