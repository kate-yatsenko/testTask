;(function ($, undefined) {
    $(document).ready(function () {
        var url = "/admin/companies";
        $('.delete-company').on('click', function () {
            var id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: url + '/' + id,
                success: function () {
                    $("#company" + id).remove();
                }
            });
        });

        var url2 = "/admin/subdivisions";
        $('.delete-sub').on('click', function () {
            var id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: url2 + '/' + id,
                success: function () {
                    $("#subdivision" + id).remove();
                }
            });
        });

        var url3 = "/admin/workers";
        $('.delete-worker').on('click', function () {
            var id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: url3 + '/' + id,
                success: function () {
                    $("#worker" + id).remove();
                }
            });
        });

        var url4 = "/admin/users";
        $('.delete-user').on('click', function () {
            var id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: url4 + '/' + id,
                success: function () {
                    $("#user" + id).remove();
                }
            });
        });

    });
})(jQuery);