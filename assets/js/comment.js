document.addEventListener("DOMContentLoaded", () => {
const commentArea = document.querySelector(".textAreaComment");
const commentBtn = document.querySelector(".commentBtn");
const commentDiv = document.querySelector(".commentDiv");
const countComm = document.querySelector(".countComm");

const comment = [
    
];

commentBtn.addEventListener("click", (event) => {
  event.preventDefault();
  let newComment = commentArea.value;

  if (newComment) {
      comment.unshift(newComment);
      createNewsList(comment, commentDiv);
    }
  commentArea.value = "";
  countComm.innerHTML = comment.length + "ta";
});

function createNewsList(commentList, parent) {
  parent.innerHTML = "";

  commentList.forEach((item, index) => {
    parent.innerHTML += `
    <h5>Name</h5>
    <li> 
     ${item}
    </li>
    </br>
  `;
  });
}

createNewsList(comment, commentDiv);
})