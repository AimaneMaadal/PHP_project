function checkEmail(e) {
  let email = e.value;
  let emailLabel = document.querySelector(".emailLabel");
  let emailInput = document.querySelector("#emailInput");

  let data = new FormData();
  data.append("email", email);

  fetch("./ajax/check_email.php", {
    method: "POST",
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
      console.error("Error:", error);
    });
}

document.querySelector("#btnSubmit").addEventListener("click", (e) => {
  console.log("clicked");
  //tekst uitlezen
  let comment = document.querySelector("#commentText").value;
  //get post id from dataset
  let postId = document.querySelector("#btnSubmit").dataset.postid;

  // via ajax naar server posten
  let data = new FormData();
  data.append("comment", comment);
  data.append("postId", postId);


  //add new comment to list
  fetch("./ajax/save_comment.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status == "Success") {
        let newComment = document.createElement("li");
        newComment.innerHTML = data.body;
        document.querySelector(".listUpdates").appendChild(newComment);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  e.preventDefault();
});
