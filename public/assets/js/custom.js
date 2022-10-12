$(document).ready(function () {
    getOrder();
});

function moveElement(move, toBeBefore) {
    $(move).insertBefore(toBeBefore);
}

function getOrder() {
    $.ajax({
        type: "GET",
        url: "http://task.management/api/tasks",
        data: {drag_grid: ""},
        success: function (data) {
            for (var i = 0; i < data.data.length - 1; i++)
            {
                moveElement('task' + data.data[i].order, 'task' + data.data[parseInt(i) + parseInt(1)].order);
            }
            setTimeout(gridDragInit(), 2);
        }
    });
    setTimeout(gridDragInit(), 2);

}

function gridDragInit() {
    $("#grid").gridstrap();
}

function updateOrder(number, element) {
    console.log(number);
    console.log(element);
    $.ajax({
        type: "POST",
        url: "http://task.management/api/updatetaskorder",
        data: {drag_grid: "", number: number, order: element},
        success: function (result) {
            console.log(result);
        }
    });
}

function currentOrder() {
    var listItems = document.querySelector("#grid").children;
    var listArray = Array.from(listItems);
    var counter = 0;
    listArray.forEach((item) => {
        counter++;
        if (item.id.includes("task")) {
            updateOrder(counter, "#" + item.id);
        }
    });
}