function preview_images() {
    var total_file = document.getElementById("images").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(
            event.target.files[i]) + "'></div>");
    }
}
var next = 1;
$('#addRow').on('click', function () {
    addRow(next);
    next++;

});

function addRow(next) {
    console.log(next);
    var tr = '<tr class="odd gradeX" id="tr' + next + '">' +
        '<td>' +
        ' <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">' +
        '<textarea name="answers[]" class="form-textarea" style="width:98%"></textarea>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">' +
        '<input type="hidden" name="correct['+ next +']" class="checkboxes" value="0"/>' +
        '<input name="correct['+ next +']" type="checkbox" class="checkboxes" value="1" />' +
        '<span>' + '</span>' +
        '</label>' +
        '</td>' +
        '<td><a id="delete' + next + '"  class="deleteRow btn btn-outline btn-circle dark btn-sm black">' +
        '<i class="fa fa-trash-o"></i></a>' +
        '</td>' +
        '</tr>';
    $('tbody').append(tr);

    $('.deleteRow').on('click', function () {

        id = $(this).attr('id');
        a = id.replace('delete', '');
        $('#tr' + a).remove();
    });
};
