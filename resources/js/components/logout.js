import axios from "axios";

const btn_logout = document.querySelector("#btn-logout");

if (btn_logout) {
    btn_logout.addEventListener("click", function () {
        axios
            .post("/logout")
            .then(function (response) {
                window.location.href = "/";
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}
