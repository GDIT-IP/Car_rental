// let usersPerPage is set in calling file

function getUsersTable(pageNumber) {
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("usersList").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./usersListPageService.php?userspage=" + pageNumber + "&amount=" + usersPerPage, true);
    xmlhttp.send();
}

//Pass correct data into deletion confirmation dialog
$('#deleteUserModal').on('show.bs.modal', function (event) {
    const userId = $(event.relatedTarget).data('id');
    const userRole = $(event.relatedTarget).data('role');
    const userLogin = $(event.relatedTarget).data('login');
    $(this).find("#userToDeleteId").attr("value", userId);
    $(this).find(".modal-body").find("#user-role").text(userRole);
    $(this).find(".modal-body").find("#user-login").text(userLogin);
});
