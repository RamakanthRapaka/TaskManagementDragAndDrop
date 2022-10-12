$("#save_project").click(function () {
    $.ajax({
        type: "POST",
        url: "http://task.management/api/project",
        data: {name: $("#project_name").val(), description: $("textarea#project_description").val()},
        success: function (data, textStatus, xhr) {
            console.log(xhr.status);
            $("#save_project_validation").html('Project successfully created');
        },
        error: function (xhr, textStatus) {
            var name;
            var description;
            if (typeof xhr.responseJSON.name != "undefined") {
                name = xhr.responseJSON.name;
            }

            if (typeof xhr.responseJSON.description != "undefined") {
                description = xhr.responseJSON.description;
            }
            $("#save_project_validation").html(name + '<br>' + description);
            console.log(xhr.responseJSON.name);
        }
    });
});


$("#save_task").click(function () {
    $.ajax({
        type: "POST",
        url: "http://task.management/api/task",
        data: {name: $("#name").val(), project_id: $("#project_id").val(), priority: $("#priority").val(), order: $("#order").val()},
        success: function (data, textStatus, xhr) {
            console.log(xhr.status);
            $("#save_task_validation").html('Task successfully created');
        },
        error: function (xhr, textStatus) {
            var name;
            var project_id;
            var priority;
            var order;
            if (typeof xhr.responseJSON.name != "undefined") {
                name = xhr.responseJSON.name;
            }

            if (typeof xhr.responseJSON.project_id != "undefined") {
                project_id = xhr.responseJSON.project_id;
            }

            if (typeof xhr.responseJSON.priority != "undefined") {
                priority = xhr.responseJSON.priority;
            }

            if (typeof xhr.responseJSON.order != "undefined") {
                order = xhr.responseJSON.order;
            }

            $("#save_task_validation").html(name + '<br>' + project_id + '<br>' + priority + '<br>' + order);
            console.log(xhr.responseJSON.name);
        }
    });
});