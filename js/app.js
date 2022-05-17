    function checkEmail(e) {
        let email = e.value;
        let emailLabel = document.querySelector(".emailLabel");
        let emailInput = document.querySelector("#emailInput");

        let data = new FormData();
        data.append("email", email);

        fetch('./ajax/check_email.php', {
            method: 'POST',
            body: data,
        })
            .then((response) => response.json())
            .then((data) => {
                if (
                    data.status == "Success" &&
                    data.message == "Email is already in use"
                    ) {
                    emailLabel.innerHTML = "Email is already in use";
                    emailLabel.classList.add("error_red");
                    emailInput.classList.add("err_red");
                } else {
                    emailLabel.innerHTML = "Email";
                    emailLabel.classList.remove("error_red");
                    emailInput.classList.remove("err_red");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            }
        );
    }

    document.querySelector("#btnSubmit").addEventListener("click", e => {
        //tekst uitlezen
        let comment = document.querySelector("#comment").value;
        let postId = 1;
    
        // via ajax naar server posten
        let data = new FormData();
        data.append("comment", comment);
        data.append("postId", postId);
    
        fetch('ajax/save_comment.php', {
            method: 'POST', // or 'PUT'
            body: data,
        })
            .then(response => response.json())
            .then(data => {
                //console.log('Success:', data);
                if (data.status === "success") {
                    let li = `<li class="animate__animated animate__bounce">${data.data.comment}</li>`;
                    document.querySelector("#listupdates").innerHTML += li;
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    
        e.preventDefault();
    });