document.addEventListener("DOMContentLoaded", function () {
  const taskInput = document.getElementById("task");
  const addButton = document.getElementById("add-button");
  const taskList = document.getElementById("task-list");
  const completedList = document.getElementById("completed-list");

  function addTask(taskText) {
    const listItem = document.createElement("li");
    listItem.innerHTML = `
            <span>${taskText}</span>
            <button class="edit-button">Edit</button>
            <button class="delete-button">Delete</button>
            <button class="complete-button">Complete</button>
        `;
    taskList.appendChild(listItem);

    // Tambahkan event listener untuk menghapus tugas
    listItem
      .querySelector(".delete-button")
      .addEventListener("click", function () {
        taskList.removeChild(listItem);
        completedList.removeChild(listItem);
      });

    // Tambahkan event listener untuk menandai tugas sebagai selesai
    listItem
      .querySelector(".complete-button")
      .addEventListener("click", function () {
        listItem.querySelector(".complete-button").remove();
        completedList.appendChild(listItem);

        // Setelah ditandai selesai, aktifkan tombol "Delete" pada tugas yang sudah selesai
        listItem
          .querySelector(".delete-button")
          .addEventListener("click", function () {
            completedList.removeChild(listItem);
          });
      });

    // Tambahkan event listener untuk mengedit tugas
    listItem
      .querySelector(".edit-button")
      .addEventListener("click", function () {
        const currentText = listItem.querySelector("span").textContent;
        const editText = prompt("Edit tugas:", currentText);
        if (editText !== null && editText.trim() !== "") {
          listItem.querySelector("span").textContent = editText;
        }
      });
  }

  addButton.addEventListener("click", function () {
    const taskText = taskInput.value.trim();
    if (taskText !== "") {
      addTask(taskText);
      taskInput.value = "";
    }
  });
});
