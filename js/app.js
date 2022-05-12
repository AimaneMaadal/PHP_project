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