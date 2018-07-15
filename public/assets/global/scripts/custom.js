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
        '<textarea name="answers[]" class="form-textarea" style="width:98%" required></textarea>' +
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


var count = 4;
$('.addHtml').on('click',function(){
    count = addHtml(next,count);
    count+=1;
    next++;
})

function addHtml(next,count){
    var stt = ++next;
    var html = `
        <div class="question_`+next+`">
            <div class="form-group">
        <label class="control-label col-md-2">Question `+stt+`
            <span class="required"> * </span>
        </label>
        <div class="col-md-8">
            <textarea name="question[]" class="form-textarea form-control" style="width:98%" required></textarea>
            <span class="help-block"> </span>
        </div>
    </div>
    <div class="form-group">
        <div class="portlet-body col-md-offset-2 col-md-8">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th width="80%"> Answers</th>
                        <th class="table-checkbox">
                            <label> Answer Correct</label>
                        </th>
                        <th>
                            <a id="addRow" class="btn btn-outline btn-circle btn-sm purple">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" id="tr">
                        <td>A</td>
                        <td>
                            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                <textarea name="answers[]" class="form-textarea" style="width:98% required"></textarea>
                            </div>
                        </td>
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                
                                <input type="hidden" name="correct[`+ count +`]" class="checkboxes" value="0"/>
                                <input type="checkbox" name="correct[`+ count +`]" class="checkboxes" value="1"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd gradeX" id="tr">
                        <td>B</td>
                        <td>
                            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                <textarea name="answers[]" class="form-textarea" style="width:98%" required></textarea>
                            </div>
                        </td>
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="hidden" name="correct[`+ (++count) +`]" class="checkboxes" value="0"/>
                                <input type="checkbox" name="correct[`+ (count) +`]" class="checkboxes" value="1"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd gradeX" id="tr">
                        <td>C</td>
                        <td>
                            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                <textarea name="answers[]" class="form-textarea" style="width:98%" required></textarea>
                            </div>
                        </td>
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                 <input type="hidden" name="correct[`+ (++count) +`]" class="checkboxes" value="0"/>
                                <input type="checkbox" name="correct[`+ (count) +`]" class="checkboxes" value="1"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="odd gradeX" id="tr">
                        <td>D</td>
                        <td>
                            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                <textarea name="answers[]" class="form-textarea" style="width:98%" required></textarea>
                            </div>
                        </td>
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                 <input type="hidden" name="correct[`+ (++count) +`]" class="checkboxes" value="0"/>
                                <input type="checkbox" name="correct[`+ (count) +`]" class="checkboxes" value="1"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a id="delete1" class="deleteRow btn btn-outline btn-circle dark btn-sm black">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        </div>
    `;
    $('.form-questions').append(html);
    return count;
}