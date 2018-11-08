;(function ($, undefined) {
    $(document).ready(function () {
        $('.getSub').on('click', function () {
            var that = $(this);
            var company_id = $(this).val();
            var data = {
                action: 'show'
            };

            $('#plusSubToggle' + company_id).toggleClass('fa-plus').toggleClass('fa-minus');
            if(!(that.hasClass('loaded'))) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/show/' + company_id,
                    data: data,
                    success: function (data) {
                        that.addClass('loaded');
                        for (i = 0; i < data.length; i++) {
                            $('#company' + company_id).find('.subdiv').append(
                                `<div class="col" id="sub${data[i].id}">` +
                                `<div class="card-body">` +
                                `<h4 class="title">` + data[i].title + `</h4>` +
                                `<p class="info">address: ` + data[i].address + `</p>` +
                                `<p class="text">` + data[i].description + `</p>` +
                                `</div>` +
                                `<button value="${data[i].id}" class="getWorkers btn btn-info">See Workers<i class="fa fa-plus ml-3" id="plusWorkersToggle${data[i].id}"></button>` +
                                `<div class="workers"></div></div>`);
                        }
                        $('#company' + company_id).find('.subdiv').slideToggle("slow", function () {
                        });
                    }
                });
                return false;
            } else {
                $('#company' + company_id).find('.subdiv').slideToggle("slow");
            }
        });

        $('.subdiv').on('click', '.getWorkers', function () {
            console.log('1');
            var t = $(this);
            var sub_id = $(this).val();
            var data = {
                action: 'showWorkers'
            };

            $('#plusWorkersToggle' + sub_id).toggleClass('fa-plus').toggleClass('fa-minus');
            if(!(t.hasClass('loaded'))) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/showWorkers/' + sub_id,
                    data: data,
                    success: function (data) {
                        t.addClass('loaded');
                        for (i = 0; i < data.length; i++) {
                            $('#sub' + sub_id).find('.workers').append(
                                '<div class="col-md-3">' +
                                '<div class="card-body">' +
                                '<h4 class="title">' + data[i].lastName + ' ' + data[i].firstName + ' ' + data[i].middleName + '</h4>' +
                                '<p class="info">address: ' + data[i].address + '</p>' +
                                `<img class="imgWork" src="/uploads/${data[i].image}">` +
                                '</div>');
                        }
                        $('#sub' + sub_id).find('.workers').slideToggle("slow", function () {
                        });
                    }
                });
            } else {
                $('#sub' + sub_id).find('.workers').slideToggle("slow");
            }
        });
    });
})(jQuery);