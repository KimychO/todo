function Task(data) {
    this.description = ko.observable(data.description);
    this.id = data.id;
}

function TaskListViewModel(todoId) {
    // Data
    var self = this;
    self.tasks = ko.observableArray([]);
    self.newTaskText = ko.observable();

    // Operations
    self.addTask = function () {
        self.tasks.push(new Task({description: this.newTaskText()}));
        self.newTaskText("");
    };
    self.removeTask = function (task) {
        self.tasks.remove(task)
    };

    $.getJSON("/points/get/" + todoId, function (allData) {
        var mappedTasks = $.map(allData, function (item) {
            return new Task(item)
        });
        self.tasks(mappedTasks);
    });

    self.save = function () {
        $.ajax("/points/save/" + todoId, {
            data: ko.toJSON({points: self.tasks}),
            type: "post", contentType: "application/json",
            success: function (result) {
                alert(result)
            }
        });
    };
}