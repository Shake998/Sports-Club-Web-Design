




































/*$(function() {
    //Take the data from the TR during the event button
    $('table').on('click', 'button.editingTRbutton',function (ele) {
        //the <tr> variable is use to set the parentNode from "ele
        var tr = ele.target.parentNode.parentNode;

        //I get the value from the cells (td) using the parentNode (var tr)
        var id = tr.cells[0].textContent;
        var firstName = tr.cells[1].textContent;
        var surname = tr.cells[2].textContent;
        var email = tr.cells[3].textContent;
        var phone = tr.cells[4].textContent;
        var level = tr.cells[5].textContent;

        //Prefill the fields with the gathered information
        $('h5.modal-title').html('Edit Admin Data: '+firstName);
        $('#editName').val(firstName);
        $('#editSurname').val(surname);
        $('#editEmail').val(email);
        $('#editPhone').val(phone);
        $('#editId').val(id);
        $("#editLevel").val(level).attr('selected', 'selected');

        //If you need to update the form data and change the button link
        $("form#ModalForm").attr('action', window.location.href+'/update/'+id);
        $("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
    });
});*/