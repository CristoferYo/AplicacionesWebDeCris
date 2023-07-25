let form = document.getElementById("form");
let textInput = document.getElementById("textInput");
let dateInput = document.getElementById("dateInput");
let textarea = document.getElementById("textarea");
let msg = document.getElementById("msg");
let tasks = document.getElementById("tasks");
let add = document.getElementById("add");
let editIndex = -1; // Initialize the editIndex to -1.

form.addEventListener("submit", (e) => {
  e.preventDefault();
  formValidation();
});

let formValidation = () => {
  if (textInput.value === "") {
    console.log("failure");
    msg.innerHTML = "Task cannot be blank";
  } else {
    console.log("success");
    msg.innerHTML = "";
    acceptData();
    add.setAttribute("data-bs-dismiss", "modal");
    add.click();

    (() => {
      add.setAttribute("data-bs-dismiss", "");
    })();
  }
};

let data = [{}];

let acceptData = () => {
  if (editIndex !== -1) {
    // If editIndex is not -1, it means we are editing an existing task.
    // So update the existing task in the data array.
    data[editIndex] = {
      text: textInput.value,
      date: dateInput.value,
      description: textarea.value,
    };
    editIndex = -1; // Reset the editIndex after editing is done.
  } else {
    data.push({
      text: textInput.value,
      date: dateInput.value,
      description: textarea.value,
    });
  }

  localStorage.setItem("data", JSON.stringify(data));

  console.log(data);
  createTasks();
  resetForm();
};

let createTasks = () => {
  tasks.innerHTML = "";
  data.map((x, y) => {
    return (tasks.innerHTML += `
    <div id=${y}>
          <span class="fw-bold">${x.text}</span>
          <span class="small text-secondary">${x.date}</span>
          <p>${x.description}</p>
  
          <span class="options">
            <i onClick= "editTask(this)" data-bs-toggle="modal" data-bs-target="#form" class="fas fa-edit"></i>
            <i onClick ="deleteTask(this);createTasks()" class="fas fa-trash-alt"></i>
          </span>
        </div>
    `);
  });
};

let deleteTask = (e) => {
  let taskId = e.parentElement.parentElement.id;
  e.parentElement.parentElement.remove();
  data.splice(taskId, 1);
  localStorage.setItem("data", JSON.stringify(data));
  console.log(data);
};

let editTask = (e) => {
  let selectedTask = e.parentElement.parentElement;
  editIndex = selectedTask.id; // Set the editIndex to the index of the selected task.

  textInput.value = selectedTask.children[0].innerHTML;
  dateInput.value = selectedTask.children[1].innerHTML;
  textarea.value = selectedTask.children[2].innerHTML;
};

let resetForm = () => {
  textInput.value = "";
  dateInput.value = "";
  textarea.value = "";
};

let deleteAllTasks = () => {
  data = [];
  localStorage.removeItem("data");
  createTasks(); 
};
(() => {
  data = JSON.parse(localStorage.getItem("data")) || [];
  console.log(data);
  createTasks();
})();