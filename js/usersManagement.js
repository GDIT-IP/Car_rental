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
