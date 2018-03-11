$(document).ready(function () {
    $(document).on('click', '.btn-warning', function () {
        var category_id = $(this).data("id");
        $.ajax({
            url: "ajax/fetch-category.php",
            method: "POST",
            data: {category_id: category_id},
            dataType: "json",
            success: function (data) {
                $('#name').val(data.name);
                $('#id').val(data.id);
            }
        });
    });
});